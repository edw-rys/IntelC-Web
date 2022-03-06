<?php

namespace App\DataTables;

use App\Models\Accommodation;
use App\Models\Book;
use App\Models\Gallery;
use App\Models\Obra;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class GalleryDataTable extends DataTable
{
    use DataTableBase;

    private $action = 'gallery';
    private $route  = 'admin.gallery';
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
    public function query(Gallery $model): Builder
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
            Column::make('image')->title('Imágen')->className('text-center'),
            Column::make('created_at')->title('Creado el')->className('text-center'),
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
            ->editColumn('title', static function ($query) {
                return $query->title;
            })
            ->editColumn('image', static function ($query) {
                return '<a href="'.$query->file_url.'" target="_blank"><img src="'.$query->file_url.'" style="width:100px"></a>';
            })
            ->editColumn('created_at', static function ($query) {
                return dateForHumans($query->created_at);
            })
            ->addColumn('actions', static function ($query) use ($action, $route) {
                return dropdown_action($query->id, $query->status, $action, $route, 0);
            })
            
            ->escapeColumns([]);
    }
}