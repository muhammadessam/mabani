@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$unit->name}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                               <div class="row">
                                   <div class="col">
                                       <label for="">حساب الماء</label>
                                       <div class="form-control">
                                           {{$unit->water_account}}
                                       </div>
                                   </div>
                               </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">حساب الكهرباء</label>
                                        <div class="form-control">
                                            {{$unit->electricity_account}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">نوع الوحدة</label>
                                        <div class="form-control">
                                            {{$unit->type->name}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <label for="">الطابق</label>
                                        <div class="form-control">
                                            {{$unit->floor->floor}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">المبني رقم</label>
                                        <div class="form-control">
                                            {{$unit->building->id    }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">الدخولات</h3>
                    </div>
                    <div class="card-body" style="overflow: auto">
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
                            @foreach($unit->incomes as $item)
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
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <x-datatable id="incomes" print="1" cols=[0,1,2,3,4,5,6,7] orderCol="3" orderDir="asc" printLand="1"></x-datatable>
@endsection