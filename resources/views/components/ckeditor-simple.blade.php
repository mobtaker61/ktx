@props(['id', 'name', 'value' => '', 'placeholder' => '', 'rows' => 3, 'required' => false, 'error' => null])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $name }} @if($required) * @endif</label>
    <textarea
        id="{{ $id }}"
        name="{{ $name }}"
        class="form-control @error($name) is-invalid @enderror"
        rows="{{ $rows }}"
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
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                },
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:inline'
                ]
            },
            licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3ODc0NDMxOTksImp0aSI6ImQ2MTgyNWExLTE4YzYtNGZmYi04NzkzLTk1NDMyMDY0NGM0OSIsImxpY2Vuc2VkSG9zdHMiOlsia3R4LnRlc3QiLCJrdHhjb21wcmVzc29yLmNvbSJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImZlYXR1cmVzIjpbIkRSVVAiLCJFMlAiLCJFMlciXSwidmMiOiI0MmFmM2UwOSJ9.-scNFxdPlFMZacCb_PRAVfFWimR92HSydi72J0UN8AE7TYPJH1Q_XnC0aJoRftL51fMmRhzJjTsCGwAhJG7CGA',
        })
        .then(editor => {
            console.log('Simple CKEditor initialized for {{ $id }}');

            // Store editor instance globally for form submission
            window.editor_{{ $id }} = editor;

            // Update textarea value when form is submitted
            const form = editor.sourceElement.closest('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    // Update the hidden textarea with editor content
                    editor.sourceElement.value = editor.getData();

                    // Custom validation for required fields
                    @if($required)
                    if (!editor.getData().trim()) {
                        e.preventDefault();
                        alert('{{ $name }} is required. Please enter some content.');

                        // Focus on the editor
                        editor.focus();
                        return false;
                    }
                    @endif
                });
            }
        })
        .catch(error => {
            console.error('Simple CKEditor error:', error);
        });
});
</script>
