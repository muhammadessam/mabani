@extends('layouts.layout')
@section('title', 'التقارير')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">التقارير</h3>
                        <div class="card-tools">
                            <a class="btn btn-flat btn-success" href="{{route('documents.create')}}"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="documents">
                            <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>ملاحظات</th>
                                    <th>تارخ الانتهاء</th>
                                    <th>ذكرني قبل الانتهاء</th>
                                    <th>اجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Document::all() as $item)
                                <tr>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['note']}}</td>
                                    <td>{{$item['expire_day']}}</td>
                                    <td>{{$item['remind_me']}} يوما </td>
                                    <td class="d-flex">
                                        <a href="{{route('documents.edit', $item)}}" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></a>
                                        <form action="{{route('documents.destroy', $item)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-flat btn-danger" type="submit"><i
                                                    class="fa fa-trash"></i></button>
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
<x-datatable id="documents"></x-datatable>
@endsection
