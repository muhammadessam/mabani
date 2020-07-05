@extends('layouts.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">الملاك</h3>
                            <div class="card-tools">
                                <a href="{{route('owners.create')}}" class="btn btn-flat btn-success"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="owners">
                                <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>البريد</th>
                                    <th>الهاتف</th>
                                    <th>الجنسية</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Owner::all() as $item)
                                    <tr>
                                        <td>{{$item->user['name']}}</td>
                                        <td>{{$item->user['email']}}</td>
                                        <td>{{$item->user['phone']}}</td>
                                        <td>{{$item->user['nationality']}}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-flat btn-warning ml-2" href="{{route('owners.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('owners.destroy', $item)}}" method="post">
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
    <x-datatable id="owners"></x-datatable>
@endsection