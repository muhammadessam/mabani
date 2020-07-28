@extends('layouts.layout')
@section('title', 'تعديل مستاجر')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-flat btn-success" href="{{route('tenants.index')}}"><i class="fa fa-list"></i></a>
                        </div>
                        <div class="card-body">
                            <form action="{{route('tenants.update', $tenant)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">الاسم</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$tenant->user['name']}}">
                                    <x-error name="name"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="phone">الهاتف</label>
                                    <input type="tel" name="phone" id="email" class="form-control" value="{{$tenant->user['phone']}}">
                                    <x-error name="phone"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="email">الايميل</label>
                                    <input type="email" name="email" id="phone" class="form-control" value="{{$tenant->user['email']}}">
                                    <x-error name="email"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="nationality">الجنسية</label>
                                    <input type="nationality" name="nationality" id="nationality" class="form-control" value="{{$tenant->user['nationality']}}">
                                    <x-error name="nationality"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="password">كلمة المرور</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    <x-error name="password"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">تاكيد كلمة المرور</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                    <x-error name="password_confirmation"></x-error>
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