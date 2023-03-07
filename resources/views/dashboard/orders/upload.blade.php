@extends('dashboard.layouts.master')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('pageTitle')
    رفع طلبات
@endsection

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="card card-xxl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">
                        رفع طلبات
                    </span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!-- begin::Order Details from response -->
                <div class="card mb-5 mb-xl-12" id="kt_profile_details_view">
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!-- Start Upload Form -->
                        <div class="form">
                            <form class="form row" action="{{route('orders_excel_upload')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-md-6">
                                    <input type="file" name="csvFile" id="csvFile" class="form-control form-control-lg form-control-solid" />
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="submit" class="btn btn-info submit" />
                                </div>
                            </form>
                        </div>
                        <!-- End Upload Form -->
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


