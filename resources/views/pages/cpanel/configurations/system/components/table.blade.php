<div class="card shadow-sm">
    <div class="card-header bg-custom-1">
        <h6 class="m-0">
            <i class="fas fa-cog"></i> 
            @if(!empty(request()->group) && request()->group == 'GENERAL_PROFILE')
            General
            @elseif(!empty(request()->group) && request()->group == 'MEDIZINE')
            Medizine
            @elseif(!empty(request()->group) && request()->group == 'WA_BLAST')
            WhatsApp Blast
            @elseif(!empty(request()->group) && request()->group == 'MAIL_SENDER')
            SMTP Mail Sender
            @elseif(!empty(request()->group) && request()->group == 'PAYMENT_GATEWAY')
            Payment Gateway
            @else
            Other
            @endif

            Setting
        </h6>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-hover">
            @foreach ($configs as $config)
            <tr>
                <td class="w-50">
                    <b>{{$config->name}}</b>
                    <br>
                    <small>
                        {{$config->description}}
                    </small>
                </td>
                <td class="w-50 text-center bg-light">
                    <?php if($config->value != ''): ?>
                        <?php if($config->form_type == 'file'): ?>
                            <img src="{{ asset('assets/settings/normal/'.$config->value); }}" style="height:80px;" class="img-fluid rounded">
                        <?php else: ?>
                            {{ Str::limit(strip_tags($config->value), 120, '...') }}
                        <?php endif; ?>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-outline-info shadow-sm border" data-bs-toggle="modal"
                        data-bs-target="#modal{{$config->id}}">
                        <small class="font-weight-bold"> <i class="fas fa-pen"></i> Edit </small>
                    </button>
                    <div class="modal fade" id="modal{{$config->id}}" tabindex="-1" aria-labelledby="modal{{$config->id}}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header py-2 bg-custom-1 d-flex align-items-center">
                                    <h6 class="mb-0" id="modal{{$config->id}}">Edit Value</h6>
                                    <button type="button" data-bs-dismiss="modal" class="btn" aria-label="Close"><i
                                            class="fas fa-times"></i></button>
                                </div>
                                <form action="<?= route('cpanel.settings.system.update') ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-body text-start">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="id" value="<?= $config->id; ?>">
                                        <input type="hidden" name="code" value="<?= $config->code; ?>">
                                        <input type="hidden" name="form_type" value="<?= $config->form_type; ?>">

                                        <div class="form-group">
                                            <label class="form-label">
                                                <?= $config->name ?>
                                                <br>
                                                <small><?= $config->description ?></label>
                                            </label>

                                            <?php if($config->value != '' && $config->form_type == 'file'): ?>
                                                <div class="card mt-1 bg-light">
                                                    <div class="card-body text-center">
                                                        <img src="<?= asset('assets/settings/normal/'.$config->value); ?>" class="w-25 rounded img-fluid">
                                                    </div>
                                                </div>
                                            <?php elseif((empty($config->value) || $config->value != '#') && $config->form_type == 'file-non-image'): ?>
                                                <br>
                                                <a target="_blank" href="<?= asset('assets/settings/attachment/'.$config->value); ?>" class="btn btn-sm btn-dark">
                                                    <i class="fas fa-eye"></i> Preview
                                                </a>
                                                <br>
                                                <br>
                                            <?php endif; ?>

                                            <?php if($config->form_type == 'file'): ?>
                                                <input type="file" class="form-control" name="value" accept="image/*">
                                            <?php elseif($config->form_type == 'file-non-image'): ?>
                                                <input type="file" class="form-control" name="value" accept="application/pdf">
                                            <?php elseif($config->form_type == 'textarea'): ?>
                                                <textarea class="form-control summernote" name="value" id="" cols="30" rows="10"><?= $config->value ?></textarea>
                                            <?php else: ?>
                                                <input type="text" class="form-control" name="value" value="<?= $config->value ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/super-build/ckeditor.js"></script>
    <script>
        CKEDITOR.ClassicEditor.create(document.querySelector(".ckeditor5"), {
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
    </script>
@endsection


