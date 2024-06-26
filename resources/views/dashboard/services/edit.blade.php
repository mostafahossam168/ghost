@extends('dashboard.layouts.master')
@section('title')
    تعديل باقة
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">تعديل باقة </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="default-color">الرئيسيه</a></li>
                    <li class="breadcrumb-item active">تعديل باقة </li>
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
                    <form action="{{ route('admin.services.update', $service->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col">
                                <label for="title">اسم الباقة</label>
                                <input type="text" name="name" class="form-control" value="{{ $service->name }}">
                                @error('name')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="duration">المده</label>
                                <input type="text" name="duration" class="form-control" value="{{ $service->duration }}">
                                @error('duration')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="title">سعر الباقة</label>
                                <input type="number" name="price" step="any" class="form-control"
                                    value="{{ $service->price }}">
                                @error('price')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group ">
                            <label class="control-label">الحاله</label>
                            <select class="form-control h-100 form-white" name="status">
                                <option value="1" @selected($service->status == 1)>مفعل
                                </option>
                                <option value="0" @selected($service->status == 0)>
                                    غير مفعل</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">الوصف<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="10">{{ $service->description }}</textarea>
                            @error('description')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <br>
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
