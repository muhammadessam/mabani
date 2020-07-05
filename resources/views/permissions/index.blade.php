@extends('layouts.layout')
@section('title', 'الاذونات')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">اضف جديد</h3>
                            <div class="card-tools">
                                <form class="form-inline" action="{{route('permissions.store')}}" method="post">
                                    @csrf
                                    <div class="form-group ml-1">
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="اضف اذن جديد">
                                    </div>
                                    <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-plus"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="permissions" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Permission::all() as $item)
                                    <tr>
                                        <td>{{$item['name']}}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-flat btn-primary ml-1" href="{{route('permissions.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('permissions.destroy',$item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
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
    <x-datatable id="permissions"></x-datatable>
@endsection