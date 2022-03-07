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
                    <div class="form-group @error('person') {{ 'is-invalid' }} @enderror">
                        <label for="person">Nombre</label>
                        <input type="text" class="form-control" name="person" id="person" value="{{ $item->person }}">
                        <p id="err-person" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('stars') {{ 'is-invalid' }} @enderror">
                        <label for="price">Calificación [0-5]</label>
                        <input type="number" class="form-control" name="stars" id="price" value="{{ $item->stars}}">
                        <p id="err-stars" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('place') {{ 'is-invalid' }} @enderror">
                        <label for="place">Breve place</label>
                        <input type="text" class="form-control" name="place" id="place" value="{{ $item->place }}">
                        <p id="err-place" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('email') {{ 'is-invalid' }} @enderror">
                        <label for="email">Descripción</label>
                        @include('components.textarea',[
                            'text'  => $item->description
                        ])
                        <textarea name="description" id="description" class="d-none"></textarea>
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

    function saveData(event){
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
</script>
