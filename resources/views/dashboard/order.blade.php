@extends('Dashboard.layouts.master')
@section('title')
    قائمة الطلبات
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">قائمة الطلبات</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="default-color">الرئيسيه</a></li>
                    <li class="breadcrumb-item active">قائمة الطلبات</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection




@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>رقم الطلب</th>
                                    <th>العميل</th>
                                    <th>الهاتف</th>
                                    <th>الاجمالي</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->f_name . ' ' . $order->user->l_name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->total }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $order->id }}" title="حذف"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <!-- delete_modal_Grade -->
                                    {{-- <div class="modal fade" id="delete{{ $order->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        حذف القسم
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.categories.destroy', $categorie->id) }}"
                                                        method="post">
                                                        @method('Delete')
                                                        @csrf
                                                        هل انت متاكد من عملية حذف القسم؟
                                                        <br>
                                                        <input id="id" type="hidden" name="id"
                                                            class="form-control" value="{{ $categorie->id }}">
                                                        <input id="id" type="text" name="name" readonly
                                                            class="form-control" value="{{ $categorie->name }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">الغاء</button>
                                                            <button type="submit" class="btn btn-danger">حذف</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- row closed -->
@endsection
{{-- @section('js')
@endsection --}}
