@extends('layouts.layout')
@section('title', 'الوحدات')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-titile">الوحدات</h3>
                            <div class="card-tools">
                                <a class="btn btn-flat  btn-success" href="{{ route('units.create') }}"><i
                                            class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="units" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>حساب الماء</th>
                                    <th>حساب الكهرباء</th>
                                    <th>نوع الوحدة</th>
                                    <th>الطابق</th>
                                    <th>المبني</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach (\App\Unit::all() as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->water_account}}</td>
                                        <td>{{$item->electricity_account}}</td>
                                        <td>{{$item->type->name}}</td>
                                        <td>{{$item->floor->floor}}</td>
                                        <td>{{$item->building->id}}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('units.edit',$item) }}" class="btn btn-flat btn-primary ml-1"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('units.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-flat btn-danger" type="submit"><i class="fa fa-trash"></i></button>
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
    <x-datatable id="units"></x-datatable>
@endsection
