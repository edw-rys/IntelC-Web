<div class="row">
    
    <div class="col-sm-12">
        <form action="{{ route($route) }}" id="formSave" method="POST" onsubmit="saveData(event)">
            @csrf

            <h3>Nueva {{ $singular_title ?? 'Imagen para la galería' }}</h3>
            <div class="card-body">
                <div class="form-group @error('title') {{ 'is-invalid' }} @enderror">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" name="title" id="title">
                    <p id="err-title" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('status') {{ 'is-invalid' }} @enderror">
                    <label for="status">Estado</label>
                    <select name="status" id="status" class="select2 form-group" style="width: 100%">
                        @foreach (statusSimple() as $key => $status)
                            <option value="{{ $key }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input id="image" type="file" class="form-control" name="image" accept="image/*">
                </div>
            </div>
            <div class="text-center">
                <input class="btn btn-success btn-sm" id="btn-submit" type="submit" value="Guardar">
            </div>
        </form>
    </div>
</div>
<script>

    function saveData(event){

        $('.err-fields').addClass('hidden')
        if (event && event.preventDefault) {
            event.preventDefault();
        }
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
    $('.select2').select2();
</script>
