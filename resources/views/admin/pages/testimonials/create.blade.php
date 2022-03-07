<div class="row">

    <div class="col-sm-12">
        <form action="{{ route($route) }}" id="formSave" method="POST" onsubmit="return false">
            @csrf

            <h3>Nuevo {{ $singular_title ?? 'Dirección' }}</h3>
            <div class="card-body">
                <div class="form-group @error('person') {{ 'is-invalid' }} @enderror">
                    <label for="title">Nombre</label>
                    <input type="text" class="form-control" name="person" id="person">
                    <p id="err-title" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('place') {{ 'is-invalid' }} @enderror">
                    <label for="place">Ubicacion</label>
                    <input type="text" class="form-control" name="place" id="place">
                    <p id="err-place" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('stars') {{ 'is-invalid' }} @enderror">
                    <label for="price">Calificación [0-5]</label>
                    <input type="number" class="form-control" name="stars" id="stars">
                    <p id="err-stars" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('email') {{ 'is-invalid' }} @enderror">
                    <label for="email">Descripción</label>
                    @include('components.textarea')
                    <textarea name="description" id="description" class="d-none"></textarea>
                </div>
        </form>

        <div class="text-center">
            <input class="btn btn-success btn-sm" id="btn-submit" type="submit" value="Guardar" onclick="saveData()">
        </div>
    </div>
</div>
@include('components.textarea-script')

<script>
    $('#image').select2({
        templateResult: formatState,
        // templateSelection: formatIconSelected
    });

    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var baseUrl = "{{asset('/intelc/img/icons/')}}";
        var $state = $(
            '<span><img src="' + baseUrl + '/' + state.element.value + '" class="img-flag" width="30px" /> ' +
            state.text + '</span>'
        );
        return $state;
    };


    function saveData(event) {
        $('.err-fields').addClass('hidden')
        if (event && event.preventDefault) {
            event.preventDefault();
        }
        $('#description').val(editor.root.innerHTML);
        $('#btn-submit').attr('disable', 'true');
        $.easyAjax({
            url: '{{ route($route) }}',
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
                $('#btn-submit').attr('disable', 'false');

                showErrors(error);
            },
        });
    }
</script>
