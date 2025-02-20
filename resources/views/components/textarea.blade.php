<div class="quill-wrap">
    <!-- Create the toolbar container -->
    <div id="toolbar">
        <span class="ql-formats">
            <select class="ql-header">
                <option value="1">Heading</option>
                <option value="2">Subheading</option>
                <option selected>Normal</option>
            </select>
            <select class="ql-font">
                <option selected>Sans Serif</option>
                <option value="serif">Serif</option>
                <option value="monospace">Monospace</option>
            </select>
        </span>
        <span class="ql-formats">
            <button class="ql-bold"></button>
            <button class="ql-italic"></button>
            <button class="ql-underline"></button>
            <button class="ql-strike"></button>
        </span>
        <span class="ql-formats">
            <select class="ql-color"></select>
            <select class="ql-background"></select>
        </span>
        <span class="ql-formats">
            <button class="ql-list" value="ordered"></button>
            <button class="ql-list" value="bullet"></button>
            <select class="ql-align">
                <option selected></option>
                <option value="center"></option>
                <option value="right"></option>
                <option value="justify"></option>
            </select>
        </span>
        <span class="ql-formats">
            <button class="ql-blockquote"></button>
            <button class="ql-link"></button>
            <button class="ql-code-block"></button>
        </span>
        <span class="ql-formats">
            <button class="ql-clean"></button>
        </span>
    </div>
    <!-- Create the editor container -->
    <div id="editor">@if (isset($text)){!! $text !!}@endif</div>
</div>
<script>
    var editor = new Quill('#editor', {
        modules: { toolbar: '#toolbar' },
        theme: 'snow'
    });
</script>