<div class="card mt-3">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold">
            <i class="fas fa-pen p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
            {{$method == 'put' ? 'Edit' : 'Tambah'}} Paket
        </h6>
    </div>

    <div class="card-body">
        <form action="{{$method == 'post' ? route('cpanel.package.store') : route('cpanel.package.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{$method == 'put' ? method_field('put') : ''}}
            <input class="form-control text-sm bg-light" id="id" type="hidden" name="id" value="{{$data->id}}" readonly>
            <div class="row">
                <div class="px-md-3 col-md-8">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label px-0" for="name">Nama Paket <small class="text-danger">(*)</small></label>
                        <input class="form-control text-sm col-sm-12" id="name" type="text" name="name"
                            placeholder="Input name" value="{{old('name', $data->name)}}" required>
                    </div>
                </div>
                <div class="px-md-3 col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">Status</label>
                        <div class="col-md-12">
                            <select name="is_active" class="form-control form-select">
                                <option value="" selected disabled>Select Status</option>
                                <option {{$data->is_active == 1 ? 'selected':''}} value="1">Aktif</option>
                                <option {{$data->is_active == 0 ? 'selected':''}} value="0">Non Aktif</option>
                            </select>
                            @error('is_active') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="px-md-3 col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label px-0" for="min_quota">Kuota Minimal <small class="text-danger">(*)</small></label>
                        <input class="form-control text-sm col-sm-12" id="min_quota" type="number" name="min_quota"
                            min="0" value="{{old('min_quota', $data->min_quota)}}" required>
                    </div>
                </div>
                <div class="px-md-3 col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label px-0" for="max_quota">Kuota Maksimal <small class="text-danger">(*)</small></label>
                        <input class="form-control text-sm col-sm-12" id="max_quota" type="number" name="max_quota"
                            min="0" value="{{old('max_quota', $data->max_quota)}}" required>
                    </div>
                </div>
                <div class="px-md-3 col-md-2">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label px-0" for="price">Harga <small class="text-danger">(*)</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input class="form-control text-sm col-sm-12" id="price" type="number" name="price"
                                min="0" value="{{old('price', $data->price)}}" required>
                        </div>
                    </div>
                </div>
                <div class="px-md-3 col-md-2">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label px-0" for="unit">Satuan</label>
                        <input class="form-control text-sm col-sm-12" id="unit" type="text" name="unit"
                            min="0" value="{{old('unit', $data->unit)}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="px-md-3 col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label px-0" for="value">Deskripsi</label>
                        <div class="col-12 p-0">
                            <textarea class="form-control text-sm col-sm-12" style="height: 100px;" id="description" type="text" rows="2" name="description" placeholder="Optional">{{old('description', $data->description)}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 p-0 d-flex align-items-center justify-content-center">
                    <a href="{{route('cpanel.package.list')}}" class="btn btn-secondary mr-1">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>




@section('styles')
<style>
    .ck-editor__editable
    {
       min-height: 450px !important;
       max-height: 600px !important;
    }
</style>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/super-build/ckeditor.js"></script>
    <script>
        CKEDITOR.ClassicEditor.create(document.querySelector(".ckeditor5"), {
            height: '1000px',
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'heading',
                    '|', 'alignment',
                    '|', 'fontSize', 'fontColor', 'fontBackgroundColor', 'highlight',
                    '|', 'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                    'removeFormat',
                    '|', 'outdent', 'indent',
                    '|', 'bulletedList', 'numberedList', 'todoList',
                    '|', 'findAndReplace', 'selectAll',
                    '|', 'undo', 'redo', 'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed',
                    'specialCharacters',
                    '|', 'horizontalLine', 'pageBreak',
                    '|', 'exportPDF', 'exportWord', 'fullscreen'
                ],
                shouldNotGroupWhenFull: false
            },
            autoformat: {
                rules: [
                    {
                        mode: 'start',
                        name: 'capitalizeFirstLetter',
                        match: ( text ) => {
                            return /^[a-z]/.test( text );
                        },
                        replace: ( text ) => {
                            return text.charAt(0).toUpperCase() + text.slice(1);
                        }
                    }
                ]
            },
            typing: {
                transformations: {
                    remove: [
                        // Do not use the transformations from the
                        // 'symbols' and 'quotes' groups.
                        'symbols',
                        'quotes',

                        // As well as the following transformations.
                        'arrowLeft',
                        'arrowRight'
                    ],

                    extra: [
                        // Add some custom transformations, for example, for emojis.
                        { from: ':)', to: '🙂' },
                        { from: ':+1:', to: '👍' },
                        { from: ':tada:', to: '🎉' },

                        // You can also define patterns using regular expressions.
                        // Note: The pattern must end with `$` and all its fragments must be wrapped
                        // with capturing groups.
                        // The following rule replaces ` "foo"` with ` «foo»`.
                        {
                            from: /(^|\s)(")([^"]*)(")$/,
                            to: [ null, '«', null, '»' ]
                        },

                        // Finally, you can define `to` as a callback.
                        // This (naive) rule will auto-capitalize the first word after a period, question mark, or an exclamation mark.
                        {
                            from: /([.?!] )([a-z])$/,
                            to: matches => [ null, matches[ 1 ].toUpperCase() ]
                        }
                    ],
                }
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
                        view: 'h4',
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
            config: {
                // Mengatur tinggi baris menjadi 1.5
                lineHeight: 0.5
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Type your content ...',
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
                    styles: false
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
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                        '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                        '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                        '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }]
            },
            // The "superbuild" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'AIAssistant',
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
                // 'FullScreen',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features are part of the Productivity Pack and require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced',
                'CaseChange'
            ]
        });
    </script>
@endsection
