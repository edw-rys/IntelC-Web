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
            max-width: 70% !important;
        }
    }


    .range-slider {
        margin: 60px 0 0 0%;
    }

    .range-slider {
        width: 100%;
    }

    .range-slider__range {
        -webkit-appearance: none;
        width: calc(100% - (73px));
        height: 10px;
        border-radius: 5px;
        background: #d7dcdf;
        outline: none;
        padding: 0;
        margin: 0;
    }
    .range-slider__range::-webkit-slider-thumb {
        -webkit-appearance: none;
            appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #2c3e50;
        cursor: pointer;
        -webkit-transition: background 0.15s ease-in-out;
        transition: background 0.15s ease-in-out;
    }
    .range-slider__range::-webkit-slider-thumb:hover {
        background: #1abc9c;
    }
    .range-slider__range:active::-webkit-slider-thumb {
        background: #1abc9c;
    }
    .range-slider__range::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border: 0;
        border-radius: 50%;
        background: #2c3e50;
        cursor: pointer;
        -moz-transition: background 0.15s ease-in-out;
        transition: background 0.15s ease-in-out;
    }
    .range-slider__range::-moz-range-thumb:hover {
        background: #1abc9c;
    }
    .range-slider__range:active::-moz-range-thumb {
        background: #1abc9c;
    }
    .range-slider__range:focus::-webkit-slider-thumb {
    box-shadow: 0 0 0 3px #fff, 0 0 0 6px #1abc9c;
    }

    .range-slider__value {
        display: inline-block;
        position: relative;
        width: 60px;
        color: #fff;
        line-height: 20px;
        text-align: center;
        border-radius: 3px;
        background: #2c3e50;
        padding: 5px 10px;
        margin-left: 8px;
    }
    .range-slider__value:after {
        position: absolute;
        top: 8px;
        left: -7px;
        width: 0;
        height: 0;
        border-top: 7px solid transparent;
        border-right: 7px solid #2c3e50;
        border-bottom: 7px solid transparent;
        content: "";
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