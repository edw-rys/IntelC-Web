<div class="row">

    <div class="col-sm-12">
        <form action="{{ route($route) }}" id="formSave" method="POST" onsubmit="return false">
            @csrf

            <h3>Nuevo {{ $singular_title ?? 'Dirección' }}</h3>
            <div class="card-body">
                <div class="form-group @error('title') {{ 'is-invalid' }} @enderror">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" name="title" id="title">
                    <p id="err-title" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('price') {{ 'is-invalid' }} @enderror">
                    <label for="price">Precio</label>
                    <input type="number" class="form-control" name="price" id="price">
                    <p id="err-price" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('short_description') {{ 'is-invalid' }} @enderror">
                    <label for="short_description">Breve descripción</label>
                    <input type="text" class="form-control" name="short_description" id="short_description" value="Plan mensual">
                    <p id="err-short_description" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('email') {{ 'is-invalid' }} @enderror">
                    <label for="email">Descripción</label>
                    @include('components.textarea')
                    <textarea name="description" id="description" class="d-none"></textarea>
                </div>

                <div class="form-group @error('image') {{ 'is-invalid' }} @enderror">
                    <label for="short_description">Icono</label>
                    <select name="image" id="image" style="width: 100%">
                        @foreach ($icons as $icon)
                            <option value="{{ $icon->class }}"><img
                                    src="{{ $icon->class }}" alt=""> {{ $icon->name }}
                            </option>
                        @endforeach
                    </select>
                    <p id="err-short_description" class="hidden helper-block err-fields"></p>
                </div>

                {{-- <div class="form-group">
                    <label for="image">Imagen principal</label>
                    <input id="image" type="file" class="form-control" name="image" accept="image/*">
                </div> --}}
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

    var countImages = 0;
    var countImagesUpload = 0;

    function saveData(event) {
        let addArchive = true;
        let sizePermitido = true;
        $('.image-input-el').each(function() {
            var $this = $(this);
            var $inputArchivo = $this.find('input');
            var archivo = $inputArchivo.prop("files")[0];
            var info = new FormData();
            if (archivo) {
                if (archivo.size > 1000000) {
                    sizePermitido = false;
                    console.log('Pesa más');
                }
            } else {
                addArchive = false;
            }
        });
        if (!sizePermitido) {
            alert('¡Los archivos deben pesar menos de 1mb!');
            return;
        }
        if (!addArchive) {
            alert('¡Agregue el archivo!');
            return;
        }


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

    var itemsEditor = 0;
    var editors = [];
</script>
