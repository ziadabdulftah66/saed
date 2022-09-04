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
                                <li class="breadcrumb-item"><a href=""> التصنيفات  </a>
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

                                                    <div class="card-body">
                                                        <form action="{{ route('admin.invoice.store') }}" method="post" class="form">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="customer_id">اسم العميل</label>
                                                                        <select name="user_id" class="select2 form-control">
                                                                            <optgroup label="من فضلك أختر القسم ">
                                                                                @if($users && $users -> count() > 0)
                                                                                    @foreach($users as $user)
                                                                                        <option
                                                                                            value="{{$user -> id }}">{{$user -> name}}</option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </optgroup>
                                                                        </select>
                                                                        @error('user_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="invoice_number">رقم الفاتوره</label>
                                                                        <input type="text" name="invoice_number" class="form-control">
                                                                        @error('invoice_number')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="invoice_date">تاريخ الفاتوره</label>
                                                                        <input type="date" name="invoice_date" class="form-control pickdate">
                                                                        @error('invoice_date')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="table-responsive">
                                                                <table class="table" id="invoice_details">
                                                                    <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th> اسم المنتج</th>
                                                                        <th>رقم المنتج</th>
                                                                        <th>الكميه</th>
                                                                        <th>السعر</th>

                                                                        <th>الاجمالي</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr class="cloning_row" id="0">
                                                                        <td>#</td>
                                                                        <td >
                                                                            <input type="text" name="product_name[0]" id="product_name" class="product_name form-control">
                                                                            @error('product_name')<span class="help-block text-danger">{{ $message }}</span>@enderror

                                                                        </td>
                                                                        <td >
                                                                            <input type="text" name="product_number[0]" id="product_number" class="product_number form-control">
                                                                            @error('product_number')<span class="help-block text-danger">{{ $message }}</span>@enderror

                                                                        </td>
                                                                        <td>
                                                                            <input type="number" name="unit_price[0]" step="0.01" id="unit_price" class="unit_price form-control">
                                                                            @error('unit_price')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                                                        </td>

                                                                        <td>
                                                                            <input value="" type="number" name="quantity[0]" step="0.01" id="quantity" class="quantity form-control">
                                                                            @error('quantity')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                                                        </td>

                                                                        <td>
                                                                            <input type="number" step="0.01" name="row_sub_total[0]" id="row_sub_total" class="row_sub_total form-control" readonly="readonly">
                                                                            @error('row_sub_total')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>

                                                                    <tfoot>
                                                                    <tr>
                                                                        <td colspan="6">
                                                                            <button type="button" class="btn_add btn btn-primary">اضافه منتج اخر</button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3"></td>
                                                                        <td colspan="2">الاجمالي</td>
                                                                        <td><input type="number" step="0.01" name="sub_total" id="sub_total" class="sub_total form-control" readonly="readonly"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3"></td>
                                                                        <td colspan="2">الخصم</td>
                                                                        <td>
                                                                            <div class="input-group mb-3">
                                                                                <select name="discount_type" id="discount_type" class="discount_type custom-select">
                                                                                    <option value="fixed">رقم</option>
                                                                                    <option value="percentage">النسبه المئويه</option>
                                                                                </select>
                                                                                <div class="input-group-append">
                                                                                    <input type="number" step="0.01" name="discount_value" id="discount_value" class="discount_value form-control" value="0.00">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3"></td>
                                                                        <td colspan="2">الضريبه</td>
                                                                        <td><input value=".15" type="number" step="0.01" name="vat_value" id="vat_value" class="vat_value form-control" readonly="readonly"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3"></td>
                                                                        <td colspan="2">المواصلات</td>
                                                                        <td><input type="number" step="0.01" name="shipping" id="shipping" class="shipping form-control"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3"></td>
                                                                        <td colspan="2">الاجمالي</td>
                                                                        <td><input type="number" step="0.01" name="total_due" id="total_due" class="total_due form-control" readonly="readonly"></td>
                                                                    </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>







                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" name="save" class="btn btn-primary">
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
@section('script')
    <script src="{{asset('invoices/js/Custom.js') }}"></script>

@stop

