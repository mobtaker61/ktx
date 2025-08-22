@props(['id', 'name', 'value' => '', 'placeholder' => '', 'rows' => 10, 'required' => false, 'error' => null])

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

    <div class="form-text">You can use the rich text editor above for formatting. HTML tags are supported.</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    ClassicEditor
        .create(document.querySelector('#{{ $id }}'), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'undo',
                    'redo'
                ]
            },
            language: 'en',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:inline',
                    'imageStyle:block',
                    'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            licenseKey: '',
        })
        .then(editor => {
            console.log('CKEditor initialized for {{ $id }}');

            // Store editor instance globally for form submission
            window.editor_{{ $id }} = editor;

            // Custom upload adapter for images
            editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                console.log('Upload adapter created');
                return {
                    upload: function() {
                        console.log('Upload started');
                        return loader.file.then(file => {
                            console.log('File to upload:', file);

                            const formData = new FormData();
                            formData.append('upload', file);

                            return fetch('{{ route("admin.upload-image") }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: formData
                            })
                            .then(response => {
                                console.log('Upload response status:', response.status);
                                if (!response.ok) {
                                    return response.text().then(text => {
                                        console.error('Upload failed with response:', text);
                                        throw new Error('Upload failed: ' + response.status);
                                    });
                                }
                                return response.json();
                            })
                            .then(data => {
                                console.log('Upload success:', data);
                                if (data.uploaded && data.url) {
                                    return { default: data.url };
                                } else {
                                    throw new Error('Invalid response format');
                                }
                            })
                            .catch(error => {
                                console.error('Upload error:', error);
                                throw error;
                            });
                        });
                    }
                };
            };

            // Update textarea value when form is submitted
            const form = editor.sourceElement.closest('form');
            if (form) {
                form.addEventListener('submit', function() {
                    editor.sourceElement.value = editor.getData();
                });
            }
        })
        .catch(error => {
            console.error('CKEditor error:', error);
        });
});
</script>
