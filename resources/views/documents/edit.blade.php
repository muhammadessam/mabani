@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تعديل</h3>
                        <div class="card-tools">
                            <a class="btn btn-flat btn-success" href="{{route('documents.index')}}"><i
                                    class="fa fa-list"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('documents.update',$document)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{$document['name']}}">
                                <x-error name="name"></x-error>
                            </div>
                            <div class="form-group">
                                <label for="note">الملاحظات</label>
                                <textarea type="text" name="note" id="note"
                                    class="form-control">{{$document['note']}}</textarea>
                                <x-error name="note"></x-error>
                            </div>
                            <div class="form-group">
                                <label for="expire_day">التاريخ</label>
                                <input type="date" name="expire_day" id="expire_day" class="form-control"
                                    value="{{$document['expire_day']}}">
                                <x-error name="expire_day"></x-error>
                            </div>
                            <button class="btn btn-flat btn-success" type="submit"><i class="fa fa-save"></i>
                                حفظ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<x-datatable id="documents"></x-datatable>
@endsection
