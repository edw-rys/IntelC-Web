<div class="row">
    
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route($route, $item->id) }}" id="formSave" method="PUT" enctype="multipart/form-data" onsubmit="saveData(event)">
                @csrf

                <div class="card-header">
                    <h3>Editar {{ $singular_title ?? 'ítem' }}</h3>
                </div>
                <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="card-body">
                    <div class="form-group @error('schedule_type_id') {{ 'is-invalid' }} @enderror">
                        <label for="schedule_type_id">Tipo de Evento</label>
                        <select name="schedule_type_id" id="schedule_type_id" class="select2 form-group" style="width: 100%">
                            @foreach ($types as $key => $type)
                                <option value="{{ $type->id }}" {{ $type->id == $item->schedule_type_id }}>{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group @error('title') {{ 'is-invalid' }} @enderror">
                        <label for="title">Título</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $item->title}}">
                        <p id="err-title" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group">
                        <label for="start_date" class="mr-2 d-block">Fecha de inicio</label>
                        <div class="input-group date" data-target-input="nearest">
                            <input type="text" id="start_date" name="start_date"
                                class="form-control datetimepicker dates-picker" data-format="YYYY-MM-DD" readonly>
                            <div class="input-group-append" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="end_date" class="mr-2 d-block">Fecha final</label>
                        <div class="input-group date" data-target-input="nearest">
                            <input type="text" id="end_date" name="end_date"
                                class="form-control datetimepicker dates-picker" data-format="YYYY-MM-DD" readonly>
                            <div class="input-group-append" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group @error('location') {{ 'is-invalid' }} @enderror">
                        <label for="location">Ubicación</label>
                        <input type="text" class="form-control" name="location" id="location" value="{{ $item->location}}">
                        <p id="err-location" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('number_seats') {{ 'is-invalid' }} @enderror">
                        <label for="number_seats">Número de asientos</label>
                        <input type="number" class="form-control" name="number_seats" id="number_seats" value="{{ $item->number_seats}}">
                        <p id="err-number_seats" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('available_seats') {{ 'is-invalid' }} @enderror">
                        <label for="available_seats">Asientos disponibles</label>
                        <input type="number" class="form-control" name="available_seats" id="available_seats" value="{{ $item->available_seats}}">
                        <p id="err-available_seats" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('email') {{ 'is-invalid' }} @enderror">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $item->email}}">
                        <p id="err-email" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('phone') {{ 'is-invalid' }} @enderror">
                        <label for="phone">Teléfono</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $item->phone}}">
                        <p id="err-phone" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('website') {{ 'is-invalid' }} @enderror">
                        <label for="website">Sitio Web</label>
                        <input type="number" class="form-control" name="website" id="website" value="{{ $item->website}}">
                        <p id="err-website" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen principal</label>
                        <input id="image" type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <div class="form-group @error('description') {{ 'is-invalid' }} @enderror">
                        <label for="description">Descripción</label>
                        @include('components.textarea',[
                            'text'  => $item->description
                        ])
                        <textarea name="description" id="description" class="d-none"></textarea>
                    </div>
                </div>
                <div class="text-center">
                    <input class="btn btn-success btn-sm" id="btn-submit" type="submit" value="Actualizar información" >
                </div>
            </form>
            
        </div>
    </div>
</div>
<script>
    $("#start_date").datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true,
        defaultDate: new Date('{{$item->start_date}}')
    }).on('changeDate', function (selected) {
        $('#end_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            defaultDate: new Date('{{$item->end_date}}')
        });
        var minDate = new Date(selected.date ? selected.date.valueOf(): '');
        // var minDate = new Date(selected.date.valueOf());
        $('#end_date').datepicker("update", minDate);
        $('#end_date').datepicker('setStartDate', minDate);
    });

    $("#end_date").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    }).on('changeDate', function (selected) {
        var maxDate = new Date(selected.date ? selected.date.valueOf(): '');
        $('#start_date').datepicker('setEndDate', maxDate);
    });
    $("#start_date").datepicker("setDate", new Date('{{$item->start_date}}'));
    $("#end_date").datepicker("setDate", new Date('{{$item->end_date}}'));
    $(".date-picker").datepicker({
        todayHighlight: true,
        autoclose: true
    });
    function saveData(event){
        $('.err-fields').addClass('hidden')
        if (event && event.preventDefault) {
            event.preventDefault();
        }
        $('#description').val(editor.root.innerHTML);
        $('#btn-submit').attr('disable', 'true');

        $.easyAjax({
            url: '{{route($route, $item->id)}}',
            container: '#formSave',
            type: "POST",
            redirect: false,
            file: true,
            data: $('#formSave').serialize(), 
            success: function (response) {
               $('#btn-submit').attr('disable', 'false');
                    $.notify(
                        {
                            icon: 'flaticon-hands',
                            title: response.message,
                            message: '',
                        },{
                        type: 'info',
                        placement: {
                            from: "bottom",
                            align: "right"
                        },
                        time: 1000,
                    });
                    $('#modal-component').trigger('click');
                window.LaravelDataTables["{{$action}}-table"].draw()
            },
            error: function (error) {
                showErrors(error);
            },
        });
    }
    $('.select2').select2();
</script>
