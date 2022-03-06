@extends('components.template')
@include('partials.datatable')
@section('section')
@section('other_styles')
<style>
    .modal-dialog {
        max-width: 100% !important;
    }

    @media(min-width: 570px) {
        .modal-dialog {
            max-width: 50% !important;
        }
    }

</style>
@endsection
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 flex" style="margin: 20px">
                        <div class="" style="margin: auto">
                            <h2 class="text-center">{{ $title ?? 'Instituciones'}}</h2>
                            {{-- <a href="@if(route_exists($route)) {{ route($route) }} @endif" class="btn btn-primary">Nuevo</a> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            {!! $dataTable->table([], false) !!}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection