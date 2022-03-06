<div class="row">
    
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route($route, $item->id) }}" id="formSave" method="PUT" enctype="multipart/form-data" onsubmit="saveData(event)">
                @csrf

                <div class="card-header">
                    <h3>Editar {{ $singular_title ?? 'Libro' }}</h3>
                </div>
                <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="card-body">
                    <div class="form-group @error('name') {{ 'is-invalid' }} @enderror">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $item->name}}" autofocus>
                        <p id="err-name" class="hidden helper-block err-fields"></p>
                    </div>
                </div>

                <div class="card-footer">
                    <input class="btn btn-success" type="submit" value="Editar">
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
                window.LaravelDataTables["{{$action}}-table"].draw()
                
                $('#modal-component').trigger('click');
            },
            error: function (error) {
                showErrors(error);
            },
        });
    }
</script>
