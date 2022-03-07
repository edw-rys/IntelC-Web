<?php

namespace App\DataTables;

use App\Models\Accommodation;
use App\Models\Book;
use App\Models\PlanesPrices;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PlanesPricesDataTable extends DataTable
{
    use DataTableBase;

    private $action = 'planes-prices';
    private $route  = 'admin.planes-prices';
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
    public function query(PlanesPrices $model): Builder
    {
        return $model->newQuery()->withTrashed();
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex','Num')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false)
                ->width(150)
                ->addClass('text-center'),
            Column::make('title')->title('Título')->className('text-center'),
            Column::make('price')->title('Precio')->className('text-center'),
            Column::make('image')->title('Imágen')->className('text-center'),
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
        return $this->getHtml(0, 'asc');
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
            ->editColumn('price', static function ($query) {
                return '$ '.number_format($query->price, 2);
            })
            ->editColumn('title', static function ($query) {
                return $query->title;
            })
            ->addColumn('status', static function ($query) {
                return status($query->status);
            })
            ->editColumn('created_at', static function ($query) {
                return dateForHumans($query->created_at);
            })
            ->addColumn('actions', static function ($query) use ($action, $route) {
                return dropdown_action($query->id, $query->status, $action, $route, 0);
            })
            ->editColumn('image', static function ($query) {
                return '<a href="'.$query->file_url.'" target="_blank"><img src="'.$query->file_url.'" style="width:20px"></a>';
            })
            ->addIndexColumn()
            ->escapeColumns([]);
    }
}