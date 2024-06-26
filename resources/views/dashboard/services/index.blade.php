@extends('dashboard.layouts.master')
@section('title')
    قائمة الباقات
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">قائمة الباقات</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="default-color">الرئيسيه</a></li>
                    <li class="breadcrumb-item active">قائمة الباقات</li>
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
                    <a href="{{ route('admin.services.create') }}" class="button x-small">اضافة باقة جديده</a>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم الباقه</th>
                                    <th>الوصف</th>
                                    <th>السعر</th>
                                    <th>المده</th>
                                    <th>الحاله</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->description }}</td>
                                        <td>{{ $service->price }}</td>
                                        <td>{{ $service->duration }}</td>
                                        <td>
                                            @if ($service->status)
                                                <p class="badge bg-success text-white">مفعله</p>
                                            @else
                                                <p class="badge bg-danger text-white">غير مفعله</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.services.edit', $service->id) }}"
                                                class="btn btn-info btn-sm" title="تعديل">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $service->id }}" title="حذف"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- delete_modal_Grade -->
                                    <div class="modal fade" id="delete{{ $service->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        حذف الباقه
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.services.destroy', $service->id) }}"
                                                        method="post">
                                                        @method('Delete')
                                                        @csrf
                                                        هل انت متاكد من عملية حذف الباقه
                                                        ؟
                                                        <br>
                                                        <input id="id" type="hidden" name="id"
                                                            class="form-control" value="{{ $service->id }}">
                                                        <input id="id" type="text" name="name" readonly
                                                            class="form-control" value="{{ $service->name }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">الغاء</button>
                                                            <button type="submit" class="btn btn-danger">حذف</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- row closed -->
@endsection
@section('js')
@endsection
