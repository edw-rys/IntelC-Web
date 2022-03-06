<div class="row">
    
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route($route) }}" id="formSave" method="POST" onsubmit="saveData(event)">
                @csrf

                <div class="card-header">
                    <h3>Crear {{ $singular_title ?? 'Libro' }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group @error('name') {{ 'is-invalid' }} @enderror">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name">
                        <p id="err-name" class="hidden helper-block err-fields"></p>
                    </div>
                </div>

                <div class="card-footer">
                    <input class="btn btn-success" type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function saveData(event){
        $('.err-fields').addClass('hidden')
        event.preventDefault();
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
                showErrors(error);
            },
        });
    }
</script>
