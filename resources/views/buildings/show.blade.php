@extends('layouts.layout')
@section('title',"مبني رقم $building->id")
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

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>المحافظة</label>
                                        <div class="form-control">{{$building->gov['ar_gov']}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>الولاية</label>
                                        <div class="form-control">{{$building->state['ar_state']}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>مربع رقم</label>
                                        <div class="form-control">{{$building['block_number']}}</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="plot_number">رقم القطعة</label>
                                        <div class="form-control">{{$building['plot_number']}}</div>
                                        <x-error name="plot_number"></x-error>
                                    </div>
                                    <div class="form-group">
                                        @if($building['img'])
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <img src="{{asset($building['img'])}}" alt="" style="width: 100px;height: 100px" class="img-thumbnail">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ملاك المبني</h3>
                            <div class="card-tools">

                                <form action="{{route('building.attach.owners', $building)}}" method="post" class="form-inline">
                                    @csrf
                                    <div class="form-group">
                                        <select name="owner_id" id="owner_id" class="form-control">
                                            @foreach(\App\Owner::all() as $item)
                                                <option value="{{$item['id']}}">{{$item->user['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="percentage" id="percentage" class="form-control mr-1" placeholder="ادخل نسبة المالك">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-plus"></i></button>
                                </form>

                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="owners">
                                <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>البريد</th>
                                    <th>الهاتف</th>
                                    <th>الجنسية</th>
                                    <th>النسبة</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($building->owners as $item)
                                    <tr>
                                        <td>{{$item->user['name']}}</td>
                                        <td>{{$item->user['email']}}</td>
                                        <td>{{$item->user['phone']}}</td>
                                        <td>{{$item->user['nationality']}}</td>
                                        <td>{{$item->pivot->percentage}}</td>
                                        <td>
                                            <form action="{{route('buildings.owners.detach',[$building, $item])}}" method="post">
                                                @csrf
                                                <input type="hidden" name="percentage" value="{{$item->pivot->percentage}}">
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <x-datatable id="owners"></x-datatable>
@endsection