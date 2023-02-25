@extends('dashboard.layouts.master')

@section('css')

@endsection

@section('pageTitle')
    {{ $PageTitle }}
@endsection

@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="card card-xxl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{ $PageTitle }}</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            Dashboard Content
        </div>
        <!--begin::Body-->
    </div>
@endsection

@section('js')

@endsection