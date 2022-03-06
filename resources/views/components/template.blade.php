<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Administración|Palora</title>

    @yield('styles_cdn')
    <link rel="icon" type="image/gif" href="{{ asset('img/logo-c1.png')}}">
    <!-- General CSS Files -->
    {{--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    {{--
    --}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
 
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">

    <style>
        .modal-dialog {
            max-width: 100% !important;
        }

        @media(min-width: 736px) {
            .modal-dialog {
                max-width: 70% !important;
            }
        }
        @media(min-width: 906px) {
            .modal-dialog {
                max-width: 50% !important;
            }
        }
        @media(max-width: 406px) {
            .modal-dialog {
                max-width: 100% !important;
            }
        }

    </style>

    <!-- Fonts and icons -->
    <script src="{{ asset('js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ],
                urls: ["{{ asset('css/fonts.min.css')}}"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });

    </script>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}">
    
    <link href="https://cdn.quilljs.com/1.0.0-beta.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.0.0-beta.6/quill.js"></script>
    <!-- CSS Libraries -->
    {{--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    --}}

    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <!-- Template CSS -->
    {{--
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}"> --}}
    {{--
    <link rel="stylesheet" href="{{ asset('css/components.css') }}"> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script> --}}
  	<script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link href="{{ asset('css/municipio/font-awesome.css')}}" rel="stylesheet">
    <script src="{{ asset('js/sweetalert2.min.js')}}"></script>
    <script>
       // window.jQuery || document.write('<script src="{{ asset('js/jquery.min.js') }}"><\/script>')

    </script>
    <script src="{{ asset('js/errors.js')}}"></script>
    @yield('other_styles')
    <link rel="stylesheet" href="{{ asset('css/atlantis.css') }}">


</head>

<body>

    {{-- <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>

                    </div>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}
                                {{ auth()->user()->last_name }}
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('user.logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            @include('components.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('section')
            </div>
        </div>
        <footer class="main-footer">
        </footer>
    </div> --}}
    <div class="wrapper">
      <div class="main-header" style="background: linear-gradient(120deg, #ffffff, #75e168, #04b119) !important;">
        <!-- Logo Header -->
        <div class="logo-header" >
          
          <a href="{{ route('admin.dashboard.index')}}" class="logo">
            <img src="{{ asset('img/logo.svg') }}" alt="navbar brand" class="navbar-brand" style="width: 100px; height: 75px;">
            {{-- https://www.pngkey.com/maxpic/u2w7u2o0a9y3i1w7/ --}}
          </a>
          <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
              <i class="icon-menu"></i>
            </span>
          </button>
          <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="icon-menu"></i>
            </button>
          </div>
        </div>
        <!-- End Logo Header -->
  
        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" >
          
          <div class="container-fluid">
            
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
              {{-- <li class="nav-item toggle-nav-search hidden-caret">
                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                  <i class="fa fa-search"></i>
                </a>
              </li>
               --}}
              <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                  <div class="avatar-sm">
                    <img src="{{  asset('img/avatar.png') }}" alt="..." class="avatar-img rounded-circle">
                    {{-- <a href="{{ route('user.dashboard.index')}}">Academic UG</a> --}}
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                  <div class="dropdown-user-scroll scrollbar-outer">
                    <li>
                      <div class="user-box">
                        {{-- <div class="avatar-lg"><img src="{{ asset('img/profile.jpg') }}" alt="image profile" class="avatar-img rounded"></div> --}}
                        <div class="u-text">
                          <h4>
                            {{ auth()->user()->institution_name }}
                          </h4>
                          {{-- <h4>{{ auth()->user()->institution_name }} {{ auth()->user()->last_name }}</h4> --}}
                          {{-- <p class="text-muted">{{ auth()->user()->email }}</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">Ver Perfil</a> --}}
                        </div>
                      </div>
                    </li>
                    <li>
                      {{-- <a href="{{ route('user.profile.profile')}}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Perfil
                      </a> --}}
                      <div class="dropdown-divider"></div>
                      <a href="{{ route('admin.user.logout') }}" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                      </a>
                    </li>
                  </div>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
  
      <!-- Sidebar -->
      @include('components.sidebar')
      <!-- End Sidebar -->
  
      <div class="main-panel">
        <div class="content">
          
          @yield('section')
        </div>
        <footer class="footer">
          <div class="container-fluid">
            <div class="copyright ml-auto">
              <span  style="background: #fff;padding:10px 20px ">
                {{-- &copy; Copyright 2021 - <a href="https://www.github.com/edw-rys" target="_blank">Smarh</a> --}}
                &copy; Copyright {{ date('Y')}} - <a href="https://smartframedev.ec/" target="_blank"><img width="150" src="{{ asset('img/development.png')}}" alt=""></a> Todos los derechos reservados
              </span>
            </div>
          </div>
        </footer>
      </div>
      <!-- End Custom template -->
    </div>
    {{--Ajax Modal--}}
    <div class="modal fade bs-modal-md in" id="modal-component" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header" style="background: #75e168">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="background: red;border-radius: 10px;padding: 7px">
                      <i style="color: #fff" class="fas fa-times"></i>
                      {{-- <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span> --}}
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->.
    </div>
    {{--Ajax Modal Ends--}}

    <!-- General JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/i18n/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.es.min.js"></script>
    @yield('scripts_cdn')
    @yield('scripts')

    {{-- 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>
    <!-- JS Libraies -->

    <script src="{{ asset('js/pace.min.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index.js') }}"></script>
    --}}
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/app.js') }}"></script>    
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script> 
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $.toast = toastr;

        });

        function validateSizeImage(queryElement, size= '1000000') {
            if (!document.querySelector(queryElement)) {
              return;
            }
            if (!document.querySelector(queryElement).files[0]) {
                return true;
            }
            var imgsize = document.querySelector(queryElement).files[0].size;

            if(imgsize > size){
                return false;
            }
            return true;
        }
        /**
          * DateTimePicker (Tempus)
          */
        jQuery('.datetimepicker').datepicker({
          toggleActive: true,
          format: 'yyyy-mm-dd',
        });

        function formatIcon (value) {
            if (!value || !value.id) {
              return;
            }
            var class_ = value.id.split('\t').join(' ');
            return $(`
                  <i class="${class_}"></id>
            `);
        }
        function formatIconSelected (value) {
          if (!value || !value.id) {
            return;
          }
            var class_ = value.id.split('\t').join(' ');
            return $(`
                  <i class="${class_}"></id>
            `);
        }

        
        function deleteData(event, url, dt_id, id) {
          event.preventDefault();
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })

          swalWithBootstrapButtons.fire({
            title: '¿Está seguro(a)?',
            text: "¿Está seguro que desea eliminar la información?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: '¡No, cancelar!',
            reverseButtons: true
          }).then((result) => {
            
            if (result.isConfirmed) {
              $.easyAjax({
                type: 'DELETE',
                url: url,
                data: $('#form-delete-' + id).serialize(),
                success: function(response) {
                    if (response.status == "success") {
                        // $.easyBlockUI('#leads-table');
                        if (window.LaravelDataTables[dt_id + "-table"]) {
                          window.LaravelDataTables[dt_id + "-table"].draw();
                        }
                        swalWithBootstrapButtons.fire(
                          '¡Eliminado!',
                          'El registro ha sido eliminado.',
                          'success'
                        )
                    }
                }
            });
              
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                '!Cancelado¡',
                '',
                'error'
              )
            }
          })
        }


        function removeItem(url, id, closeModal=false) {
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })

          swalWithBootstrapButtons.fire({
            title: '¿Está seguro(a)?',
            text: "¿Está seguro que desea eliminar la información?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: '¡No, cancelar!',
            reverseButtons: true
          }).then((result) => {
            
            if (result.isConfirmed) {
              $.easyAjax({
                type: 'DELETE',
                url: url,
                data: { 'id': id, '_token': '{{ csrf_token() }}'},
                success: function(response) {
                  if (response.status == "success") {
                    // $.easyBlockUI('#leads-table');
                    swalWithBootstrapButtons.fire(
                      '¡Eliminado!',
                      'El registro ha sido eliminado.',
                      'success'
                    )
                  }
                  if(closeModal ){
                    $('#modal-component').trigger('click');
                  }
                },
                error: function (error) {
                    showErrors(error);
                }
            });
              
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                '!Cancelado¡',
                '',
                'error'
              )
            }
          })
        }
        
        function inactiveData(event, url, dt_id, id) {
          event.preventDefault();
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })

          swalWithBootstrapButtons.fire({
            title: '¿Está seguro(a)?',
            text: "¿Está seguro que desea inactivar la información?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '¡Si, inactivar!',
            cancelButtonText: '¡No, cancelar!',
            reverseButtons: true
          }).then((result) => {

            if (result.isConfirmed) {
              $.easyAjax({
                type: 'POST',
                url: url,
                data: $('#form-inactive-' + id).serialize(),
                success: function(response) {
                    if (response.status == "success") {
                        // $.easyBlockUI('#leads-table');
                      window.LaravelDataTables[dt_id + "-table"].draw();
                      swalWithBootstrapButtons.fire(
                        '!Inactivado!',
                        'El registro fue inactivado.',
                        'success'
                      )
                    }
                }
            });
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                '!Cancelado¡',
                '',
                'error'
              )
            }
          })
        }

        function enableInstitution(event, url, dt_id, id) {
          return;
          event.preventDefault();
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })

          swalWithBootstrapButtons.fire({
            title: '¿Está seguro(a)?',
            text: "¿Está seguro que desea habilitar la institución?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: '¡Si, habilitar!',
            cancelButtonText: '¡No, cancelar!',
            reverseButtons: true
          }).then((result) => {
            
            if (result.isConfirmed) {
              $.easyAjax({
                type: 'POST',
                url: url,
                data: $('#form-enable-' + id).serialize(),
                success: function(response) {
                    if (response.status == "success") {
                      window.LaravelDataTables[dt_id + "-table"].draw();
                      swalWithBootstrapButtons.fire(
                        '¡Habilitado!',
                        response.message,
                        'success'
                      );
                    }
                },
                error: function(params) {
                  notifyErrorGlobal(params);
                }
            });
              
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                '¡Cancelado!',
                '',
                'error'
              )
            }
          });
        }
        function restoreData(event, url, dt_id, id) {
            event.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })

          swalWithBootstrapButtons.fire({
            title: '¿Está seguro(a)?',
            text: "¿Está seguro que desea habilitar la institución?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: '¡Si, habilitar!',
            cancelButtonText: '¡No, cancelar!',
            reverseButtons: true
          }).then((result) => {
            
            if (result.isConfirmed) {
              $.easyAjax({
                type: 'POST',
                url: url,
                data: $('#form-restore-' + id).serialize(),
                success: function(response) {
                    if (response.status == "success") {
                        // $.easyBlockUI('#leads-table');
                        window.LaravelDataTables[dt_id + "-table"].draw();
                        swalWithBootstrapButtons.fire(
                          '¡Habilitado!',
                          response.message,
                          'success'
                        )
                        // window.location.reload();
                        // $.easyUnblockUI('#leads-table');
                    }
                },
                error: function(params) {
                  console.log(params);
                  notifyErrorGlobal(params);
                }
              });
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                '¡Cancelado!',
                '',
                'error'
              )
            }
          });
            console.log($('#form-restore-' + id).serialize());
            
        }

        function notifyErrorGlobal(params){
          if(params.status == 500){
            $.notify({
              icon: 'flaticon-hands-1',
              title: 'Error interno',
              message: '',
            },{
              type: 'info',
              placement: {
                from: "bottom",
                align: "right"
              },
              time: 1000,
            });
          }
          $.notify({
            icon: 'flaticon-hands-1',
            title: params.responseJSON.message,
            message: '',
          },{
            type: 'warning',
            placement: {
              from: "bottom",
              align: "right"
            },
            time: 1000,
          });
        }

        
/**
 * iDeleteDataTablesAjax confirmation
 *
 * @param url
 * @param ids
 * @param dataTable
 * @param content
 */
 function iDeleteDataTablesAjax(url, ids, dataTable, content = 'Eliminar datos críticos puede ocasionar resultados no deseados. ¿Estás seguro de continuar?') {
    if (url === '' || ids === '' || dataTable === '') return;
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
		  confirmButton: 'btn btn-success',
		  cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
	})

	swalWithBootstrapButtons.fire({
		title: '¿Está seguro(a)?',
		text: "¿Está seguro que desea eliminar la información?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: '¡Si, eliminar!',
		cancelButtonText: '¡No, cancelar!',
		reverseButtons: true
	}).then((result) => {
	
		if (result.isConfirmed) {
			$.easyAjax({
			type: 'DELETE',
			url: url,
			data: {
				ids: ids,
				_method: 'DELETE',
        _token : '{{ csrf_token() }}'
			},
			success: function(response) {
				if (response.status == "success") {
					// $.easyBlockUI('#leads-table');
          console.log(dataTable );
					window.LaravelDataTables[dataTable ].draw();
						swalWithBootstrapButtons.fire(
						'¡Eliminado!',
						'El registro ha sido eliminado.',
						'success'
						)
					}
				}
			});
		  
		} else if (
		  /* Read more about handling dismissals below */
		  result.dismiss === Swal.DismissReason.cancel
		) {
		  swalWithBootstrapButtons.fire(
			'!Cancelado¡',
			'',
			'error'
		  )
		}
	});
}

    </script>

    <!--   Core JS Files   -->
	<script src="{{ asset('js/core/popper.min.js') }}"></script>
	<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('js/plugin/sweetalert/sweetalert.min.js') }}"></script>

	<!-- Atlantis JS -->
	<script src="{{ asset('js/atlantis.min.js') }}"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{ asset('js/setting-demo.js') }}"></script>

</body>

</html>
