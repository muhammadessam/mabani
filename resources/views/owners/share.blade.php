@extends('layouts.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="overflow: auto">
                        <div class="card-header">
                            <h3 class="card-title">تقسم نسبة الارباح</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('get.owner.share')}}" method="get">

                                <div class="form-group">
                                    <label for="building_id">اختر رقم المبني</label>
                                    <select class="form-control" name="building_id" id="building_id">
                                        @foreach(\App\Building::all() as $item)
                                            <option value="{{$item['id']}}">{{$item['id']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="amount">ادخل المبلغ المراد تقسيمه</label>
                                    <input type="number" name="amount" id="amount" class="form-control" step=".1"
                                           value="{{request('amount')}}">
                                </div>

                                <button type="submit" class="btn btn-flat btn-primary">تقسيم</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if($ownersShare)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>المالك</th>
                                        <th>النسبة</th>
                                        <th>المبلغ طبقا للنسبة</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ownersShare as $owner => $share)
                                        <tr>
                                            <td>{{\App\Owner::find($owner)->user->name}}</td>
                                            <td>{{$share[0]}}</td>
                                            <td>{{$share[1]}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
