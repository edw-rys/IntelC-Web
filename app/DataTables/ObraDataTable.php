<?php

namespace App\DataTables;

use App\Models\Accommodation;
use App\Models\Book;
use App\Models\Obra;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ObraDataTable extends DataTable
{
    use DataTableBase;

    private $action = 'obra';
    private $route  = 'admin.obra';
    public $filters;

    /**
     * TeachersDataTable constructor.
     *
     */
    public function __construct()
    {
        //$this->repository = Users::class;
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query(Obra $model): Builder
    {
        return $model->newQuery()->where('status', 'active')->orderBy('id', 'desc');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            // Column::make('id')->title('N°')->className('text-center'),
            Column::make('title')->title('Título')->className('text-center'),
            Column::make('location')->title('Ubicación')->className('text-center'),
            Column::make('project')->title('Proyecto')->className('text-center'),
            Column::make('work_amount')->title('Monto Construcción:')->className('text-center'),
            Column::make('audit_amount')->title('Monto Fiscalización: ')->className('text-center'),
            Column::make('percentage')->title('Ejecutado')->className('text-center'),
            Column::make('status')->title('Estado')->className('text-center'),
            Column::computed('actions')->title('Acción')->className('text-center noExport')->width(100)->searchable(false)->printable(false)->exportable(false)
        ] ;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return $this->getHtml(-1, 'asc');
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query): DataTableAbstract
    {
        $action     = $this->action;
        $route      = $this->route;
        $context    = $this;
        
        return datatables()
            ->eloquent($query)
            ->setRowId('id')
            ->setRowClass(static function ($query) {
                return '';
            })
            ->editColumn('id', static function ($query) {
                return $query->id;
            })
            ->editColumn('name', static function ($query) {
                return $query->name;
            })
            ->addColumn('status', static function ($query) {
                return $query->type ? $query->type->title : '-';
            })
            ->editColumn('created_at', static function ($query) {
                return dateForHumans($query->created_at);
            })
            ->addColumn('actions', static function ($query) use ($action, $route) {
                return dropdown_action($query->id, $query->status, $action, $route, 0);
            })
            ->editColumn('percentage', function ($row) {
                if ($row->percentage < 50) {
                    $statusColor = 'danger';
                    $status = 'Progreso';
                } elseif ($row->percentage >= 50 && $row->percentage < 75) {
                    $statusColor = 'warning';
                    $status = 'Progreso';
                } else {
                    $statusColor = 'success';
                    $status = 'Progreso';

                    if ($row->percentage >= 100) {
                        $status = 'Progreso';
                    }
                }


                $progress = '<h5>' . $status . '<span class="pull-right">' . $row->percentage . '%</span></h5><div class="progress">
                  <div class="progress-bar progress-bar-' . $statusColor . '" aria-valuenow="' . $row->percentage . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $row->percentage . '%" role="progressbar"> <span class="sr-only">' . $row->percentage . '% Complete</span> </div>
                </div>';

                return $progress;
            })
            ->escapeColumns([]);
    }
}