@extends('layouts.layout')
@section('title', 'اضافة مبني جديد')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-flat btn-success" href="{{route('buildings.index')}}"><i class="fa fa-list"></i></a>
                        </div>
                        <div class="card-body">
                            <form action="{{route('buildings.update', $building)}}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <gov-state :govs="{{\App\Gov::all()}}" :selected_gov_prop="{{$building['gov_id']}}" :selected_states_prop="{{$building['state_id']}}"></gov-state>
                                    <x-error name="state_id"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="block_number">مربع رقم</label>
                                    <input type="number" step=".1" name="block_number" id="block_number" class="form-control" value="{{$building['block_number']}}">
                                    <x-error name="block_number"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="plot_number">رقم القطعة</label>
                                    <input type="number" step=".1" name="plot_number" id="plot_number" class="form-control" value="{{$building['plot_number']}}">
                                    <x-error name="plot_number"></x-error>
                                </div>

                                <div class="form-group">
                                    <label for="img_temp">صورة المبني</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="img_temp" name="img_temp">
                                            <label class="custom-file-label" for="img_temp">صورة المبني</label>
                                        </div>
                                    </div>
                                    @if($building['img'])
                                        <div class="row mt-2">
                                            <div class="col">
                                                <img src="{{asset($building['img'])}}" alt="" style="width: 100px;height: 100px" class="img-thumbnail">
                                            </div>
                                        </div>
                                    @endif
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