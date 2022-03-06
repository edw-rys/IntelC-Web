<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    use DataTableBase;

    private $action = 'users';
    private $route  = 'institution.users';
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
    public function query(UserModel $model): Builder
    {
        return $model->newQuery();
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('UserNames')->title('Nombres')->className('text-center'),
            Column::make('UserLastNames')->title('Apellidos')->className('text-center'),
            Column::make('UserEmail')->title('Email')->className('text-center'),
            Column::make('UserStatus')->title('Estado')->className('text-center'),
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
        return $this->getHtml(0, 'desc');
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
            ->setRowId('UserId')
            ->setRowClass(static function ($query) {
                return '';
            })
            ->editColumn('UserNames', static function ($query) {
                return $query->UserNames;
            })
            ->editColumn('UserLastNames', static function ($query) {
                return $query->UserLastNames;
            })
            ->editColumn('UserEmail', static function ($query) {
                return $query->UserEmail;
            })
            ->editColumn('UserStatus', static function ($query) {
                return status($query->UserStatus);
            })
            ->editColumn('UserDateCreated', static function ($query) {
                return dateForHumans($query->UserDateCreated);
            })
            
            ->addColumn('actions', static function ($query) use ($action, $route) {
                return dropdown_action($query->UserId, $query->UserStatus, $action, $route, 0);
            })
            ->escapeColumns([]);
    }
}