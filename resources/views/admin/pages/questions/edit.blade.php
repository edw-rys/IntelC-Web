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
                    <div class="form-group @error('question') {{ 'is-invalid' }} @enderror">
                        <label for="question">Pregunta</label>
                        <input type="text" class="form-control" name="question" id="question" value="{{ $item->question }}">
                        <p id="err-question" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('answer') {{ 'is-invalid' }} @enderror">
                        <label for="answer">Respuesta</label>
                        <input type="text" class="form-control" name="answer" id="answer" value="{{ $item->answer }}">
                        <p id="err-answer" class="hidden helper-block err-fields"></p>
                    </div>
                </div>
            </form>
            <div class="text-center">
                <input class="btn btn-success btn-sm" id="btn-submit" type="submit" value="Actualizar información" onclick="saveData()">
            </div>
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
            file: false,
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
