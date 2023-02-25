<?php
if (! function_exists('datatable_lang')) {
    function datatable_lang(){

        return [

            "sProcessing" => trans('dashboard/datetable.sProcessing'),
            "sLengthMenu" => trans('dashboard/datetable.sLengthMenu'),
            "sZeroRecords" => trans('dashboard/datetable.sZeroRecords'),
            "sEmptyTable" => trans('dashboard/datetable.sEmptyTable'),
            "sInfo" => trans('dashboard/datetable.sInfo'),
            "sInfoEmpty" => trans('dashboard/datetable.sInfoEmpty'),
            "sInfoFiltered" => trans('dashboard/datetable.sInfoFiltered'),
            "sInfoPostFix" => trans('dashboard/datetable.sInfoPostFix'),
            "sSearch" => trans('dashboard/datetable.sSearch'),
            "sUrl" => trans('dashboard/datetable.sUrl'),
            "sInfoThousands" => trans('dashboard/datetable.sInfoThousands'),
            "sLoadingRecords" =>trans('dashboard/datetable.sLoadingRecords'),
            "oPaginate" => [
                "sFirst" => trans('dashboard/datetable.sFirst'),
                "sLast" => trans('dashboard/datetable.sLast'),
                "sNext" => trans('dashboard/datetable.sNext'),
                "sPrevious" => trans('dashboard/datetable.sPrevious'),
            ],
            "oAria" => [
                "sSortAscending" => trans('datetable.sSortAscending'),
                "sSortDescending" => trans('datetable.sSortDescending'),
            ],
        ];
    }
}
