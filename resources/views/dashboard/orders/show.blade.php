@extends('dashboard.layouts.master')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('pageTitle')
    الطلب | {{ $response['orders'][0]['name']}}
@endsection

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="card card-xxl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">
                        الطلب
                        | {{ $response['orders'][0]['name']}}
                    </span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!-- begin::Order Details from response -->

                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">

                            <h3 class="fw-bolder m-0">name : {{ $response['orders'][0]['name'] }}</h3>
                        </div>

                        <div class="card-title m-0">

                            <h5 class="fw-bolder m-0">Subtotal Price : {{ $response['orders'][0]['subtotal_price'] }} SAR </h5>
                        </div>

                        <div class="card-title m-0">

                            <h5 class="fw-bolder m-0">total Price : {{ $response['orders'][0]['total_price'] }} SAR </h5>
                        </div>

                        <div class="card-title m-0">

                            <h5 class="fw-bolder m-0">total Discounts : {{ $response['orders'][0]['current_total_discounts'] }} SAR </h5>
                        </div>

                        <div class="card-title m-0">

                            <h3 class="fw-bolder m-0">
                                @if(isset($response['orders'][0]['fulfillments'][0]))
                                    <a class="fw-bolder text-primary fs-6 text-gray-800" href="{{$response['orders'][0]['order_status_url']}}"
                                       target="_blank">{{$response['orders'][0]['fulfillments'][0]['tracking_number']}}</a>
                                    {{--                                        {{$response['orders'][0]['fulfillments'][0]['tracking_number']}}--}}

                                @else
                                    <a class="fw-bolder text-primary fs-6 text-gray-800" href="{{$response['orders'][0]['order_status_url']}}"
                                       target="_blank">  لا يوجد رقم تتبع الشحنه</a>

                                @endif
                            </h3>
                        </div>
                    </div>


                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">app Id</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                               
                                <span class="fw-bolder fs-6 text-gray-800"> {{$response['orders'][0]['app_id']}}</span>
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Tracking Number</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800">
                                @if(isset($response['orders'][0]['fulfillments'][0]))
                                        <a class="fw-bolder text-primary fs-6 text-gray-800" href="{{$response['orders'][0]['order_status_url']}}"
                                           target="_blank">{{$response['orders'][0]['fulfillments'][0]['tracking_number']}}</a>
{{--                                        {{$response['orders'][0]['fulfillments'][0]['tracking_number']}}--}}

                                    @else
                                        <a class="fw-bolder text-primary fs-6 text-gray-800" href="{{$response['orders'][0]['order_status_url']}}"
                                           target="_blank">لا يوجد رقم تتبع الشحنه</a>

                                    @endif
                                </span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">buyer accepts marketing</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <span class="fw-bold text-gray-800 fs-6"> {{$response['orders'][0]['buyer_accepts_marketing']}}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Contact Phone
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                   title="Phone number must be active"></i></label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fw-bolder fs-6 text-gray-800 me-2"> {{$response['orders'][0]['phone']}}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">merchant_of_record_app_id</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <a href="#"
                                   class="fw-bold fs-6 text-gray-800 text-hover-primary"> {{$response['orders'][0]['merchant_of_record_app_id']}}</a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">order_number
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                   title="order_number"></i></label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800"> {{$response['orders'][0]['order_number']}}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">order status url</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <a class="fw-bolder fs-6 text-gray-800" href="{{$response['orders'][0]['order_status_url']}}"
                                   target="_blank">اضغط للعرض</a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Payment</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{$order?->payment_gateway_names}}</span>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">presentment currency</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{$order?->presentment_currency}}</span>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">processing method</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{$order?->processing_method }}</span>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">processed at</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{$order?->processed_at }}</span>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">reference</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{$order?->reference }}</span>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">referring site</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                @if($order?->referring_site != null)
                                    <a class="fw-bolder fs-6 text-gray-800" href="{{$order?->referring_site}}"
                                       target="_blank">اضغط للعرض</a>
                                @else
                                    <span class="fw-bolder fs-6 text-danger-800">لا يوجد رابط</span>
                                @endif
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!-- end::Order Details from response -->
            </div>
            <!--begin::Body-->
        </div>
    </div>
@endsection

@push('js')

@endpush


