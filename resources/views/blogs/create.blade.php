@extends('layouts.admin-master')
@section('content')
    <title>
        إضافة مقال</title>
    <div class="card-header">
        <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class='row'>
                    <div class="col-12 mt-3">
                        <label for="title" class="control-label">عنوان المدونة</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                            required autocomplete="title" autofocus title="يرجي ادخال عنوان المدونة" required>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="content" class="control-label">محتوى المدونة</label>
                        <textarea type="text" class="ckeditor form-control" id="blogContentCreate" name="content" role="textbox"
                            title="يرجي ادخال محتوى المدونة" value="{{ old('content') }}"  autocomplete="content" style="text-align: right" dir="rtl" autofocus required> 
                        </textarea>
                    </div>
                    <div class="col-12">
                        <label for='tags' class="form-label"> الكلمات الدلالية </label>
                        <input type="text" class="form-control" id="tag" data-role="tagsinput" name="tag"
                            value="{{ old('tag') }}" autocomplete="tag" autofocus>
                    </div>
                    <div class='col-12 mt-3'>
                        <label for="category" class="control-label">التصنيف</label>
                        <select name="category_id" class="form-control SlectBox" value="{{ old('category_id') }}" required
                            autocomplete="category_id" autofocus>
                            <!--placeholder-->
                            <option value="" selected disabled>حدد التصنيف</option>
                            @foreach ($categories as $category)
                                <option value={{ $category->id }}> {{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='col-12 mt-3'>
                        <label for="author" class="control-label">المؤلف</label>
                        <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}"
                            autocomplete="author" required autofocus>
                    </div>
                    <div class='col-12 mt-3'>
                        <label for="logo">المرفقات</label>
                        <input type="file" name="logo" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                            data-height="70" required />
                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                    </div>
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-secondary"> نشر</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">تراجع</a>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>

    @push('scripts')
        <script>
            $("#tag").tagsinput('items')
            const tags = {{ Js::from($tags) }};
            let tagsArr = [];
            tags.forEach((tag) => {

                tagsArr.push(',' + tag.name)
            })
            CKEDITOR.ClassicEditor
                .create(document.querySelector("#blogContentCreate"), {
                     language: 'ar',
                    ckfinder: {
                        uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
            },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                   
                    toolbar: {                   
                        items: [    
                            'heading', '|',  
                            'exportPDF', 'exportWord', '|',
                            'findAndReplace', 'selectAll', '|',
                            'bold', 'italic', 'underline', 'removeFormat', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'outdent', 'indent', '|',
                            'undo', 'redo',
                            '-',
                            'fontSize', 'fontFamily', 'fontColor', 'highlight', '|',
                            'alignment', '|',
                            'specialCharacters' , '|',
                            'link', 'insertImage', 'blockQuote', 'insertTable',
                        ],
                        shouldNotGroupWhenFull: true
                    },

                    // Changing the language of the interface requires loading the language file using the <script> tag.
                    // language: 'es',
                    list: {
                        properties: {
                            styles: true,
                            startIndex: true,
                            reversed: true
                        }
                    },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            },
                            {
                                model: 'heading3',
                                view: 'h3',
                                title: 'Heading 3',
                                class: 'ck-heading_heading3'
                            },
                            {
                                model: 'heading4',
                                view: 'h4',
                                title: 'Heading 4',
                                class: 'ck-heading_heading4'
                            },
                            {
                                model: 'heading5',
                                view: 'h5',
                                title: 'Heading 5',
                                class: 'ck-heading_heading5'
                            },
                            {
                                model: 'heading6',
                                view: 'h6',
                                title: 'Heading 6',
                                class: 'ck-heading_heading6'
                            }
                        ]
                    },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                    placeholder: 'أدخل المحتوى',
                    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                    fontFamily: {
                        options: [
                            'default',
                            'Arial, Helvetica, sans-serif',
                            'Courier New, Courier, monospace',
                            'Georgia, serif',
                            'Lucida Sans Unicode, Lucida Grande, sans-serif',
                            'Tahoma, Geneva, sans-serif',
                            'Times New Roman, Times, serif',
                            'Trebuchet MS, Helvetica, sans-serif',
                            'Verdana, Geneva, sans-serif'
                        ],
                        supportAllValues: true
                    },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                    fontSize: {
                        options: [10, 12, 14, 'default', 18, 20, 22],
                        supportAllValues: true
                    },
                    // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                    htmlSupport: {
                        allow: [{
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }]
                    },
                    // Be careful with enabling previews
                    // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                    htmlEmbed: {
                        showPreviews: true
                    },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                    link: {
                        decorators: {
                            addTargetToExternalLinks: true,
                            defaultProtocol: 'https://',
                            toggleDownloadable: {
                                mode: 'manual',
                                label: 'Downloadable',
                                attributes: {
                                    download: 'file'
                                }
                            }
                        }
                    },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                    mention: {
                        feeds: [{
                            marker: '#',
                            feed: tagsArr,
                            minimumCharacters: 1
                        }]
                    },
                    // The "super-build" contains more premium features that require additional configuration, disable them below.
                    // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                    removePlugins: [
                        // These two are commercial, but you can try them out without registering to a trial.
                        // 'ExportPdf',
                        // 'ExportWord',
                        'CKBox',
                        'CKFinder',
                        'EasyImage',
                        // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                        // Storing images as Base64 is usually a very bad idea.
                        // Replace it on production website with other solutions:
                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                        // 'Base64UploadAdapter',
                        'RealTimeCollaborativeComments',
                        'RealTimeCollaborativeTrackChanges',
                        'RealTimeCollaborativeRevisionHistory',
                        'PresenceList',
                        'Comments',
                        'TrackChanges',
                        'TrackChangesData',
                        'RevisionHistory',
                        'Pagination',
                        'WProofreader',
                        // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                        // from a local file system (file://) - load this site via HTTP server if you enable MathType
                        'MathType'
                    ]
                }).then(editor => {
                    window.editor = editor;
                })
                .catch(err => {
                    console.error(err.stack);
                });
        </script>
        {{--  <script>
            CKEDITOR.editorConfig = function (config) {
                // Default language direction
                config.contentsLangDirection = 'rtl';
            };
        </script>  --}}
    @endpush
@endsection
