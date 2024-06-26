@inject('users', 'App\Models\User')
@inject('services', 'App\Models\Service')
@inject('scooters', 'App\Models\Scooter')
{{-- @inject('contacts', 'App\Models\Contact') --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    @section('title')
        الرئيسيه
    @endsection
    @include('dashboard.layouts.head')
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{ asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('dashboard.layouts.main-header')

        @include('dashboard.layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0">لوحة التحكم</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">الباقات</p>
                                    <h4>{{ $services->count() }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                <a href="{{ route('admin.services.index') }}">المزيد</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fas fa-users highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">المستخدمين</p>
                                    <h4>{{ $users->count() }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                <a href="{{ route('admin.users.index') }}">المزيد</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">السكوترات</p>
                                    <h4>{{ $scooters->count() }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                <a href="{{ route('admin.scooters.index') }}">المزيد</a>
                            </p>
                        </div>
                    </div>
                </div>
                {{--
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-comments highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">الرسائل</p>
                                    <h4>{{ $contacts->count() }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                <a href="{{ route('admin.contacts.index') }}">المزيد</a>
                            </p>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- Orders Status widgets-->
            {{-- <div class="row">
                <div style="min-height: 400px;" class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title">
                                            اخر العمليات علي النظام
                                        </h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                    href="#students" role="tab" aria-controls="students"
                                                    aria-selected="true">المنتجات</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="teachers-tab" data-toggle="tab"
                                                    href="#teachers" role="tab" aria-controls="teachers"
                                                    aria-selected="false">المستخدمين
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab"
                                                    href="#parents" role="tab" aria-controls="parents"
                                                    aria-selected="false">الطلبات
                                                </a>
                                            </li>



                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="students" role="tabpanel"
                                        aria-labelledby="students-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-dark text-white">
                                                        <th>#</th>
                                                        <th>رقم الموديل</th>
                                                        <th>اسم المنتج</th>
                                                        <th>القسم</th>
                                                        <th>السعر</th>
                                                        <th>الصوره</th>
                                                        <th>الحاله</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($products->latest()->paginate(5) as $product)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $product->num_model }}</td>
                                                            <td>{{ $product->name }}</td>
                                                            <td>{{ $product->category->name }}</td>
                                                            <td>{{ $product->price }}</td>
                                                            <td>
                                                                <img src="{{ $product->main_image }}" alt=""
                                                                    style="width:50px;height:50px;">
                                                            </td>
                                                            <td>
                                                                @if ($product->active)
                                                                    <p class="badge bg-success text-white">مفعل</p>
                                                                @else
                                                                    <p class="badge bg-danger text-white">غير مفعل</p>
                                                                @endif
                                                            </td>
                                                        @empty
                                                            <td colspan="8">
                                                                <h4 class="text-danger">
                                                                    لا يوجد بيانات
                                                                </h4>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="teachers" role="tabpanel"
                                        aria-labelledby="teachers-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-dark text-white">
                                                        <th>#</th>
                                                        <th>اسم المستخدم</th>
                                                        <th>البريد الالكتروني</th>
                                                        <th>الهاتف</th>
                                                        <th>الحاله</th>
                                                    </tr>
                                                </thead>
                                                @forelse($users->orderBy('id','DESC')->paginate(5) as $user)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $user->f_name . ' ' . $user->l_name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->phone }}</td>
                                                            <td>
                                                                @if ($user->status)
                                                                    <p class="badge bg-success text-white">مفعل</p>
                                                                @else
                                                                    <p class="badge bg-danger text-white">غير مفعل</p>
                                                                @endif
                                                            </td>
                                                        @empty
                                                            <td colspan="8">
                                                                <h4 class="text-danger">
                                                                    لا يوجد بيانات
                                                                </h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="parents" role="tabpanel"
                                        aria-labelledby="parents-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                class="table center-aligned-table table-hover mb-0">

                                                <thead>
                                                    <tr class="table-dark text-white">
                                                        <th>#</th>
                                                        <th>رقم الطلب</th>
                                                        <th>العميل</th>
                                                        <th>الهاتف</th>
                                                        <th>الاجمالي</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($orders->latest()->paginate(5) as $order)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $order->id }}</td>
                                                            <td>{{ $order->user->f_name . ' ' . $order->user->l_name }}
                                                            </td>
                                                            <td>{{ $order->phone }}</td>
                                                            <td>{{ $order->total }}</td>
                                                        @empty
                                                            <td colspan="8">
                                                                <h4 class="text-danger">
                                                                    لا يوجد بيانات
                                                                </h4>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('dashboard.layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('dashboard.layouts.footer-scripts')

</body>

</html>
