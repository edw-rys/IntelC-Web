<div class="row">
    
    <div class="col-sm-12">
        <form action="{{ route($route) }}" id="formSave" method="POST" onsubmit="saveData(event)">
            @csrf

            <h3>Nueva {{ $singular_title ?? 'Obra' }}</h3>
            <div class="card-body">
                <div class="form-group @error('title') {{ 'is-invalid' }} @enderror">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" name="title" id="title">
                    <p id="err-title" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('location') {{ 'is-invalid' }} @enderror">
                    <label for="location">Ubicación</label>
                    <input type="text" class="form-control" name="location" id="location">
                    <p id="err-location" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('project') {{ 'is-invalid' }} @enderror">
                    <label for="project">Proyecto</label>
                    <input type="text" class="form-control" name="project" id="project">
                    <p id="err-project" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('work_amount') {{ 'is-invalid' }} @enderror">
                    <label for="work_amount">Monto Construcción</label>
                    <input type="work_amount" class="form-control" name="work_amount" id="work_amount">
                    <p id="err-work_amount" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('audit_amount') {{ 'is-invalid' }} @enderror">
                    <label for="audit_amount">Monto Fiscalización</label>
                    <input type="text" class="form-control" name="audit_amount" id="audit_amount">
                    <p id="err-audit_amount" class="hidden helper-block err-fields"></p>
                </div>

                <div class="form-group @error('percentage') {{ 'is-invalid' }} @enderror">
                    <label for="percentage">Porcentaje</label>
                    <div class="range-slider">
                        <input type="range" class="range-slider__range" name="percentage" id="percentage" min="0" max="100" value="0">
                        <span class="range-slider__value">0</span>
                    </div>
                    <p id="err-percentage" class="hidden helper-block err-fields"></p>
                </div>
                <div class="form-group @error('type_id') {{ 'is-invalid' }} @enderror">
                    <label for="type_id">Estado</label>
                    <select name="type_id" id="type_id" class="select2 form-group" style="width: 100%">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group @error('type_id') {{ 'is-invalid' }} @enderror">
                    <label for="icon">Icono</label>
                    <select name="icon" id="icon" class="select2_icon form-group" style="width: 100%">
                        @foreach ($icons as $icon)
                            <option value="{{ $icon->class }}">{{ $icon->class }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group @error('description') {{ 'is-invalid' }} @enderror">
                    <label for="description">Descripción</label>
                    @include('components.textarea')
                    <textarea name="description" id="description" class="d-none"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Imagen principal</label>
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
    var rangeSlider = function(){
        var slider = $('.range-slider'),
            range = $('.range-slider__range'),
            value = $('.range-slider__value');
            
        slider.each(function(){

            value.each(function(){
            var value = $(this).prev().attr('value');
            $(this).html(value);
            });

            range.on('input', function(){
            $(this).next(value).html(this.value);
            });
        });
    };

    rangeSlider();

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
    $('.select2_icon').select2({
        templateResult: formatIcon,
        templateSelection: formatIconSelected
    });
</script>
