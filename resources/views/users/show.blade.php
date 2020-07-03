@extends('layouts.layout')
@section('title', $user['name'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-flat btn-success" href="{{route('admin.users.index')}}"><i class="fa fa-list"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="name">الاسم</label>
                                    <div class="form-control">{{$user['name']}}</div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="email">الايميل</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{$user['email']}}">
                                    <x-error name="email"></x-error>
                                </div>
                            </div>
                            <div class="row">
                                <form action="{{route('admin.sync.user.roles', $user)}}" method="post">
                                    @csrf
                                    @foreach(\App\Role::all() as $item)
                                        <div class="col">
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" class="minimal-red" name="roles[]" value="{{$item['id']}}" {{$user->roles->contains($item) ? 'checked':''}}>
                                                    {{$item['name']}}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                    <button class="btn btn-flat btn-success" type="submit"><i class="fa fa-save"></i> حفظ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection