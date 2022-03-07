<div class="row">
    
    <div class="col-sm-12">
        <form action="{{ route($route) }}" id="formSave" method="POST" onsubmit="return false">
            @csrf

            <h3>Nuevo {{ $singular_title ?? 'Dirección' }}</h3>
            <div class="card-body">
                <div class="form-group @error('question') {{ 'is-invalid' }} @enderror">
                    <label for="question">Pregunta</label>
                    <input type="text" class="form-control" name="question" id="question">
                    <p id="err-question" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('answer') {{ 'is-invalid' }} @enderror">
                    <label for="answer">Respuesta</label>
                    <input type="text" class="form-control" name="answer" id="answer">
                    <p id="err-answer" class="hidden helper-block err-fields"></p>
                </div>
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
        $('#btn-submit').attr('disable', 'true');
        $.easyAjax({
            url: '{{route($route)}}',
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
                $('#btn-submit').attr('disable', 'false');

                showErrors(error);
            },
        });
    }
</script>
