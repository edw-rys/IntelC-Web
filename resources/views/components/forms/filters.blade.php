@if(isset($filters) && $filters->isNotEmpty())
<div class="row m-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 id="filter-header" data-toggle="collapse" data-target="#collapse-filters" aria-expanded="false" aria-controls="collapse-filters" class="hover"><i class="fas fa-filter"></i> Filtros de búsqueda</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option" style="width:90px">
                        <li><i class="ik ik-chevron-left action-toggle ik-chevron-right"></i></li>
                        <li><i class="ik ik-plus minimize-card"></i></li>
                        <li><i class="ik ik-x close-card"></i></li>
                    </ul>
                </div>
            </div>

            <div class="card-body show" id="collapse-filters">
                <form id="search-filters" class="form-inline2" autocomplete="off">
                    <div class="row">
                        @foreach ($filters as $key => $filter)
                            <div class="col-md-4 col-12">
                                {{-- {@dump($filter)} --}}
                                {!! $filter !!}
                            </div>
                        @endforeach
                    </div>

                    @if (isset($route) && route_exists($route))

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center">Columnas del reporte</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="printingCheck">
                                    <label class="custom-control-label" for="printingCheck">Imprenta</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="caduceCheck">
                                    <label class="custom-control-label" for="caduceCheck">Tiempo de caducidad</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="timeCheck">
                                    <label class="custom-control-label" for="timeCheck">Tiempo de vigencia del pin</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="pingCheck">
                                    <label class="custom-control-label" for="pingCheck">Pin</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="insttutionCheck">
                                    <label class="custom-control-label" for="insttutionCheck">Institución</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="platformCheck">
                                    <label class="custom-control-label" for="platformCheck">Plataforma</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="bookCheck">
                                    <label class="custom-control-label" for="bookCheck">Libro</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="courseCheck">
                                    <label class="custom-control-label" for="courseCheck">Curso</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="statusCheck">
                                    <label class="custom-control-label" for="statusCheck">Estado</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="dateCheck">
                                    <label class="custom-control-label" for="dateCheck">Fechas</label>
                                </div>
                            </div>
                        </div>
                    @endif
                    <hr>

                    <div class="row">
                        <div class="col-12">
                            @if (!isset($no_search))
                                <button type="button" id="search-filter-submit" class="btn btn-primary btn-sm"><i class="ik ik-search"></i> Buscar</button>
                            @endif
                            @if (!isset($no_reset))
                                <button type="button" id="search-filter-reset" class="btn btn-default btn-sm" value="reset">Resetear</button>
                            @endif
                            @if (isset($route) && route_exists($route))
                                <button onclick="exportData('{{ route($route)}}')" type="button" id="search-filter-export" class="btn btn-success btn-sm" value="">Exportar csv</button>    
                            @endif
                            @if (isset($route_pdf) && route_exists($route_pdf))
                                <button onclick="exportData('{{ route($route_pdf)}}')" type="button" id="search-filter-export-pdf" class="btn btn-danger btn-sm" value="">Exportar Reporte pdf</button>    
                            @endif
                            @if (isset($route_report) && route_exists($route_report))
                                <button onclick="exportData('{{ route($route_report)}}')" type="button" id="search-filter-report" class="btn btn-warning btn-sm" value="">Generar Reporte</button>    
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
