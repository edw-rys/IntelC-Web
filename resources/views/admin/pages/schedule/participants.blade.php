<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route($route, $item->id) }}" id="formSave" method="PUT" enctype="multipart/form-data"
                onsubmit="return false">
                @csrf

                <div class="card-header">
                    <h3>Participantes</h3>
                </div>
                <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="card-body">
                    <div class="form-group @error('schedule_type_id') {{ 'is-invalid' }} @enderror">
                        <label for="schedule_type_id">Tipo de Evento</label>
                        <select name="schedule_type_id" id="schedule_type_id" class="select2 form-group"
                            style="width: 100%" disabled>
                            @foreach ($types as $key => $type)
                                <option value="{{ $type->id }}" {{ $type->id == $item->schedule_type_id }}>
                                    {{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group @error('title') {{ 'is-invalid' }} @enderror">
                        <label for="title">Título</label>
                        <input type="text" class="form-control" value="{{ $item->title }}" disabled>
                        <p id="err-title" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('location') {{ 'is-invalid' }} @enderror">
                        <label for="location">Ubicación</label>
                        <input type="text" class="form-control" value="{{ $item->location }}" disabled>
                        <p id="err-location" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('number_seats') {{ 'is-invalid' }} @enderror">
                        <label for="number_seats">Número de asientos</label>
                        <input type="number" class="form-control" value="{{ $item->number_seats }}" disabled>
                        <p id="err-number_seats" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('available_seats') {{ 'is-invalid' }} @enderror">
                        <label for="available_seats">Asientos disponibles</label>
                        <input type="number" class="form-control" value="{{ $item->available_seats }}" disabled>
                        <p id="err-available_seats" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="row">
                        <h4 class="text-center col-12 col-md-12">Participante</h4>
                        <div class="form-control col-md-6 col-12">
                            <label for="cargo">Cargo del Particpante</label>
                            <input type="text" name="cargo" id="cargo" class="form-control" autofocus>
                        </div>
                        <div class="form-control col-md-6 col-12">
                            <label for="ParallelName">Nombre del Particpante</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-control col-md-6 col-12">
                            <label for="ParallelName">Celular del Particpante</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="form-control col-md-6 col-12">
                            <label for="ParallelName">Correo del Particpante</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <input type="hidden" value="{{ $item->id }}" name="schedule_id">
                    </div>
                    <div id="app-cover">
                        <h4 class="text-center">Participantes</h4>
                        <div class="row flex flex-center" id="container-paralles">
                            @foreach ($item->participants as $key => $participant)
                                <div class="toggle-button-cover-switch m-2" style="background: #ebebeb;height: 75px;">
                                    <p class="text-center">
                                        {{ $participant->title }} - {{ $participant->cargo }}</p>
                                    <div class="flex flex-center">
                                        <button type="button" class="btn btn-danger btn-sm" data-tooltip="Eliminar"
                                            onclick="removetFront(this, '{{ $participant->id }}')"><i
                                                class="far fa-trash-alt"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
        <div class="text-center">
            <input class="btn btn-success btn-sm" id="btn-submit" type="submit" onclick="saveData(event)"
                value="Actualizar información">
        </div>
        </form>

    </div>
</div>
</div>
<script>
    function saveData(event) {
        console.log(12);
        $('.err-fields').addClass('hidden')
        if (event && event.preventDefault) {
            event.preventDefault();
        }
        $('#btn-submit').attr('disable', 'true');
        console.log(12);

        $.easyAjax({
            url: '{{ route($route, $item->id) }}',
            container: '#formSave',
            type: "POST",
            redirect: false,
            file: true,
            data: $('#formSave').serialize(),
            success: function(response) {
                $('#btn-submit').attr('disable', 'false');
                $.notify({
                    icon: 'flaticon-hands',
                    title: response.message,
                    message: '',
                }, {
                    type: 'info',
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    time: 1000,
                });
                $('#modal-component').trigger('click');
                window.LaravelDataTables["{{ $action }}-table"].draw()
            },
            error: function(error) {
                showErrors(error);
            },
        });
    }


    function removetFront(t, id) {
        var url = '{{ route('admin.schedule.participants.delete', ':id') }}';
        url = url.replace(':id', id);
        $.easyAjax({
            url: url,
            container: '#formSave',
            type: "POST",
            redirect: false,
            file: true,
            data: $('#formSave').serialize(),
        });
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e)
    }
    $('.select2').select2();

</script>
