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
                            <form action="{{route('buildings.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <gov-state :govs="{{\App\Gov::all()}}" :selected_gov_prop="{{old('gov_id') ?? -1}}"></gov-state>
                                    <x-error name="state_id"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="block_number">مربع رقم</label>
                                    <input type="number" step=".1" name="block_number" id="block_number" class="form-control" value="{{old('block_number')}}">
                                    <x-error name="block_number"></x-error>
                                </div>
                                <div class="form-group">
                                    <label for="plot_number">رقم القطعة</label>
                                    <input type="number" step=".1" name="plot_number" id="plot_number" class="form-control" value="{{old('plot_number')}}">
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