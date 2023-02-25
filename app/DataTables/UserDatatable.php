<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDatatable extends DataTable
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
            ->addColumn('action', 'dashboard.users.btn.action')
            ->editColumn('created_at', function ($user) {
                return $user->created_at->diffForHumans();
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at->diffForHumans();
            })
            ->rawColumns([
                'action',
                'created_at',
                'updated_at',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UserDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        $email = get_user_data()?->email;
        return $model->query()->where('email', '!=', $email);
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
                'dom'          => 'Blfrti',
                'lengthMenu' => [
                    [10, 25, 50, 100, 500, 750, -1],
                    ['10', '25 ', '50 ', '100 ', '500 ', '750', 'All']
                ],

                'buttons'      => [
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
                            this.api().columns([0,1,2]).every(function () {
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
    protected function getColumns()
    {
        return [
            [
                'name'=>'id',
                'data'=>'id',
                'title'=>'#',
            ],[
                'name'=>'name',
                'data'=>'name',
                'title'=>'ألاسم',
            ],[
                'name'=>'email',
                'data'=> 'email',
                'title'=>'البريد الالكترونى',
            ],[
                'name'=>'created_at',
                'data'=> 'created_at',
                'title'=>'تاريخ الانشاء',
            ],[
                'name'=>'updated_at',
                'data'=> 'updated_at',
                'title'=>'تاريخ التعديل',
            ],[
                'name'=>'action',
                'data'=> 'action',
                'title'=>'الاجراءات',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
