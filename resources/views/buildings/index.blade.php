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
                            <table class="table-striped table" id="buildings">
                                <thead>
                                <tr>
                                    <td>رقم المبني</td>
                                    <td>المحافظة</td>
                                    <td>الولاية</td>
                                    <td>رقم المريع</td>
                                    <td>رقم القطعة</td>
                                    <td>الصورة</td>
                                    <td>الحساب</td>
                                    <td>اجراء</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Building::all() as $item)
                                    <tr>
                                        <td>{{$item['id']}}</td>
                                        <td>{{$item->gov->ar_gov}}</td>
                                        <td>{{$item->state->ar_state}}</td>
                                        <td>{{$item['block_number']}}</td>
                                        <td>{{$item['plot_number']}}</td>
                                        <td>
                                            @if($item['img'])
                                                <img style="widows: 100px;height: 100px;" src="{{asset($item['img'])}}" alt="هناك خطا في تحميل ملفات المبني"
                                                     srcset="">
                                            @endif
                                        </td>
                                        <td>{{$item->incomes->pluck('amount')->sum()}}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-flat btn-secondary" href="{{route('buildings.show', $item)}}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-flat btn-warning" href="{{route('buildings.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('buildings.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد؟')">
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
    <x-datatable id="buildings" print="1" cols="[0,1,2,3,4,5,6]"></x-datatable>
@endsection
