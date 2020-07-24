@extends('layouts.layout')
@section('title', 'العقود')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">العقود</h3>
                        <div class="card-tools">
                            <a class="btn btn-flat btn-success" href="{{route('contracts.create')}}"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body"  style="overflow: auto">
                        <table class="table-striped table" id="contracts">
                            <thead>
                            <tr>
                                <th>الوحدة</th>
                                <th>المستأجر</th>
                                <th>رقم العقد</th>
                                <th>من</th>
                                <th>الي</th>
                                <th>المدة</th>
                                <th>سعر الايجار</th>
                                <th>طريقة الدفع</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            @foreach(\App\Contract::all() as $item)
                                <tr>
                                    <td>{{$item->unit['name']}}</td>
                                    <td>{{$item->tenant->user['name']}}</td>
                                    <td>{{$item['number']}}</td>
                                    <td>{{$item['start']}}</td>
                                    <td>{{$item['end']}}</td>
                                    <td>{{$item['period']}} شهرا</td>
                                    <td>{{$item['rent']}}</td>
                                    <td>{{$item['payment_method']}}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-flat btn-primary ml-1" href="{{route('contracts.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('contracts.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <x-datatable id="contracts" print="0"></x-datatable>
@endsection
