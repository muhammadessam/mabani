@extends('layouts.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form class="form-inline" action="{{route('floors.update', $floor)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group ml-1">
                                    <input type="text" name="floor" id="name" class="form-control @error('floor') is-invalid @enderror" value="{{$floor->floor}}">
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