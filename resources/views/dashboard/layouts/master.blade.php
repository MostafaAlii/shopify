@include('dashboard.common.includes._tpl_start')
@include('dashboard.common.includes._aside')
@include('dashboard.common.includes._header')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    @include('dashboard.common.includes._toolbar')
    @yield('content')
</div>
@include('dashboard.common.includes._footer')
@include('dashboard.common.includes._tpl_end')

<!--begin::Drawers-->
@include('dashboard.common.includes.drawers._chat_drawer')
		