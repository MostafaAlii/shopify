@extends('dashboard.layouts.master')

@section('css')

@endsection

@section('pageTitle')
    {{ $PageTitle }}
@endsection

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="row gy-5 g-xl-3">
            <!--begin::Order Statistics-->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 2-->
                <div class="card card-xl-stretch">
                    <!--begin::Header-->
                    <div class="card-header border-0 bg-danger py-5">
                        <h3 class="card-title fw-bolder text-white">
                            <a href="{{route('orders.index')}}" class="text-white text-hover-white">
                                Order
                            </a>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <!--begin::Chart-->
                        <div class="mixed-widget-2-chart card-rounded-bottom bg-danger" data-kt-color="danger" style="height: 200px"></div>
                        <!--end::Chart-->
                        <!--begin::Stats-->
                        <div class="card-p mt-n20 position-relative">
                            <!--begin::Row-->
                            <div class="row g-0">
                                <!--begin::Col-->
                                <div class="col bg-light-success px-6 py-8 rounded-2 me-7 mb-7">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                                        <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                                        <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                                        <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                                    </svg>
                                </span>
                                    <!--end::Svg Icon-->
                                    <a href="#" class="text-dark fw-bold fs-6">
                                        Paid
                                        <span class="text-gray-50 fs-7 fw-bold ms-1">{{Order::getOrderCountByPaidFinancialStatus()->count()}}</span>
                                        <br>
                                        total ( {{Order::getTotalPriceOfPaidOrders()}} $ )
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                                        <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                                        <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                                        <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                                    </svg>
                                </span>
                                    <!--end::Svg Icon-->
                                    <a href="#" class="text-dark fw-bold fs-6">
                                        Pending
                                        <span class="text-gray-50 fs-7 fw-bold ms-1">{{Order::getOrderCountByPendingFinancialStatus()->count()}}</span>
                                        <br>
                                        total ( {{Order::getTotalPriceOfPendingOrders()}} $ )
                                    </a>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row g-0">
                                <!--begin::Col-->
                                <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                                        <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                                        <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                                        <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                                    </svg>
                                        <br>
                                    <!--end::Svg Icon-->
                                    <a href="#" class="text-dark fw-bold fs-6 mt-2">
                                        Partially Refunded <br>
                                        <span class="text-gray-50 fs-7 fw-bold ms-1">{{Order::getOrderCountByPartiallyRefundedFinancialStatus()->count()}}</span>
                                        <br>
                                        total ( {{Order::getTotalPriceOfPartiallyRefundedOrders()}} $ )
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col bg-light-success px-6 py-8 rounded-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <a href="#" class="text-dark fw-bold fs-6 mt-2">
                                        Refunded
                                        <span class="text-gray-50 fs-7 fw-bold ms-1">{{Order::getOrderCountByRefundedFinancialStatus()->count()}}</span>
                                        <br>
                                        total ( {{Order::getTotalPriceOfRefundedOrders()}} $ )
                                    </a>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <br>
                            <!-- begin::Row -->
                            <div class="row g-0">
                                <!--begin::Col-->
                                <div class="col bg-dark px-8 py-9 rounded-3 me-8">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                                        <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                                        <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                                        <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                                    </svg>
                                        <!--end::Svg Icon-->
                                    <a href="#" class="text-light text-lg-center pull-left fw-bold fs-7 mt-3">
                                        Voided
                                        <span class="text-gray-50 fs-8 fw-bold ms-2">{{Order::getOrderCountByVoidedFinancialStatus()->count()}}</span>
                                        total ( {{Order::getTotalPriceOfVoidedOrders()}} $ )
                                    </a>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!-- end::Row -->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Order Statistics-->
            </div>
            <!--end::Col-->
            <!-- Start Order Charts -->
            <div class="col-xl-8">
                <div class="card card-xl-stretch-50 mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden">
                        <!--begin::Hidden-->
                        <div class="d-flex flex-stack flex-wrap flex-grow-1 px-9 pt-9 pb-3">
                            <div class="me-2">
                                <span class="fw-bolder text-gray-800 d-block fs-3">Sales</span>
                                <span class="text-gray-400 fw-bold">Oct 8 - Oct 26 21</span>
                            </div>
                            <div class="fw-bolder fs-3 text-primary">$15,300</div>
                        </div>
                        <!--end::Hidden-->
                        <!--begin::Chart-->
                        <div class="mixed-widget-10-chart" data-kt-color="primary" style="height: 200px"></div>
                        <!--end::Chart-->
                    </div>
                </div>
            </div>
            <!-- End Order Charts -->
        </div>
    </div>
@endsection

@section('js')

@endsection
