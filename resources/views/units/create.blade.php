@extends('layouts.layout')
@section('title', 'اضافة وحدة جديد')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-flat btn-success" href="{{route('units.index')}}"><i class="fa fa-list"></i></a>
                        </div>
                        <div class="card-body">
                            <form action="{{route('units.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">الاسم</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                                    <x-error name="name"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="water_account">حساب المياة</label>
                                    <input type="text" name="water_account" id="water_account" class="form-control" value="{{old('water_account')}}">
                                    <x-error name="water_account"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="electricity_account">حساب الكهرباء</label>
                                    <input type="text" name="electricity_account" id="electricity_account" class="form-control" value="{{old('electricity_account')}}">
                                    <x-error name="electricity_account"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="unit_type_id">نوع الوحدة</label>
                                    <select name="unit_type_id" id="unit_type_id" class="form-control">
                                        @foreach(\App\UnitType::all() as $item)
                                            <option {{old('unit_type_id') == $item['id'] ? 'selected':''}} value="{{$item['id']}}">{{$item['name']}}</option>
                                        @endforeach
                                    </select>
                                    <x-error name="unit_type_id"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="floor_id">الطابق</label>
                                    <select name="floor_id" id="floor_id" class="form-control">
                                        @foreach(\App\Floor::all() as $item)
                                            <option {{old('floor_id') == $item['id'] ? 'selected':''}} value="{{$item['id']}}">{{$item['floor']}}</option>
                                        @endforeach
                                    </select>
                                    <x-error name="floor_id"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="building_id"> المبني رقم</label>
                                    <select name="building_id" id="building_id" class="form-control">
                                        @foreach(\App\Building::all() as $item)
                                            <option {{old('building_id') == $item['id'] ? 'selected':''}} value="{{$item['id']}}">{{$item['id']}}</option>
                                        @endforeach
                                    </select>
                                    <x-error name="building_id"></x-error>
                                </div>
                                <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection