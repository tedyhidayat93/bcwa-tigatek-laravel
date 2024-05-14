<div class="card m-0 rounded-0 shadow-none">
    <div class="card-header bg-light border-none bg-white">
        <h6 class="m-0 text-dark font-weight-bold float-left">
            <i class="fas fa-pen p-1 bg-teal rounded mr-1"></i> {{$method == 'put' ? 'Edit' : 'Create New'}} Article
        </h6>

        @if($method == 'put')
        <button type="button" class="btn btn-sm btn-light float-right text-teal" data-toggle="modal"
            data-target="#history-post">
            <i class="fas fa-history"></i> View History Update
        </button>
        @endif

    </div>

    <form action="{{$method == 'post' ? route('cpanel.medizine.store') : route('cpanel.medizine.update')}}"
        method="POST" enctype="multipart/form-data">
        <div class="card-body p-0">
            @csrf
            {{$method == 'put' ? method_field('put') : ''}}
            <input class="form-control bg-light" id="id" type="hidden" name="id" value="{{$data->id}}" readonly>
            <input class="form-control bg-light" id="history" type="hidden" name="history" value="{{$data->history}}"
                readonly>
            <div class="row">
                <div class="col-md-9 px-4 py-3">
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="col-form-label" for="title">Title <small
                                    class="text-danger">(*)</small></label>
                            <input class="form-control text-sm" id="title" type="text" name="title"
                                placeholder="Title Article" value="{{$data->title ?? old('title')}}" required>
                            @error('title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label class="col-form-label" for="caption">Short Description</label>
                            <p>
                                <small>
                                    *) Article excerpt to be displayed on thumbnail
                                </small>
                            </p>
                            <textarea class="form-control text-sm" rows="5" id="caption" type="text" name="caption"
                                placeholder="Short Desc...">{{$data->caption ?? old('caption')}}</textarea>
                            @error('caption')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-12" id="article-content">
                            <label class="col-form-label " for="post-body">Article Content <small
                                    class="text-danger">(*)</small></label>
                            <p>
                                <small>
                                    *) Use <b>Header</b> to automatically detect table of contents.
                                </small>
                            </p>
                            <textarea class="form-control mt-2" rows="10" cols="80" id="post-body" type="text"
                                name="content_medizine"
                                placeholder="">{{$data->content_medizine ?? old('content_medizine')}}</textarea>
                        </div>
                        <div class="form-group col-12" id="article-reference">
                            <label class="col-form-label" for="post-reference">Reference</label>
                            <textarea class="form-control basic-ckeditor5 mt-2" id="post-reference" type="text"
                                name="reference"
                                placeholder="Optional">{{$data->reference ?? old('reference')}}</textarea>
                            @error('reference')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-12" id="article-cites">
                            <label class="col-form-label" for="post-cites">How to Cites</label>
                            <textarea class="form-control basic-ckeditor5 mt-2" id="post-cites" type="text"
                                name="cites"
                                placeholder="Optional">{{$data->cites ?? old('cites')}}</textarea>
                            @error('cites')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-12" id="article-contributors">
                            <label class="col-form-label" for="post-contributors">Contributors</label>
                            <textarea class="form-control basic-ckeditor5 mt-2" id="post-contributors" type="text"
                                name="contributors"
                                placeholder="Optional">{{$data->contributors ?? old('contributors')}}</textarea>
                            @error('contributors')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-none border-left rounded-0 bg-light card-body mb-0 h-100">
                        <div class="row">
                            @if($method == 'put')
                            <div class="form-group col-12">
                                <label class="col-form-label" for="code">Code</label>
                                <input class="form-control text-sm" id="code" type="text" name="code"
                                    placeholder="Optional" value="{{$data->code ?? old('code')}}" readonly>
                                @error('code')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            @endif
                            <div class="form-group col-12">
                                <label class="col-form-label">Type <small class="text-danger">(*)</small></label>
                                <select name="category" id="type" class="form-control select2bs4"
                                    data-placeholder="Select Type" required>
                                    <option disabled selected></option>
                                    @foreach ($categories as $category)
                                    <option {{$category->id == $data->post_category_id ? 'selected':''}}
                                        value="{{$category->id}}">[{{$category->code}}] {{$category->name}}</option>
                                    @endforeach
                                </select>
                                @can('create article type')
                                <a href="{{route('cpanel.medizine.type.create')}}" class="text-success">
                                    <small>
                                        <i class="fas fa-plus"></i> Add New Type
                                    </small>
                                </a>
                                @endcan
                                @error('category')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label class="col-form-label">Category</label>
                                <select name="sub_category" id="sub_category" class="form-control select2bs4"
                                    data-placeholder="Select Category">
                                    <option disabled selected></option>
                                    @if($method == 'put')
                                    @foreach ($sub_categories as $sub_category)
                                    <option {{$sub_category->id == $data->post_sub_category_id ? 'selected':''}}
                                        value="{{$sub_category->id}}">
                                        {{$sub_category->name}}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                                @can('create article category')
                                <a href="{{route('cpanel.medizine.category.create')}}" class="text-success">
                                    <small>
                                        <i class="fas fa-plus"></i> Add New Category
                                    </small>
                                </a>
                                @endcan
                                @error('sub_category')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                <label class="col-form-label">Keywords</label>
                                <textarea name="keywords" class="form-control" id="keywords" cols="30" rows="6">{{ old('keywords', $data->keywords)}}</textarea>
                                @error('keywords')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            @if(auth()->user()->id == $data->created_by || (auth()->user()->hasAnyRole(['super-admin',
                            'admin']) || $method != 'put'))
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="form-group col-12">
                                <label class="col-form-label">Authors <small class="text-danger">(*)</small></label>
                                <p>
                                    <small>
                                        *) You are the main author, but you can also add other contributors here.
                                    </small>
                                </p>
                                <select name="authors[]" id="authors" class="form-control select2bs4"
                                    data-placeholder="Select Atuhors" multiple>
                                    @foreach ($authors as $author)
                                    <option
                                        {{ auth()->user()->id == $author->id || in_array($author->id,$post_authors) ? 'selected' : '' }}
                                        value="{{$author->id}}">{{$author->name}}</option>
                                    @endforeach
                                </select>
                                @error('authors')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            @endif

                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="form-group col-12">
                                <label for="thumbnail_cover_share" class="form-label">Thumbnail</label>
                                <p>
                                    <small>
                                        *) The thumbnail image that appears when the article is shared; if left blank,
                                        the default thumbnail will be used
                                    </small>
                                </p>
                                <input type="file"
                                    class="@error('thumbnail_cover_share') is-invalid @enderror form-control"
                                    id="thumbnail_cover_share" accept="image/*" name="thumbnail_cover_share"
                                    value="{{old('thumbnail_cover_share')}}">
                                <small>Resolution: <b> 1.215 x 660 px (Landscape)</b></small>

                                @error('thumbnail_cover_share')
                                <br>
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="px-2">
                                @if($method == 'put' &&
                                !empty($data->thumbnail_cover_share))
                                <img src="{{asset('uploads/article/thumbnail/normal/'.$data->thumbnail_cover_share)}}"
                                    class="img-fluid w-100 img-thumbnail">
                                @endif
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="form-group col-12">
                                <label class="col-form-label">Cover Mode</label>
                                <p>
                                    <small>
                                        *) Cover Mode functions to set what cover is used, it can be an image or video.
                                        If left blank, the default cover image will be used.
                                    </small>
                                </p>
                                <select name="show_cover_type" id="cover_mode" class="form-control text-sm">
                                    <option disabled selected>Select Mode</option>
                                    <option {{$data->show_cover_type == 'image' ? 'selected':''}} value="image">Image
                                    </option>
                                    <option {{$data->show_cover_type == 'link' ? 'selected':''}} value="link">Video Link
                                    </option>
                                </select>
                                @error('show_thumbnail_type')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-12" id="cover_image_mode">
                                <label for="cover_image" class="form-label">Upload Cover</label>
                                <input type="file" class="@error('cover_image') is-invalid @enderror form-control"
                                    id="cover_image" accept="image/*" name="cover_image" value="{{old('cover_image')}}">

                                <small>Resolution: <b> 1.215 x 660 px (Landscape)</b></small>
                                @error('cover_image')
                                <br>
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-12" id="cover_link_mode">
                                <label for="cover_link" class="form-label">Insert Link Video</label>
                                <input type="text"
                                    class="@error('cover_link') is-invalid @enderror form-control text-sm"
                                    id="cover_link" accept="image/*" name="cover_link"
                                    value="{{$data->cover_link ?? old('cover_link')}}"
                                    placeholder="https://youtube.com">
                                @error('cover_link')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            @if($method == 'put')
                            <div class="px-2" id="preview_cover">
                                @if($method == 'put' &&
                                $data->show_cover_type == 'image' &&
                                !empty($data->cover_image))
                                <img src="{{asset('uploads/article/cover/normal/'.$data->cover_image)}}"
                                    class="img-fluid w-100 img-thumbnail">
                                @else
                                <iframe src="{{$data->cover_link}}" width="100%" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                                @endif
                            </div>
                            @endif
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="form-group col-12">
                                <label for="attachment" class="form-label">Upload Attachment</label>
                                <p>
                                    <small>
                                        *) If there are files you want to attach, you can upload them here.
                                    </small>
                                </p>
                                <input type="text"
                                    class="@error('attachment_file_name') is-invalid @enderror form-control mb-1 text-sm"
                                    id="attachment_file_name" name="attachment_file_name"
                                    value="{{ json_decode($data->attachment)->title ?? old('attachment_file_name')}}"
                                    placeholder="File name Attachment">
                                <input type="file" class="@error('attachment') is-invalid @enderror form-control"
                                    id="attachment" name="attachment" value="{{old('attachment')}}">
                                @if($method == 'put' && !empty($data->attachment))
                                <br>
                                <a target="blank" class="float-right"
                                    href="{{ asset(json_decode($data->attachment)->path . json_decode($data->attachment)->file_name) }}">
                                    <i class="fas fa-eye"></i> Preview
                                </a>
                                @endif
                                @error('attachment')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value="1" {{$data->can_export_pdf == 1 ? 'checked':''}}
                                            name="can_export_pdf" id="can_export_pdf">
                                        <label class="font-weight-normal" for="can_export_pdf">
                                            Export to PDF
                                        </label>
                                    </div>
                                </div>
                                @can('highlight article')
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value="1" {{$data->is_highlight == 1 ? 'checked':''}}
                                            name="is_highlight" id="is_highlight">
                                        <label class="font-weight-normal" for="is_highlight">
                                            Highlight
                                        </label>
                                    </div>
                                </div>
                                @endcan

                                @can('publish article')
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value="1" {{$data->is_publish == 1 ? 'checked':''}}
                                            name="is_publish" id="is_publish">
                                        <label class="font-weight-normal" for="is_publish">
                                            Publish Article
                                        </label>
                                    </div>
                                </div>
                                @endcan
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>

                            <div class="col-12 d-flex align-items-center justify-content-end">
                                <a href="{{route('cpanel.medizine.list')}}" class="btn btn-secondary mr-1">Cancel</a>
                                <button type="submit" class="btn btn-success">
                                    {{$method == 'put' ? 'Update' : 'Save'}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

@if($method == 'put')
    @include('pages.cpanel.medizine.components.history-post')
@endif

@section('styles')
<style>
    #article-content .ck-editor__editable_inline:not(.ck-comment__input *) {
        height: 600px;
        overflow-y: auto;
    }

    #article-reference .ck-editor__editable_inline:not(.ck-comment__input *) {
        height: 300px;
        overflow-y: auto;
    }

    #article-cites .ck-editor__editable_inline:not(.ck-comment__input *) {
        height: 300px;
        overflow-y: auto;
    }

    #article-contributors .ck-editor__editable_inline:not(.ck-comment__input *) {
        height: 300px;
        overflow-y: auto;
    }

</style>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/super-build/ckeditor.js"></script>
<script>
    CKEDITOR.ClassicEditor.create(document.querySelector("#post-body"), {
        // height: 1000,
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

    CKEDITOR.ClassicEditor.create(document.querySelector("#post-reference"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'alignment',
                '|', 'fontSize', 'fontColor', 'fontBackgroundColor', 'highlight',
                '|', 'bold', 'italic', 'strikethrough', 'underline', 'removeFormat',
                '|', 'bulletedList', 'numberedList', 'todoList',
                '|', 'outdent', 'indent',
                '|', 'link', 'specialCharacters',
                '|', 'horizontalLine'
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
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Type your reference ...',
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
            'FullScreen',
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

    CKEDITOR.ClassicEditor.create(document.querySelector("#post-cites"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'alignment',
                '|', 'fontSize', 'fontColor', 'fontBackgroundColor', 'highlight',
                '|', 'bold', 'italic', 'strikethrough', 'underline', 'removeFormat',
                '|', 'bulletedList', 'numberedList', 'todoList',
                '|', 'outdent', 'indent',
                '|', 'link', 'specialCharacters',
                '|', 'horizontalLine'
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
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Type your cites ...',
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
            'FullScreen',
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

    CKEDITOR.ClassicEditor.create(document.querySelector("#post-contributors"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'alignment',
                '|', 'fontSize', 'fontColor', 'fontBackgroundColor', 'highlight',
                '|', 'bold', 'italic', 'strikethrough', 'underline', 'removeFormat',
                '|', 'bulletedList', 'numberedList', 'todoList',
                '|', 'outdent', 'indent',
                '|', 'link', 'specialCharacters',
                '|', 'horizontalLine'
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
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Type your contributors ...',
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
            'FullScreen',
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

    document.addEventListener("DOMContentLoaded", function () {
        const modeSelect = document.getElementById('cover_mode');
        const imageForm = document.getElementById('cover_image_mode');
        const linkForm = document.getElementById('cover_link_mode');
        const coverPreview = document.getElementById('preview_cover');

        @if($method == 'put' && $data->show_cover_type == 'link' && !empty($data->cover_link))
        modeSelect.value = 'link';
        imageForm.style.display = 'none';
        linkForm.style.display = 'block';
        @else
        modeSelect.value = 'image';
        imageForm.style.display = 'block';
        linkForm.style.display = 'none';
        @endif

        modeSelect.addEventListener('change', function () {
            const selectedOption = modeSelect.value;
            @if($method == 'put')
            coverPreview.style.display = 'none';
            @endif

            if (selectedOption === 'image') {
                imageForm.style.display = 'block';
                linkForm.style.display = 'none';
            } else if (selectedOption === 'link') {
                imageForm.style.display = 'none';
                linkForm.style.display = 'block';
            } else {
                imageForm.style.display = 'none';
                linkForm.style.display = 'none';
            }
        });
    });

    $(document).ready(function () {
        $('#type').on('change', function () {
            var categoryId = $('#type option:selected').val();
            if (categoryId) {
                $.ajax({
                    url: '{{url("cpanel/medizine/category")}}/get-subcategories?type=' +
                        categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data.data);
                        $('#sub_category').empty();
                        $('#sub_category').append('<option disabled selected></option>');
                        $.each(data.data, function (index, subcategory) {
                            $('#sub_category').append('<option value="' +
                                subcategory.id + '">' + subcategory.name +
                                '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX request failed:', error);
                    }
                });
            } else {
                $('#sub_category').empty();
                $('#sub_category').append('<option disabled selected></option>');
            }
        });
    });

</script>
@endsection
