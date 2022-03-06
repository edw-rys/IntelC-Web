<div class="row">
    
    <div class="col-sm-12">
        <form action="{{ route($route) }}" id="formSave" method="POST" onsubmit="saveData(event)">
            @csrf

            <h3>Nuevo {{ $singular_title ?? 'Alojamiento' }}</h3>
            <div class="card-body">
                <div class="form-group @error('title') {{ 'is-invalid' }} @enderror">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" name="title" id="title">
                    <p id="err-title" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('address') {{ 'is-invalid' }} @enderror">
                    <label for="address">Dirección</label>
                    <input type="text" class="form-control" name="address" id="address">
                    <p id="err-address" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('phone') {{ 'is-invalid' }} @enderror">
                    <label for="phone">Teléfono</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                    <p id="err-phone" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('email') {{ 'is-invalid' }} @enderror">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" name="email" id="email">
                    <p id="err-email" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('email') {{ 'is-invalid' }} @enderror">
                    <label for="email">Sitio web</label>
                    <input type="text" class="form-control" name="website" id="website">
                    <p id="err-website" class="hidden helper-block err-fields"></p>
                </div>

                <div class="form-group @error('email') {{ 'is-invalid' }} @enderror">
                    <label for="email">Descripción</label>
                    @include('components.textarea')
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
                <h4 class="text-center" style="width: 100%">Imágenes del alojamiento</h4>
                <div id="uploadFilesPanel" class="d-none" style="width: 100%">
                    <h5 class="text-center" >Subiendo imágenes</h5>
                    <progress value="0" max="100" style="width: 100%;height: 25px;"></progress>
                </div>
            </div>
            <div id="container-images" class="collapse show">
            </div>
            <div class="flex flex-center">
                <button class="btn btn-warning m-3 btn-sm" onclick="appendImage()" type="button">Agregar</button>
            </div>
        </div>

        <div class="text-center">
            <input class="btn btn-success btn-sm" id="btn-submit" type="submit" value="Guardar" onclick="saveData()">
        </div>
    </div>
</div>
<script>
    var countImages = 0;
    var countImagesUpload = 0;

    function saveData(event){
        let addArchive = true;
        let sizePermitido = true;
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
            url: '{{route($route)}}',
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
                }
                window.LaravelDataTables["{{$action}}-table"].draw()
            },
            error: function (error) {
                $('#btn-submit').attr('disable', 'false');

                showErrors(error);
            },
        });
    }

    function appendImage() {
        $('#container-images').append(getFormatLabel());
    }
    function getFormatLabel() {
        return `<div class="form-group image-input-el">
            <div class="flex flex-center">
                <input type="file" class="form-control" class="pictures" accept="image/*">
                <button type="button" class="btn btn-danger btn-sm" data-tooltip="Borrar"
                    onclick="removeElement(this)"><i
                    class="far fa-trash-alt"></i></button>
                </div>
        </div>`
    }
    /**
     * 
     */
    function removeElement(t){
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e)
    }
    /**
     * Upload Images
     * @param id
     */
    function uploadImages(id) {
        $('.image-input-el').each(function() {
            var info = new FormData();
            var $this = $(this);
            var $inputArchivo = $this.find('input');
            console.log($inputArchivo);
            var archivo = $inputArchivo.prop("files")[0];
            if (archivo) {
                info.append("accommodation_id", id);
                info.append("file", archivo);
                info.append("_token", '{{ csrf_token() }}');

                $.ajax({
                    url: '{{route($route.'.upload')}}',
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
