@extends('layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.sections')}}"> التصنيفات  </a>
                                </li>
                                <li class="breadcrumb-item active"> أضافه تصنيف
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> أضافة تصنيف </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('admin.products.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf




                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> بيانات المنتج </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> رقم المنتج
                                                            </label>
                                                            <input type="text" id="product_number"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('product_number')}}"
                                                                   name="product_number">
                                                            @error("product_number")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">اسم المنتج
                                                            </label>
                                                            <input type="text" id="product_name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('name')}}"
                                                                   name="product_name">
                                                            @error("product_name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1"> اختر القسم
                                                                    </label>
                                                                    <select name="category_id" class="select2 form-control">
                                                                        <optgroup label="من فضلك أختر القسم ">
                                                                            @if($categories && $categories -> count() > 0)
                                                                                @foreach($categories as $category)
                                                                                    <option
                                                                                        value="{{$category -> id }}">{{$category -> name}}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </optgroup>
                                                                    </select>
                                                                    @error('category_id')
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1"> اختر التصنيف
                                                                    </label>
                                                                    <select name="section_id" class="select2 form-control">
                                                                        <optgroup label="من فضلك أختر التصنيف ">
                                                                            @if($sections && $sections -> count() > 0)
                                                                                @foreach($sections as $section)
                                                                                    <option
                                                                                        value="{{$section -> id }}">{{$section -> name}}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </optgroup>
                                                                    </select>
                                                                    @error('section_id')
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                            </div>
                                                        </div>





                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="projectinput1"> اختر الماركه
                                                                            </label>
                                                                            <select name="brand_id" class="select2 form-control">
                                                                                <optgroup label="من فضلك أختر الماركه ">
                                                                                    @if($brands && $brands -> count() > 0)
                                                                                        @foreach($brands as $brand)
                                                                                            <option
                                                                                                value="{{$brand -> id }}">{{$brand -> name}}</option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </optgroup>
                                                                            </select>
                                                                            @error('brand_id')
                                                                            <span class="text-danger"> {{$message}}</span>
                                                                            @enderror

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="projectinput1">تكلفه المنتج
                                                                            </label>
                                                                            <input type="text" id="Cost_price"
                                                                                   class="form-control"
                                                                                   placeholder="  "
                                                                                   value="{{old('Cost_price')}}"
                                                                                   name="Cost_price">
                                                                            @error("Cost_price")
                                                                            <span class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="projectinput1">سعر البيع
                                                                                            </label>
                                                                                            <input type="text" id="selling_price"
                                                                                                   class="form-control"
                                                                                                   placeholder="  "
                                                                                                   value="{{old('selling_price')}}"
                                                                                                   name="selling_price">
                                                                                            @error("selling_price")
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>

                                                                                    <div>
                                                                                    </div>
                                                                                    </div>

                                                </div>
                                            </di










                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> تحديث
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@stop

