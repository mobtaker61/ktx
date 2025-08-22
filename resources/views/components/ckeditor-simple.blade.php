@props(['id', 'name', 'value' => '', 'placeholder' => '', 'rows' => 3, 'required' => false, 'error' => null])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $name }} @if($required) * @endif</label>
    <textarea
        id="{{ $id }}"
        name="{{ $name }}"
        class="form-control @error($name) is-invalid @enderror"
        rows="{{ $rows }}"
        @if($required) required @endif
        placeholder="{{ $placeholder }}"
        style="display: none;"
    >{!! old($name, $value) !!}</textarea>

    @if($error)
        <div class="invalid-feedback">{{ $error }}</div>
    @endif

    <div class="form-text">You can use basic formatting options above.</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    ClassicEditor
        .create(document.querySelector('#{{ $id }}'), {
            toolbar: {
                items: [
                    'bold',
                    'italic',
                    'link',
                    'imageUpload',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'undo',
                    'redo'
                ]
            },
            language: 'en',
            image: {
                upload: {
                    types: ['jpeg', 'png', 'gif', 'webp'],
                    url: '{{ route("admin.upload-image") }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:inline'
                ]
            },
            licenseKey: '',
        })
        .then(editor => {
            // Store editor instance globally for form submission
            window.editor_{{ $id }} = editor;

            // Update textarea value when form is submitted
            const form = editor.sourceElement.closest('form');
            if (form) {
                form.addEventListener('submit', function() {
                    editor.sourceElement.value = editor.getData();
                });
            }
        })
        .catch(error => {
            console.error(error);
        });
});
</script>
