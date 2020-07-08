@extends('layouts.layout')
@section('title', 'الاعدادت')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إعدادات المؤسسة </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('settings.update', \App\Setting::MainSettings())}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputFile">الشعار</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="logo_temp">
                                    <label class="custom-file-label" for="exampleInputFile">اختر صورة الشعار</label>
                                </div>
                                @if(\App\Setting::MainSettings()->logo)
                                    <div class="img-thumbnail">
                                        <img src="{{asset(\App\Setting::MainSettings()->logo)}}" alt="photo" style="width: 100px;height: 100px">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="header">رأس التقرير</label>
                            <textarea class="form-control" name="header" id="header">{{\App\Setting::MainSettings()->header}}</textarea>
                            <x-error name="header"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="footer">تذييل التقرير</label>
                            <textarea class="form-control" name="footer" id="footer">{{\App\Setting::MainSettings()->footer}}</textarea>
                            <x-error name="footer"></x-error>
                        </div>
                        <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <x-tinymc id="header"></x-tinymc>
    <x-tinymc id="footer"></x-tinymc>
@endsection