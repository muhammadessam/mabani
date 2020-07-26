@extends('layouts.layout')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col text-center m-5">
                        <img style="width: 200px; height: 200px;" src="{{asset(\App\Setting::MainSettings()->logo)}}"
                             alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        {!! \App\Setting::MainSettings()->header !!}
                    </div>
                </div>
                @if ($income->unit_id)
                    <div class="row mt-5">
                        <div class="col-3">
                            تم استلام مع الشكر من الفاضل:
                        </div>
                        <div class="col">
                            <strong>{{$income->unit->contracts->last()->tenant->user->name}}</strong> - <span>{{$income->unit->contracts->last()->tenant->user->phone}}</span>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-body mt-5">

                <div class="row">
                    <div class="col">

                        <table class="table table-striped">

                            <tbody>
                            <tr>
                                <td>نوع الدخل</td>
                                <td>{{$income->cat['name']}}</td>
                            </tr>
                            <tr>
                                <td>رقم المبني</td>
                                <td>{{$income->building['id']}}</td>
                            </tr>
                            <tr>
                                <td>الوحدة</td>
                                <td>{{$income->unit['name']}}</td>
                            </tr>
                            <tr>
                                <td>التاريخ</td>
                                <td>{{$income['date']}}</td>
                            </tr>
                            <tr>
                                <td>القيمة</td>
                                <td>{{$income['amount']}}</td>
                            </tr>
                            <tr>
                                <td>مدفوع</td>
                                <td>{{$income['paid']}}</td>
                            </tr>
                            <tr>
                                <td>المتبقي</td>
                                <td>{{$income['balance']}}</td>
                            </tr>
                            <tr>
                                <td>الملاحظات</td>
                                <td>{{$income['note']}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="card-footer text-center">
                {!! \App\Setting::MainSettings()->footer !!}
                <div class="row">
                    <div class="col text-left mt-2">
                        <img style="width: 100px; height: 100px;" src="{{asset(\App\Setting::MainSettings()->stamp)}}"
                             alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            window.print();
        });
        window.onafterprint = function () {
            window.close();
        }
    </script>
@endsection
