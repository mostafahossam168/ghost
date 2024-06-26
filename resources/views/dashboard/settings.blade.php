@extends('Dashboard.layouts.master')
@section('title')
    الاعدادات
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">الاعدادات</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="default-color">الرئيسيه</a></li>
                    <li class="breadcrumb-item active">الاعدادات</li>
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
                    <form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col">
                                <label for="title">الهاتف</label>
                                <input type="text" name="phone" class="form-control" value="{{ $setting->phone }}">
                                @error('phone')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="title">البريد الالكتروني</label>
                                <input type="email" name="email" class="form-control" value="{{ $setting->email }}">
                                @error('email')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="i_link">العنوان</label>
                                <input type="text" name="address" class="form-control" value="{{ $setting->address }}">
                                @error('address')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="f_link">لينك الفيس بوك</label>
                                <input type="text" name="f_link" class="form-control" value="{{ $setting->f_link }}">
                                @error('f_link')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="i_link">لينك الانستجرام</label>
                                <input type="text" name="i_link" class="form-control" value="{{ $setting->i_link }}">
                                @error('i_link')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="t_link">لينك تويتر</label>
                                <input type="text" name="t_link" class="form-control" value="{{ $setting->t_link }}">
                                @error('t_link')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="y_link">لينك اليوتيوب</label>
                                <input type="text" name="y_link" class="form-control" value="{{ $setting->y_link }}">
                                @error('y_link')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="commercial_number">الرقم التجاري</label>
                                <input type="text" name="commercial_number" class="form-control"
                                    value="{{ $setting->commercial_number }}">
                                @error('commercial_number')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="tax_number">الرقم الضريبي</label>
                                <input type="text" name="tax_number" class="form-control"
                                    value="{{ $setting->tax_number }}">
                                @error('tax_number')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">عن التطبيق <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="about_app" id="exampleFormControlTextarea1" rows="10">{{ $setting->about_app }}</textarea>
                            @error('about_app')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <br>
                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">تحديث</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
