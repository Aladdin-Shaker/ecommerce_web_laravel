<?php

namespace App\DataTables;

use App\Model\Size;
use Yajra\DataTables\Services\DataTable;

class SizeDataTable extends DataTable
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
            ->addColumn('edit', 'admin.sizes.btn.edit')
            ->addColumn('delete', 'admin.sizes.btn.delete')
            ->addColumn('checkbox', 'admin.sizes.btn.checkbox')
            ->rawColumns([
                'edit', 'delete', 'checkbox'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ShippingDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Size::query()->with('department')->select('sizes.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('sizedatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->parameters([
                'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, 'All Records']],
                'buttons' => [
                    ['extend' => 'print', 'className' => 'btn btn-danger mb-3', 'text' => trans('admin.print')],
                    ['extend' => 'csv', 'className' => 'btn btn-info mb-3', 'text' => trans('admin.ex.csv')],
                    ['extend' => 'excel', 'className' => 'btn btn-success mb-3', 'text' => trans('admin.ex.excel')],
                    [
                        'className' => 'btn btn-primary mb-3',
                        'text' => trans('admin.create_size'),
                        'action' => "function(){ window.location.href = '" . url()->current() . "/create'; }"
                    ],
                    ['className' => 'btn btn-danger mb-3 delBtn', 'text' => trans('admin.delete_all')],
                    ['extend' => 'reload', 'className' => 'btn btn-default mb-3 ', 'text' => trans('admin.refresh')],

                ],
                'initComplete' => 'function () {
                    this.api().columns([1,2,3]).every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        $(input).appendTo($(column.footer()).empty())
                        .on(\'keyup\', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                    });
                }',
                'language' => datatable_lang()
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
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<input type="checkbox" class="check_all" onClick="check_all()">',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ],
            [
                'name' => 'name_ar',
                'data' => 'name_ar',
                'title' => trans('admin.name_ar'),
            ],
            [
                'name' => 'name_en',
                'data' => 'name_en',
                'title' => trans('admin.name_en'),
            ],
            [
                'name' => 'department_id',
                'data' => 'department.dep_name_' . session('lang'),
                'title' => trans('admin.department_id'),
            ],
            [
                'name' => 'is_public',
                'data' => 'is_public',
                'title' => trans('admin.is_public'),
            ],
            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => trans('admin.created_at'),

            ],
            [
                'name' => 'updated_at',
                'data' => 'updated_at',
                'title' => trans('admin.updated_at')
            ],
            [
                'name' => 'edit',
                'data' => 'edit',
                'title' => trans('admin.edit'),
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ],
            [
                'name' => 'delete',
                'data' => 'delete',
                'title' => trans('admin.delete'),
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'sizess_' . date('YmdHis');
    }
}
