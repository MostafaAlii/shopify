@extends('dashboard.layouts.master')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('pageTitle')
    الطلبات | {{ $pageTitle }}
@endsection

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="card card-xxl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">الطلبات</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    {!! $dataTable->table([
                    'class' => 'table table-striped table-bordered p-0',
                    'style' => 'border-collapse: collapse; border-spacing: 0; width: 100%;'
                    ], true) !!}
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
    </div>
@endsection

@push('js')
    {!! $dataTable->scripts() !!}
@endpush


