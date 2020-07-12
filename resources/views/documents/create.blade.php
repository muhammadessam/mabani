@extends('layouts.layout')
@section('title', 'اضافة جديد')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">اضافة جديد</h3>
                        <div class="card-tools">
                            <a class="btn btn-flat btn-success" href="{{route('documents.index')}}"><i
                                    class="fa fa-list"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('documents.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                                <x-error name="name"></x-error>
                            </div>
                            <div class="form-group">
                                <label for="note">الملاحظات</label>
                                <textarea type="text" name="note" id="note"
                                    class="form-control">{{old('note')}}</textarea>
                                <x-error name="note"></x-error>
                            </div>
                            <div class="form-group">
                                <label for="expire_day">التاريخ</label>
                                <input type="date" name="expire_day" id="expire_day" class="form-control"
                                    value="{{old('expire_day')}}">
                                <x-error name="expire_day"></x-error>
                            </div>
                            <div class="form-group">
                                <label for="remind_me">ذكرني قبل انتهاء المدة </label>
                                <input type="number" name="remind_me" id="remind_me" class="form-control" value="{{old('remind_me')}}">
                                <x-error name="remind_me"></x-error>
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
<x-datatable id="documents"></x-datatable>
@endsection
