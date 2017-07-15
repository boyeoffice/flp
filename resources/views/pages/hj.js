 $(document).ready(function(){
        var editor = new Simditor({
            textarea: $('#editor'),
            upload: {
                url: '{{ url('posts.upload_image') }}',
                params: null,
                fileKey: 'upload_file',
                connectionCount: 3,
                leaveConfirm: 'File uploading, will be cancel if you leave the page.'
            },
            pasteImage: true,
            defaultImage: "{{ asset('editor/no-preview.jpg') }}",
            toolbar: ['bold', 'italic', 'underline', 'strikethrough', 'ol', 'ul', 'blockquote', 'code', 'link', 'image', 'indent', 'outdent', 'marked', 'emoji'],
            
                imagePath: '{{ asset('editor/images/emoji/') }}'
            })
        });

        $('input[name="tags"]').tagsInput({
            maxTags: 5,
            trimValue: true,
            allowDuplicates: false
        });

    });
