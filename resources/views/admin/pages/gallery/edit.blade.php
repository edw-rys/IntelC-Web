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
    
                    <div class="form-group @error('status') {{ 'is-invalid' }} @enderror">
                        <label for="status">Estado</label>
                        <select name="status" id="status" class="select2 form-group" style="width: 100%">
                        
                            @foreach (statusSimple() as $key => $status)
                                <option value="{{ $key }}" {{ $item->status == $key ? 'selected' : ''}}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Imagen principal</label>
                        <input id="image" type="file" class="form-control" name="image" accept="image/*">
                    </div>
                </div>
                <div class="text-center">
                    <input class="btn btn-success btn-sm" id="btn-submit" type="submit" value="Actualizar información" onclick="saveData()">
                </div>
            </form>
            
        </div>
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
            url: '{{route($route, $item->id)}}',
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
                showErrors(error);
            },
        });
    }
    $('.select2').select2();
</script>
