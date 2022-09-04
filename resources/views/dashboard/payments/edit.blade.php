
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
                                <li class="breadcrumb-item"><a href="">  الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> تعديل -
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل دفع العميل </h4>
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
                                    <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST" class="form">
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
                                                                        value="{{$user -> id }}"
                                                                        @if($user -> id == $payment-> user_id) selected @endif>{{$user -> name}}</option>
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
                                                    <input value="{{$payment->invoice_number}}" type="text" name="invoice_number" class="form-control">
                                                    @error('invoice_number')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="payment_date">تاريخ الدفعه</label>
                                                    <input value="{{$payment->payment_date}}" type="date" name="payment_date" class="form-control pickdate">
                                                    @error('payment_date')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="payment_number">رقم الدفعه</label>
                                                    <input  value="{{$payment->payment_number}}" type="text" name="payment_number" class="form-control">
                                                    @error('payment_number')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="payment_price">مبلغ الدفعه</label>
                                                    <input value="{{$payment->payment_price}}" type="number" name="payment_price" class="form-control pickdate">
                                                    @error('payment_price')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>









                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit"  class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> تحديث
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


@stop
                    @section('script')
                        <script src="{{asset('invoices/js/Custom.js') }}"></script>

@stop
