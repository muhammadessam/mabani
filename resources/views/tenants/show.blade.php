@extends('layouts.layout')
@section('title', $tenant->user->name)
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
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">الاسم</label>
                                        <div class="form-control">{{$tenant->user['name']}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">الهاتف</label>
                                        <div class="form-control">{{$tenant->user['phone']}}</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">الايميل</label>
                                        <div class="form-control">{{$tenant->user['email']}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nationality">الجنسية</label>
                                        <div class="form-control">{{$tenant->user['nationality']}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection