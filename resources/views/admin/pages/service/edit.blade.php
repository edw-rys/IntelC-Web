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
                    <div class="form-group">
                        <label for="image">Imagen principal</label>
                        <input id="image" type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    
                </div>
            </form>
            <div class="card">
                <div class="card-header" data-toggle="collapse" data-target="#container-images" aria-expanded="true" aria-controls="container-images" style="cursor: pointer">
                    <h4 class="text-center" style="width: 100%">Imágenes del servicio</h4>
                    <div id="uploadFilesPanel" class="d-none" style="width: 100%">
                        <h5 class="text-center" >Subiendo imágenes</h5>
                        <progress value="52" max="100" style="width: 100%;height: 25px;"></progress>
                    </div>
                </div>
                <div id="container-images" class="collapse show">
                    
                </div>
                <div class="flex flex-center">
                    <button class="btn btn-warning m-3 btn-sm" onclick="appendImage()" type="button">Agregar</button>
                </div>
            </div>
            @if ($item->items->isNotEmpty())
                <div class="card">
                    <div class="card-header" data-toggle="collapse" data-target="#images_uploaded" aria-expanded="true" aria-controls="images_uploaded" style="cursor: pointer">
                        <h4 class="text-center" style="width: 100%">Imágenes subidas</h4>
                    </div>
                    <div class="collapse" id="images_uploaded">
                        @foreach ($item->items as $image)
                            <div>
                                <div class="flex flex-center mt-2" style="justify-content: space-around">
                                    <a href="{{$image->file_url}}" target="_blank">
                                        <img src="{{$image->file_url}}" alt="" width="150px">
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-tooltip="Borrar" style="height: 50px;"
                                        onclick="removeElementItem(this, '{{ route('admin.service.item.remove', [$image->id])}}', '{{ csrf_token() }}', '{{ $image->id }}');"><i
                                            class="far fa-trash-alt"></i></button>
                                </div>
                                <div class="pl-5 pt-3 pt-3 pr-5" style="border: 1px solid #000">
                                    {!! $image->description !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="text-center">
                <input class="btn btn-success btn-sm" id="btn-submit" type="submit" value="Actualizar información" onclick="saveData()">
            </div>
        </div>
    </div>
</div>
@include('components.textarea-script')
<script>
    var countImages = 0;
    var countImagesUpload = 0;
    $('.select2').select2({
        templateResult: formatIcon,
        templateSelection: formatIconSelected
    });
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
               $('#btn-submit').attr('disable', 'false');
                countImages = document.getElementsByClassName('image-input-el').length;
                $('progress').attr('max', countImages);
                $('progress').attr('value', 0);
                if (countImages > 0) {
                    $('#uploadFilesPanel').removeClass('d-none');
                    uploadImages(response.id);
                }else{
                    // $.notify(
                    //     {
                    //         icon: 'flaticon-hands',
                    //         title: response.message,
                    //         message: '',
                    //     },{
                    //     type: 'info',
                    //     placement: {
                    //         from: "bottom",
                    //         align: "right"
                    //     },
                    //     time: 1000,
                    // });
                    $('#modal-component').trigger('click');
                }
                window.LaravelDataTables["{{$action}}-table"].draw()
            },
            error: function (error) {
                showErrors(error);
            },
        });
    }
    function appendImage() {
        $('#container-images').append(getFormatLabel());
        editors[itemsEditor] = new Quill('#editorquill-'+itemsEditor, {
            modules: { toolbar: '#toolbareditorquill-'+itemsEditor },
            theme: 'snow'
        });
        itemsEditor++;
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
    /**
     * 
     */
    function removeElement(t, index){
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e)
        editors.splice(index,1)
    }
    
    /**
     * Upload Images
     * @param id
     */
    function uploadImages(id) {
        $('.image-input-el').each(function(key, value) {
            var info = new FormData();
            var $this = $(this);
            var $inputArchivo = $this.find('input');
            var archivo = $inputArchivo.prop("files")[0];
            if (archivo) {
                info.append("service_id", id);
                info.append("description", editors[key].root.innerHTML);
                info.append("file", archivo);
                info.append("_token", '{{ csrf_token() }}');

                $.ajax({
                    url: '{{route($route_upload)}}',
                    method: "POST",
                    data: info,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                }).done( function (response) {
                        // Add global number upload
                        countImagesUpload++;
                        $('progress').attr('value', countImagesUpload);
                        if (countImages <= countImagesUpload) {
                            $('#modal-component').trigger('click');
                        }else{
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
                        }
                    }).fail( function (error) {
                        $('#btn-submit').attr('disable', 'false');
                        countImagesUpload++;
                        showErrors(error);
                    });
                ;
            }
        });
    }
</script>
