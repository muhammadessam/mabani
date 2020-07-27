@extends('layouts.layout')
@section('title', 'الدخل')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row m-5">
                <div class="col text-center">
                    <form class="form form-inline" action="{{route('income.income.index')}}" method="get">
                        <div class="form-group m-1">
                            <label for="start">بداية من : </label>
                            <input name="start" type="date" class="form-control" value="{{request()->get('start')}}">
                        </div>

                        <div class="form-group m-1">
                            <label for="end">نهاية الي : </label>
                            <input name="end" type="date" class="form-control" value="{{request()->get('end')}}">
                        </div>

                        <div class="form-group m-1">
                            <label for="building_id">المبني رقم:</label>
                            <select name="building_id" id="building_id" class="form-control">
                                <option value="">الكل</option>
                                @foreach (\App\Building::all() as $item)
                                    <option {{request()->get('building_id') == $item['id'] ? 'selected' : ''}}
                                            value="{{$item['id']}}">{{$item['id']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group m-1">
                            <label for="unit_id">الوحدة:</label>
                            <select name="unit_id" id="unit_id" class="form-control">
                                <option value="">الكل</option>
                                @foreach (\App\Unit::all() as $item)
                                    <option {{request()->get('unit_id') == $item['id'] ? 'selected' : ''}}
                                            value="{{$item['id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-flat btn-success" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

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
                                @foreach($data as $item)
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
                                        <a class="btn btn-flat btn-secondary ml-1" target="_blank" href="{{route('income.income.print', $item)}}"><i class="fa fa-print"></i></a>
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
    <x-datatable id="incomes" print="1" cols=[0,1,2,3,4,5,6,7] orderCol="3" orderDir="asc"></x-datatable>
@endsection