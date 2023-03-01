<?php

namespace App\DataTables;

use App\Models\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'dashboard.orders.btn.action')
            ->editColumn('order_id', function ($order) {
                return '<span class="badge badge-primary"><a class="text-light" href="' . route('orders.show', $order->order_id) . '" target="_blank">' . $order->order_id . '</a></span>';
            })
            ->editColumn('financial_status', function($order) {
                $badge = $order->financial_status == 'pending' ? 'warning' : 'success';
                return '<span class="badge badge-' . $badge . '">' . $order->financial_status . '</span>';
            })
            ->editColumn('gateway', function($order) {
                $badge = $order->gateway == 'Cash on Delivery (COD)' ? 'primary' : 'success';
                return '<span class="badge badge-' . $badge . '">' . $order->gateway . '</span>';
            })
            ->editColumn('checkout_id', function($order) {
                $badge = $order->checkout_id == null ? 'danger' : 'success';
                if ($order->checkout_id == null)
                    return '<span class="badge badge-' . $badge . '">No Checkout</span>';
                return '<span class="badge badge-' . $badge . '">' . $order->checkout_id . '</span>';
            })
            ->editColumn('cancelled_at', function($order) {
                $badge = $order->cancelled_at == null ? 'danger' : 'success';
                if ($order->cancelled_at == null)
                    return '<span class="badge badge-' . $badge . '">No Cancelled Data</span>';
                return '<span class="badge badge-' . $badge . '">' . $order->cancelled_at . '</span>';
            })
            ->editColumn('closed_at', function($order) {
                $badge = $order->closed_at == null ? 'danger' : 'success';
                if ($order->closed_at == null)
                    return '<span class="badge badge-' . $badge . '">No Closed Data</span>';
                return '<span class="badge badge-' . $badge . '">' . $order->closed_at . '</span>';
            })
            ->editColumn('created_at', function($order) {
                $badge = $order->created_at == null ? 'danger' : 'success';
                if ($order->created_at == null)
                    return '<span class="badge badge-' . $badge . '">No Created Data</span>';
                return '<span class="badge badge-' . $badge . '">' . $order->created_at->diffForHumans() . '</span>';
            })
            ->editColumn('updated_at', function($order) {
                $badge = $order->updated_at == null ? 'danger' : 'success';
                if ($order->updated_at == null)
                    return '<span class="badge badge-' . $badge . '">No Updated Data</span>';
                return '<span class="badge badge-' . $badge . '">' . $order->updated_at->diffForHumans() . '</span>';
            })
            ->rawColumns([
                'financial_status',
                'checkout_id',
                'gateway',
                'action',
                'order_id',
                'cancelled_at',
                'closed_at',
                'created_at',
                'updated_at',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OrderDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        /** Financial Status
         * voided ملغى
         **/
        return Order::orderByRaw('FIELD(financial_status, "paid", "pending", "partially_refunded", "refunded", "voided")')->latest('id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom'          => 'Blfrtip',
                'lengthMenu' => [
                    [10, 25, 50, 100, 500, 750, -1],
                    ['10', '25 ', '50 ', '100 ', '500 ', '750', 'All']
                ],

                'buttons'      => [
                    [
                        'text' => '<i class="fa fa-plus"></i> ' . trans('dashboard/order.orders_sync') , 'className' => 'btn btn-info', "action" => "function(){
                            window.location.href = '" . route('ordersSync') . "';
                        }"
                    ],

                    [
                        'text' => '<i class="fa fa-plus"></i> ' . trans('dashboard/order.orders_updated') , 'className' => 'btn btn-info', "action" => "function(){
                            window.location.href = '" . route('ordersSync') . "';
                        }"
                    ],
                    [
                        'extend'  => 'csv',
                        'className'=> 'btn btn-primary',
                        'text'     => "<i class='fa fa-file'></i>" . trans('dashboard/datetable.ex_csv')
                    ],
                    [
                        'extend'  => 'excel',
                        'className'=> 'btn btn-success',
                        'text'     => "<i class='fa fa-file'></i>". trans('dashboard/datetable.ex_excel')
                    ],
                    [
                        'extend'  => 'print',
                        'className'=> 'btn btn-info',
                        'text'     => "<i class='fa fa-print'></i>" . trans('dashboard/datetable.print')
                    ],
                    [
                        'extend'  => 'reload',
                        'className'=> 'btn btn-dark',
                        'text'     => "<i class='fa fa-sync-alt'></i>" . trans('dashboard/datetable.reload')
                    ],


                ],

                'initComplete' => "function () {
                            this.api().columns([1,2]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }",


                'language' => datatable_lang(),
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
        return [
            ['name'=>'id', 'data'=>'id', 'title'=>'#',],
            ['name'=>'order_id', 'data'=>'order_id', 'title'=>'Order Id'],
            ['name'=>'name', 'data'=>'name', 'title'=>'Name'],
            ['name'=>'contact_email', 'data'=>'contact_email', 'title'=>'Contact Email'],
            ['name'=>'email', 'data'=>'email', 'title'=>'Email'],
            ['name'=>'phone', 'data'=>'phone', 'title'=>'Phone'],
            ['name'=>'total_price', 'data'=>'total_price', 'title'=>'Total Price'],
            ['name'=>'currency', 'data'=>'currency', 'title'=>'Currency'],
            ['name'=>'financial_status', 'data'=>'financial_status', 'title'=>'Financial Status'],
            ['name'=>'fulfillment_status', 'data'=>'fulfillment_status', 'title'=>'Fulfillment Status'],
            ['name'=>'gateway', 'data'=>'gateway', 'title'=>'Gateway'],
            ['name'=>'number', 'data'=>'number', 'title'=>'Number'],
            ['name'=>'order_number', 'data'=>'order_number', 'title'=>'Order Number'],
            ['name'=>'checkout_id', 'data'=>'checkout_id', 'title'=>'Checkout'],
//            ['name'=>'cancelled_at', 'data'=>'cancelled_at', 'title'=>'Cancel At'],
//            ['name'=>'closed_at', 'data'=>'closed_at', 'title'=>'Closed At'],
//            ['name'=>'created_at', 'data'=>'created_at', 'title'=>'Created At'],
//            ['name'=>'updated_at', 'data'=>'updated_at', 'title'=>'Updated At'],
            ['name'=>'action', 'data'=>'action', 'title'=>'Action', 'exportable'=>false, 'printable'=>false, 'orderable'=>false, 'searchable'=>false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
