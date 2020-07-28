@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تعديل</h3>
                        <div class="card-tools">
                            <a class="btn btn-flat btn-success" href="{{route('contracts.index')}}"><i class="fa fa-list"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('contracts.update', $contract)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="unit_id">الوحدة</label>
                                <select name="unit_id" id="unit_id" class="form-control">
                                    @foreach(\App\Unit::all() as $item)
                                        <option {{$item['id']==$contract['unit_id'] ? 'selected':''}} value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                                <x-error name="unit_id"></x-error>
                            </div>

                            <div class="form-group">
                                <label for="tenant_id">المستأجر</label>
                                <select name="tenant_id" id="tenant_id" class="form-control">
                                    @foreach(\App\Tenant::all() as $item)
                                        <option {{$item['id']==$contract['tenant_id'] ? 'selected':''}} value="{{$item['id']}}">{{$item->user['name']}}</option>
                                    @endforeach
                                </select>
                                <x-error name="tenant_id"></x-error>
                            </div>

                            <div class="form-group">
                                <label for="number">رقم العقد</label>
                                <input class="form-control" type="text" name="number" id="number" value="{{$contract['number']}}">
                                <x-error name="number"></x-error>
                            </div>

                            <div class="form-group">
                                <label for="start">بداية من</label>
                                <input class="form-control" type="date" name="start" id="start" value="{{$contract['start']}}">
                                <x-error name="start"></x-error>
                            </div>
                            <div class="form-group">
                                <label for="period"> المدة بالاشهر</label>
                                <input class="form-control" type="number" name="period" id="period" value="{{$contract['period']}}">
                                <x-error name="period"></x-error>
                            </div>
                            <div class="form-group">
                                <label for="rent">قيمة الايجار</label>
                                <input class="form-control" type="text" name="rent" id="rent" value="{{$contract['rent']}}">
                                <x-error name="rent"></x-error>
                            </div>
                            <div class="form-group">
                                <label for="payment_method">طريقة الدفع</label>
                                <input class="form-control" type="text" name="payment_method" id="payment_method" value="{{$contract['payment_method']}}">
                                <x-error name="payment_method"></x-error>
                            </div>
                            <button class="btn btn-flat btn-success" type="submit"><i class="fa fa-save"></i> حفظ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
