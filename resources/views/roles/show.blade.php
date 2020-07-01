@extends('layouts.layout')
@section('title', $role['name'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.store.role.permissions', $role)}}" method="post">
                                @csrf
                                @foreach(\App\Permission::all() as $item)
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" class="minimal-red" name="permissions[]" value="{{$item['id']}}" {{$role->permissions->contains($item) ? 'checked':''}}>
                                            {{$item['name']}}
                                        </label>
                                    </div>
                                @endforeach
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection