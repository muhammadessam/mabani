@extends('layouts.layout')
@section('title', 'الطوابق')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">اضف جديد</h3>
                            <div class="card-tools">
                                <form class="form-inline" action="{{route('floors.store')}}" method="post">
                                    @csrf
                                    <div class="form-group ml-1">
                                        <input type="text" name="floor" id="floor" class="form-control @error('floor') is-invalid @enderror" placeholder="اضف طابق جديد">
                                    </div>
                                    <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-plus"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body"  style="overflow: auto">
                            <table id="roles" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Floor::all() as $item)
                                    <tr>
                                        <td>{{$item['floor']}}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-flat btn-warning ml-1" href="{{route('floors.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('floors.destroy',$item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
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
    <x-datatable id="roles" print="0"></x-datatable>
@endsection
