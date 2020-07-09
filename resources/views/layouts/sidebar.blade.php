<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">لوحة تحكم مباني</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>الرئيسية</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{request()->routeIs('users.*')||request()->routeIs('roles.*') || request()->routeIs('permissions.*') ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-tree"></i>
                            <p>
                                الصلاحيات والمشرفين
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('users.index')}}" class="nav-link {{request()->routeIs('users.*') ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>المشرفين</p>
                                    <span class="badge badge-danger float-left">{{\App\User::Admins()->count()}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('roles.index')}}" class="nav-link {{request()->routeIs('roles.*') ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>الادوار</p>
                                    <span class="badge-danger badge float-left">{{\App\Role::all()->count()}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('permissions.index')}}" class="nav-link {{request()->routeIs('permissions.*') ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>الاذونات</p>
                                    <span class="badge-danger badge float-left">{{\App\Permission::all()->count()}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('buildings.index')}}" class="nav-link {{request()->routeIs('buildings.*') ? 'active' : ''}}">
                            <i class="nav-icon fa fa-building"></i>
                            <p>المباني</p>
                            <span class="badge badge-danger float-left">{{\App\Building::all()->count()}}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('floors.index')}}" class="nav-link" {{request()->routeIs('floors.*') ? 'active':''}}>
                            <i class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-layers-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z"/>
                                    <path fill-rule="evenodd" d="M2.125 8.567l-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l.418-.785-.419.785-5.169-2.756z"/>
                                </svg>
                            </i>
                            <p>الطوابق</p>
                            <span class="badge badge-danger float-left">{{\App\Floor::all()->count()}}</span>
                        </a>
                    </li>

                    <li class="nav-item has-treeview {{request()->routeIs('contracts.*')||request()->routeIs('units.*') || request()->routeIs('unit-types.*') ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-cubes"></i>
                            <p>
                                الوحدات
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('unit-types.index')}}" class="nav-link {{request()->routeIs('unit-types.*') ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>الانواع</p>
                                    <span class="badge badge-danger float-left">{{\App\UnitType::all()->count()}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('units.index')}}" class="nav-link {{request()->routeIs('units.*') ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>الوحدات</p>
                                    <span class="badge badge-danger float-left">{{\App\Unit::all()->count()}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contracts.index')}}" class="nav-link {{request()->routeIs('contracts.*') ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>العقود</p>
                                    <span class="badge badge-danger float-left">{{\App\Contract::all()->count()}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('owners.index')}}" class="nav-link {{request()->routeIs('owners.*') ?'active':''}}">
                            <i class="nav-icon fa fa-user"></i>
                            <p>المالكون</p>
                            <span class="badge badge-danger float-left">{{\App\Owner::all()->count()}}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('employees.index')}}" class="nav-link {{request()->routeIs('employees.*') ?'active':''}}">
                            <i class="nav-icon fa fa-user-secret"></i>
                            <p>الموظفون</p>
                            <span class="badge badge-danger float-left">{{\App\Employee::all()->count()}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('tenants.index') }}" class="nav-link {{request()->routeIs('tenants.*') ? 'active':''}}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>المستأجرون</p>
                            <span class="float-left badge-danger badge">{{\App\Tenant::all()->count()}}</span>
                        </a>
                    </li>


                    <li class="nav-item has-treeview {{request()->routeIs('income.*') || request()->routeIs('expenses.*') ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-money"></i>
                            <p>
                                الاموال
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview {{request()->routeIs('income.*') ? 'menu-open' : ''}}">
                            <li class="nav-item has-treeview {{request()->routeIs('income.*') ? 'menu-open' : ''}}">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fa fa-cubes"></i>
                                    <p>
                                        الدخل
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('income.category.index')}}" class="nav-link {{request()->routeIs('income.category.*') ? 'active' : ''}}">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>الانواع</p>
                                            <span class="badge badge-danger float-left"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('income.income.index')}}" class="nav-link {{request()->routeIs('income.income.*') ? 'active' : ''}}">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>الدخل</p>
                                            <span class="badge badge-danger float-left"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview {{request()->routeIs('expenses.*') ? 'menu-open':''}} ">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fa fa-cubes"></i>
                                    <p>
                                        المصروفات
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('expenses.category.index')}}" class="nav-link {{request()->routeIs('expenses.category.*') ? 'active' : ''}}">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>الانواع</p>
                                            <span class="badge badge-danger float-left"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('units.index')}}" class="nav-link {{request()->routeIs('expenses.expense.*') ? 'active' : ''}}">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>المصروفات</p>
                                            <span class="badge badge-danger float-left"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fa fa-file"></i>
                            <p>التقارير</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('settings.index')}}" class="nav-link {{request()->routeIs('settings.*') ? 'active':''}}">
                            <i class="nav-icon fa fa-gear"></i>
                            <p>الاعدادات</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
