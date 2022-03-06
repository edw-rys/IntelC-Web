@extends('components.template')
<!-- partial -->
@section('styles_cdn')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" rel="stylesheet" type="text/css">
@endsection
@section('scripts_cdn')
    <script src="{{ asset('js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js">
    </script> --}}
@endsection
@section('section')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">{{ auth()->user()->institution_name }}</h2>
                    {{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard
                    </h5> --}}
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    {{-- <a href="#"
                        class="btn btn-white btn-border btn-round mr-2">Manage</a>
                    <a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            
        </div>
    </div>
@endsection
