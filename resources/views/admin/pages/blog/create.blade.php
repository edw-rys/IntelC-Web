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
                <div class="form-group @error('email') {{ 'is-invalid' }} @enderror">
                    <label for="email">Descripción</label>
                    @include('components.textarea')
                    <textarea name="description" id="description" class="d-none"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Imagen principal</label>
                    <input id="image" type="file" class="form-control" name="image" accept="image/*">
                </div>
        </form>

        <div class="text-center">
            <input class="btn btn-success btn-sm" id="btn-submit" type="submit" value="Guardar" onclick="saveData()">
        </div>
    </div>
</div>

<script>
    function saveData(event){

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
                $('#btn-submit').attr('disable', 'false');

                showErrors(error);
            },
        });
    }
</script>
