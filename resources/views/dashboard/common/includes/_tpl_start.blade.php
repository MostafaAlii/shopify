<!DOCTYPE html>
<html lang="en">
	@if(app()->getLocale()=='ar')
		<html direction="rtl" dir="rtl" style="direction: rtl"> <!-- for arabic -->
	@else
		<html direction="ltr" dir="ltr" style="direction: ltr"> <!-- for en -->
	@endif
	<!--begin::Head-->
	<head><base href="">
		<title>@yield('pageTitle')</title>
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="#" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="#" />
		<link rel="shortcut icon" href="{{asset("assets/dashboard/media/logos/favicon.ico")}}" />
		<!--begin::Fonts-->
		<link href="https://fonts.googleapis.com/css?family=Cairo:300,400&amp;subset=arabic,latin-ext" rel="stylesheet">
		<!--end::Fonts-->
		<link href="{{ asset("assets/dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.css") }}" rel="stylesheet" type="text/css" />
		@if(app()->getLocale()=='ar')  <!-- for arabic -->
			<!--begin::Page Vendor Stylesheets(used by this page)-->
			<link href="{{ asset("assets/dashboard/plugins/custom/prismjs/prismjs.bundle.rtl.css") }}" rel="stylesheet" type="text/css" />
			<link href="{{ asset("assets/dashboard/plugins/global/plugins.bundle.rtl.css") }}" rel="stylesheet" type="text/css" />
			<!--begin::Global Stylesheets Bundle(used by all pages)-->
			<link href="{{ asset("assets/dashboard/css/style.bundle.rtl.css") }}" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
		@else
			<!--begin::Page Vendor Stylesheets(used by this page)-->
			<link href="{{ asset("assets/dashboard/plugins/global/plugins.bundle.css") }}" rel="stylesheet" type="text/css" />
			<!--begin::Global Stylesheets Bundle(used by all pages)-->
			<link href="{{ asset("assets/dashboard/css/style.bundle.css") }}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		@endif
		<!--end::Global Stylesheets Bundle-->
        <style>
            html, body, a, i, p, h1, h2, h3, h4, h5, h6, table, .btn, .alert {font-family: 'Cairo', sans-serif;}
        </style>
	</head>
	<!--end::Head-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
