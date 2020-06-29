@extends('layouts.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form class="form-inline" action="{{route('admin.roles.update', $role)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group ml-1">
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$role->name}}">
                                </div>
                                <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-plus"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection