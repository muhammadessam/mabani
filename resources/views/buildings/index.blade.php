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
                                <a href="{{route('buildings.create')}}" class="btn btn-flat btn-success"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body" style="overflow: auto">
                            <table class="table table-striped text-center" id="buildings">
                                <thead>
                                <tr>
                                    <th>رقم المبني</th>
                                    <th>المحافظة</th>
                                    <th>الولاية</th>
                                    <th>مربع</th>
                                    <th>رقم القطعة</th>
                                    <th>صورة</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Building::all() as $item)
                                    <tr>
                                        <td>{{$item['id']}}</td>
                                        <td>{{$item->gov['ar_gov']}}</td>
                                        <td>{{$item->state['ar_state']}}</td>
                                        <td>{{$item['block_number']}}</td>
                                        <td>{{$item['plot_number']}}</td>
                                        <td>
                                            @if($item['img'])
                                                <img class="img-thumbnail" style="width: 100px;height: 100px;" src="{{asset($item['img'])}}" alt="photo">
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <a class="btn btn-flat btn-info ml-2" href="{{route('buildings.show', $item)}}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-flat btn-warning ml-2" href="{{route('buildings.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('buildings.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></button>
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
    <x-datatable id="buildings"></x-datatable>
@endsection
