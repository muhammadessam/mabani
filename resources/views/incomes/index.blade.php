@extends('layouts.layout')
@section('title', 'الدخل')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">اضافة جديد</h3>
                            <div class="card-tools">
                                <a class="btn btn-flat btn-success" href="{{route('income.income.create')}}"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>

                        <div class="card-body"  style="overflow: auto">
                            <table id="incomes" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>نوع الدخل</th>
                                    <th>المبني</th>
                                    <th>الوحدة</th>
                                    <th>التاريخ</th>
                                    <th>القيمة</th>
                                    <th>مدفوع</th>
                                    <th>المتبقي</th>
                                    <th>الملاحظات</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                @foreach(\App\Income::all() as $item)
                                    <tr>
                                        <td>{{$item->cat['name']}}</td>
                                        <td>{{$item->building['id']}}</td>
                                        <td>{{$item->unit['name']}}</td>
                                        <td>{{$item['date']}}</td>
                                        <td>{{$item['amount']}}</td>
                                        <td>{{$item['paid']}}</td>
                                        <td>{{$item['balance']}}</td>
                                        <td>{{$item['note']}}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-flat btn-primary ml-1" href="{{route('income.income.edit',$item)}}"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('income.income.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-flat btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <x-datatable id="incomes"></x-datatable>
@endsection
