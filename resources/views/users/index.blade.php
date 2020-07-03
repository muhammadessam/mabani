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
                                <a href="{{route('admin.users.create')}}" class="btn btn-flat btn-success" title="اضافة مستخدم جديد"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="users" class="table-striped table">
                                <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>الايميل</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\User::all() as $item)
                                    <tr>
                                        <td>{{$item['name']}}</td>
                                        <td>{{$item['email']}}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-flat btn-info" href="{{route('admin.users.show', $item)}}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-flat btn-warning" href="{{route('admin.users.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('admin.users.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد؟')">
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