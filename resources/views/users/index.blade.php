@extends('layouts.layout')
@section('title', 'المشرفين')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">المشرفين</h3>
                            <div class="card-tools">
                                <a href="{{route('users.create')}}" class="btn btn-flat btn-success" title="اضافة مستخدم جديد"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body"  style="overflow: auto">
                            <table id="users" class="table-striped table">
                                <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>الايميل</th>
                                    <th>الادوار</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\User::Admins()->get() as $item)
                                    <tr>
                                        <td>{{$item['name']}}</td>
                                        <td>{{$item['email']}}</td>
                                        <td>
                                            @foreach($item->roles as $role)
                                                {{$role->name}}،
                                            @endforeach
                                        </td>
                                        <td class="d-flex">
                                            <a class="btn btn-flat btn-info ml-1" href="{{route('users.show', $item)}}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-flat btn-warning ml-1" href="{{route('users.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('users.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <x-datatable id="users"></x-datatable>
@endsection
