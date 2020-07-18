@extends('layouts.layout')
@section('title', 'المصروف')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">اضافة جديد</h3>
                        <div class="card-tools">
                            <a class="btn btn-flat btn-success" href="{{route('expenses.expense.index')}}"><i
                                    class="fa fa-list"></i></a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('expenses.expense.update', $expense)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="cat_id">نوع الدخل</label>
                                <select name="cat_id" id="cat_id" class="form-control" onchange="checkIfManbani()">
                                    @foreach(\App\ExpensesCategory::all() as $item)
                                    <option {{$expense['cat_id'] == $item['id'] ? 'selected':''}}
                                        value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                                <x-error name="cat_id"></x-error>
                            </div>

                            <div class="row" id="ifMabaniContainer">
                                <div class="col-12" id="ifMabani">
                                    <div class="form-group">
                                        <label for="building_id">المبني رقم</label>
                                        <select name="building_id" id="building_id" class="form-control">
                                            @foreach(\App\Building::all() as $item)
                                            <option {{$expense['building_id'] == $item['id'] ? 'selected':''}}
                                                value="{{$item['id']}}">{{$item['id']}}</option>
                                            @endforeach
                                        </select>
                                        <x-error name="building_id"></x-error>
                                    </div>

                                    <div class="form-group">
                                        <label for="unit_id">الوحدة</label>
                                        <select name="unit_id" id="unit_id" class="form-control">
                                            @foreach(\App\Unit::all() as $item)
                                            <option {{$expense['unit_id'] == $item['id'] ? 'selected':''}}
                                                value="{{$item['id']}}">{{$item['name']}}</option>
                                            @endforeach
                                        </select>
                                        <x-error name="unit_id"></x-error>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="ifEmpContainer">
                                <div class="col-12" id="ifEmp">
                                    <div class="form-group">
                                        <label for="unit_id">الموظف</label>
                                        <select name="employee_id" id="employee_id" class="form-control">
                                            @foreach(\App\Employee::all() as $item)
                                            <option {{$expense['employee_id'] == $item['id'] ? 'selected':''}}
                                                value="{{$item['id']}}">{{$item->user['name']}}</option>
                                            @endforeach
                                        </select>
                                        <x-error name="unit_id"></x-error>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date">التاريخ</label>
                                <input class="form-control" type="date" name="date" id="date"
                                    value="{{$expense['date']}}">
                                <x-error name="date"></x-error>
                            </div>

                            <div class="form-group">
                                <label for="amount">القيمة</label>
                                <input class="form-control" type="text" name="amount" id="amount"
                                    value="{{$expense['amount']}}">
                                <x-error name="amount"></x-error>
                            </div>

                            <div class="form-group">
                                <label for="paid">المدفوع</label>
                                <input class="form-control" type="text" name="paid" id="paid"
                                    value="{{$expense['paid']}}">
                                <x-error name="paid"></x-error>
                            </div>


                            <div class="form-group">
                                <label for="note">ملاحظات</label>
                                <textarea class="form-control" name="note" id="note">{{$expense['note']}}</textarea>
                                <x-error name="note"></x-error>
                            </div>

                            <button class="btn btn-flat btn-success" type="submit"><i class="fa fa-save"></i>
                                حفظ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    let checkMabani = $('#ifMabani');
    let checkEmp = $('#ifEmp');

    $(document).ready(function(){
        if($('#cat_id').val() == 1)
           {
               console.log($('#cat_id').val());
               $('#ifMabaniContainer').append(checkMabani);
           }else if($('#cat_id').val() == 2)
           {
            console.log($('#cat_id').val());

               $('#ifEmpContainer').append(checkEmp);
           }
            else{
               console.log($('#cat_id').val());
                checkMabani.remove();
                checkEmp.remove();
            }
    });


    function checkIfManbani(){
        if($('#cat_id').val() == 1)
           {
               checkEmp.remove();
               $('#ifMabaniContainer').append(checkMabani);
           }
            else if($('#cat_id').val() == 2){
                checkMabani.remove();
                $('#ifEmpContainer').append(checkEmp)
            }else{
                checkEmp.remove();
                checkMabani.remove();
            }
    }
</script>
@endsection
