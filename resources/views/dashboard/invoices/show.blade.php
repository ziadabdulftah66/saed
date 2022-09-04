
@extends('layouts.admin')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> الفواتير </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">الفواتير
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> </h4>
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


                                <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h2>{{  $invoice->invoice_number}}  رقم الفاتوره  </h2>
                    <a href="{{ route('admin.invoice') }}" class="btn btn-primary ml-auto"><i class="fa fa-home"></i> الرجوع الي الفاتوره</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>رقم العميل</th>
                                <td>{{ $invoice->users->phone }}</td>
                                <th>الايميل</th>
                                <td>{{ $invoice->users->email }}</td>
                            </tr>
                            <tr>
                                <th>البلد</th>
                                <td>{{ $invoice->users->country }}</td>
                                <th>المدينه</th>
                                <td>{{ $invoice->users->city }}</td>
                            </tr>
                            <tr>
                                <th>رقم الفاتوره</th>
                                <td>{{ $invoice->invoice_number }}</td>
                                <th>تاريخ الفاتوره</th>
                                <td>{{ $invoice->invoice_date }}</td>
                            </tr>
                        </table>

                        <h3>تفاصيل الفاتوره</h3>

                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>اسم المنتج</th>
                                <th>رقم المنتج</th>
                                <th>كميه المنتج</th>
                                <th>سعر المنتج</th>
                                <th>المجموع</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoice->details as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->product_number }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->unit_price }}</td>
                                    <td>{{ $item->row_sub_total }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">مجموع الفاتوره</th>
                                <td>{{ $invoice->sub_total }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">الخصم</th>
                                <td>{{ $invoice->discountResult() }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">الضريبه</th>
                                <td>{{ $invoice->vat_value }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">المواصلات</th>
                                <td>{{ $invoice->shipping }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">مجموع تكلفه الفاتوره</th>
                                <td>{{ $invoice->total_due }}</td>
                            </tr>

                            </tfoot>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div></div>
    </div>


    @stop
