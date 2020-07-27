@extends('layouts.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{\App\Income::all()->pluck('amount')->sum() - \App\Expense::all()->pluck('amount')->sum()}}</h3>

                            <p>الحساب</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-building-o"></i>
                        </div>
                        <a href="{{route('buildings.index')}}" class="small-box-footer">عرض<i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{\App\Building::all()->count()}}</h3>

                            <p>مباني</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-building-o"></i>
                        </div>
                        <a href="{{route('buildings.index')}}" class="small-box-footer">عرض<i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{\App\Unit::all()->count()}}</h3>

                            <p>وحدة</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <a href="{{route('units.index')}}" class="small-box-footer">عرض<i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{\App\Floor::all()->count()}}</h3>

                            <p>طابق</p>
                        </div>
                        <div class="icon">
                            <i>
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-layers-fill"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z"/>
                                    <path fill-rule="evenodd"
                                          d="M2.125 8.567l-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l.418-.785-.419.785-5.169-2.756z"/>
                                </svg>
                            </i>
                        </div>
                        <a href="{{route('floors.index')}}" class="small-box-footer">عرض<i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{\App\Tenant::all()->count()}}</h3>

                            <p>مستأجر</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="{{route('tenants.index')}}" class="small-box-footer">عرض<i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{\App\Building::all()->count()}}</h3>

                            <p>الموظفون</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{route('employees.index')}}" class="small-box-footer">عرض<i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{\App\Owner::all()->count()}}</h3>

                            <p>المالكون</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="{{route('owners.index')}}" class="small-box-footer">عرض<i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
