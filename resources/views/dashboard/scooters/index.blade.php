@extends('dashboard.layouts.master')
@section('title')
    قائمة السكوترات
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">قائمة السكوترات</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="default-color">الرئيسيه</a></li>
                    <li class="breadcrumb-item active">قائمة السكوترات</li>
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
                    {{-- <a href="{{ route('admin.scooters.create') }}" class="button x-small">اضافة مستخدم جديد</a> --}}
                    <br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>imie</th>
                                    <th>المستخدم</th>
                                    {{-- <th>البريد الالكتروني</th>
                                    <th>الهاتف</th>
                                    <th>الحالة</th> --}}
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($scooters as $scooter)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $scooter->imei }}</td>
                                        <td>{{ $scooter->user->name }}</td>
                                        {{-- <td>{{ $scooter->email }}</td>
                                        <td>{{ $scooter->phone }}</td>
                                        <td>
                                            @if ($scooter->status)
                                                <label class="badge badge-success">مفعل</label>
                                            @else
                                                <label class="badge badge-danger">غير مفعل</label>
                                            @endif
                                        </td> --}}
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $scooter->id }}" title="تعديل"><i
                                                    class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $scooter->id }}" title="حذف"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- edit_modal_Grade -->
                                    <div class="modal fade" id="edit{{ $scooter->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        تعديل حالة المستخدم
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form action="{{ route('admin.scooters.update', $scooter->id) }}"
                                                        method="post">
                                                        @method('patch')
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name" class="mr-sm-2">اسم المستخدم
                                                                    :</label>
                                                                <input id="name" type="text" name="name" readonly
                                                                    class="form-control" value="{{ $scooter->name }}"
                                                                    required>
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $scooter->id }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="control-label">الحاله</label>
                                                                <select class="form-control form-white" name="status">
                                                                    <option value="1" @selected($scooter->status == 1)>مفعل
                                                                    </option>
                                                                    <option value="0" @selected($scooter->status == 0)>
                                                                        غير مفعل</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">الغاء</button>
                                                            <button type="submit" class="btn btn-success">تعديل</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- delete_modal_Grade -->
                                    <div class="modal fade" id="delete{{ $scooter->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        حذف المستخدم
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.scooters.destroy', $scooter->id) }}"
                                                        method="post">
                                                        @method('Delete')
                                                        @csrf
                                                        هل انت متاكد من عملية حذف المستخدم
                                                        ؟
                                                        <br>
                                                        <input id="id" type="hidden" name="id"
                                                            class="form-control" value="{{ $scooter->id }}">
                                                        <input id="id" type="text" name="name" readonly
                                                            class="form-control" value="{{ $scooter->name }}">
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
