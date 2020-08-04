@extends('layouts.layout')
@section('title', 'المصروفات')
@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row m-5">
                <div class="col text-center">
                    <form class="form form-inline" action="{{route('expenses.expense.index')}}" method="get">
                        <div class="form-group m-1">
                            <label for="start">بداية من : </label>
                            <input name="start" type="date" class="form-control" value="{{request()->get('start')}}">
                        </div>

                        <div class="form-group m-1">
                            <label for="end">نهاية الي : </label>
                            <input name="end" type="date" class="form-control" value="{{request()->get('end')}}">
                        </div>

                        <div class="form-group m-1">
                            <label for="employee_id">الموظف</label>
                            <select name="employee_id" id="employee_id" class="form-control">
                                <option value="">الكل</option>
                                @foreach (\App\Employee::all() as $item)
                                    <option {{request()->get('employee_id') == $item['id'] ? 'selected' : ''}}
                                            value="{{$item['id']}}">{{$item->user['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group m-1">
                            <label for="employee_id">المالك</label>
                            <select name="owner_id" id="owner_id" class="form-control">
                                <option value="">الكل</option>
                                @foreach (\App\Owner::all() as $item)
                                    <option {{request()->get('owner_id') == $item['id'] ? 'selected' : ''}}
                                            value="{{$item['id']}}">{{$item->user['name']}}</option>
                                @endforeach
                            </select>
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

                        <div class="form-group m-1">
                            <label for="expenses_cat">نوع الصرف:</label>
                            <select name="expenses_cat" id="expenses_cat" class="form-control">
                                <option value="">الكل</option>
                                @foreach (\App\ExpensesCategory::all() as $item)
                                    <option {{request()->get('expenses_cat') == $item['id'] ? 'selected' : ''}}
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
                                <a class="btn btn-flat btn-success" href="{{route('expenses.expense.create')}}"><i
                                        class="fa fa-plus"></i></a>
                            </div>
                        </div>

                        <div class="card-body" style="overflow: auto">
                            <table id="incomes" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>النوع</th>
                                    <th>المبني</th>
                                    <th>الوحدة</th>
                                    <th>الموظف</th>
                                    <th>المالك</th>
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
                                        <td>{{$item->employee ? $item->employee->user['name']  :''}}</td>
                                        <td>{{$item->owner ? $item->owner->user['name']  :''}}</td>
                                        <td>{{$item['date']}}</td>
                                        <td>{{$item['amount']}}</td>
                                        <td>{{$item['paid']}}</td>
                                        <td>{{$item['balance']}}</td>
                                        <td>{{$item['note']}}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-flat btn-secondary ml-1" target="_blank"
                                               href="{{route('expenses.expense.print',$item)}}"><i
                                                    class="fa fa-print"></i></a>
                                            <a class="btn btn-flat btn-primary ml-1"
                                               href="{{route('expenses.expense.edit',$item)}}"><i
                                                    class="fa fa-edit"></i></a>
                                            <form action="{{route('expenses.expense.destroy', $item)}}" method="post"
                                                  onsubmit="return confirm('هل انت متاكد ؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-flat btn-danger" type="submit"><i
                                                        class="fa fa-trash"></i></button>
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
    <x-datatable id="incomes" print='1' cols=[0,1,2,3,4,5,6,7,8] header="" footer="" printLand="1"></x-datatable>
@endsection
