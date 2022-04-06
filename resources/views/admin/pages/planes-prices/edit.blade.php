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
                    <div class="form-group @error('title') {{ 'is-invalid' }} @enderror">
                        <label for="title">Título</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $item->title }}">
                        <p id="err-title" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('price') {{ 'is-invalid' }} @enderror">
                        <label for="price">Precio</label>
                        <input type="number" class="form-control" name="price" id="price" value="{{ $item->price}}">
                        <p id="err-price" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('short_description') {{ 'is-invalid' }} @enderror">
                        <label for="short_description">Breve descripción</label>
                        <input type="text" class="form-control" name="short_description" id="short_description" value="{{ $item->short_description }}">
                        <p id="err-short_description" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('email') {{ 'is-invalid' }} @enderror">
                        <label for="email">Descripción</label>
                        @include('components.textarea',[
                            'text'  => $item->description
                        ])
                        <textarea name="description" id="description" class="d-none"></textarea>
                    </div>
                    {{-- <div class="form-group">
                        <label for="image">Imagen principal</label>
                        <input id="image" type="file" class="form-control" name="image" accept="image/*">
                    </div>
                     --}}
                    <div class="form-group @error('type_id') {{ 'is-invalid' }} @enderror">
                        <label for="type_id">Tipo de plan</label>
                        <select name="type_id" id="type_id" style="width: 100%">
                            @foreach ($type_plans as $type)
                                <option value="{{ $type->id }}" {{ $type->id == $item->type_id ? 'selected': '' }}>{{ $type->title }}
                                </option>
                            @endforeach
                        </select>
                        <p id="err-type_id" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('image') {{ 'is-invalid' }} @enderror">
                        <label for="short_description">Icono</label>
                        <select name="image" id="image" style="width: 100%">
                            @foreach ($icons as $icon)
                                <option value="{{ $icon->class }}" {{ $item->image == $icon->class ? 'selected':'' }}> <img src="{{ $icon->class }}" alt=""> {{ $icon->name }}
                                </option>
                            @endforeach
                        </select>
                        <p id="err-short_description" class="hidden helper-block err-fields"></p>
                    </div>
                </div>
            </form>
  
            <div class="text-center">
                <input class="btn btn-success btn-sm" id="btn-submit" type="submit" value="Actualizar información" onclick="saveData()">
            </div>
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

    function removeElementItem(itemElement, route, token, id) {
        if (confirm('¿Está seguro que desea eliminar la información?')) {
            $.easyAjax({
                url: route,
                type: "DELETE",
                redirect: false,
                data: {
                    _token : token,
                    id : id,
                },
                success: function (response) {
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
                    removeElement(itemElement);
                },
                error: function (error) {
                    showErrors(error);
                },
            });
        }
        
    }
    
    function saveData(event){
        let sizePermitido = true;
        let addArchive = true;
        $('.image-input-el').each(function() {
            var info = new FormData();
            var $this = $(this);
            var $inputArchivo = $this.find('input');
            var archivo = $inputArchivo.prop("files")[0];
            if (archivo) {
                if (archivo.size > 1000000) {
                    sizePermitido = false;
                    console.log('Pesa más');
                }
            }else{
                addArchive = false;
            }
        });
        $('.err-fields').addClass('hidden')
        if (!sizePermitido) {
            alert('¡Los archivos deben pesar menos de 1mb!');
            return ;
        }
        if (!addArchive) {
            alert('¡Agregue el archivo!');
            return ;
        }

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
    
    var itemsEditor = 0;
    var editors = [];
    function getFormatLabel(name) {
        var html = templateTextEditor('editorquill-'+itemsEditor, '');
        return `<div class="form-group image-input-el mb-5">
            <div class="flex flex-center mt-4">
                <input type="file" class="form-control" class="pictures" accept="image/*">
                <button type="button" class="btn btn-danger btn-sm" data-tooltip="Borrar"
                    onclick="removeElement(this, ${itemsEditor})"><i
                    class="far fa-trash-alt"></i></button>
            </div>
            ${html}
        </div>`
    }
</script>
