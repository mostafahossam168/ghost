@extends('Dashboard.layouts.master')
@section('title')
    اضافة مستخدم جديد
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">اضافة مستخدم جديد</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="default-color">الرئيسيه</a></li>
                    <li class="breadcrumb-item active">اضافة مستخدم جديد</li>
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
                    <form action="{{ route('admin.users.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="title">الاسم الاول</label>
                                <input type="text" name="f_name" class="form-control" value="{{ old('f_name') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="title">الاسم الاخير</label>
                                <input type="text" name="l_name" class="form-control" value="{{ old('l_name') }}">
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="email">البريد الالكتروني</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="inputName" class="control-label">الهاتف</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="title">الباسورد</label>
                                <input type="password" name="password" class="form-control" value="">
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="title">تاكيد الباسورد</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- row closed -->
@endsection
@section('js')
@endsection
