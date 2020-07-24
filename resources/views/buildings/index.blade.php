@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">المباني</h3>
                        <div class="card-tools">
                            <a href="{{route('buildings.create')}}" class="btn btn-flat btn-success"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body" style="overflow: auto">

                        <div class="row">

                            @foreach(\App\Building::all() as $item)

                            <div class="col-1">
                                <!-- Button trigger modal -->
                                <a type="button" data-toggle="modal" data-target="#modal{{$item['id']}}"
                                    style="cursor: pointer;">
                                    <div class="row">
                                        <div class="col">
                                            @if($item['img'])
                                            <img style="width: 100px;height: 100px; border: 1px solid black;"
                                                src="{{asset($item['img'])}}" alt="photo">
                                            @endif
                                            <br>
                                            <div class="row">
                                                <div class="col text-center">
                                                    <span class="badge badge-danger text-center">{{$item['id']}}</span>
                                                    /
                                                    <span
                                                        class="badge badge-danger text-center">{{$item['block_number']}}</span>
                                                    /
                                                    <span
                                                        class="badge badge-danger text-center">{{$item['plot_number']}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="modal{{$item['id']}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="">رقم المبني</label>
                                                            <div class="form-control">
                                                                {{$item['id']}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="">المحافظة</label>
                                                            <div class="form-control">
                                                                {{$item->gov['ar_gov']}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="">الولاية</label>
                                                            <div class="form-control">
                                                                {{$item->state['ar_state']}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="">رقم المربع</label>
                                                            <div class="form-control">
                                                                {{$item['block_number']}} </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="">رقم القطعة</label>
                                                            <div class="form-control">
                                                                {{$item['plot_number']}} </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="">رقم المبني</label>
                                                            <div class="form-control">
                                                                {{$item['id']}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex">
                                                        <a class="btn btn-flat btn-info ml-2"
                                                            href="{{route('buildings.show', $item)}}"><i
                                                                class="fa fa-eye"></i></a>
                                                        <a class="btn btn-flat btn-warning ml-2"
                                                            href="{{route('buildings.edit', $item)}}"><i
                                                                class="fa fa-edit"></i></a>
                                                        <form action="{{route('buildings.destroy', $item)}}"
                                                            method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-flat btn-danger"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<x-datatable id="buildings" print="0"></x-datatable>
@endsection
