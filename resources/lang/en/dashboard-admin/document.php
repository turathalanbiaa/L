<?php

return [
    'index' => [
        'title'           => 'Documents',
        'filter-header-'  => "All documents",
        'filter-header-1' => "Personal identification",
        'filter-header-2' => "Religious recommendation",
        'filter-header-3' => "Certificate",
        'filter-header-4' => "Personal image",
        'message'         => 'There are no documents to review.',
        'btn-load-more'   => 'Load more'
    ],

    'create' => [
        'title'    => 'Add Document',
        'btn-back' => 'Back To The Student\'s File',
        'btn-send' => "Send",

        'note-after-upload-image' => 'Image quality will be reduced after uploading for display purpose only.',
        'note-image-type'         => 'It should be an image (jpeg, png, bmp, gif, svg, or webp).',
    ],

    'store' => [
        'success' => 'Document successfully created.',
        'failed'  => 'The document was not created, try again.',
    ],

    'components' => [
        'documents' => [
            'btn-view' => 'Click to view document',

            'modal-error-header'  => 'Warning',
            'modal-error-body'  => 'The document dose not exist.',

            'modal-accept-body' => 'Do you agree to accept the document?',
            'modal-reject-body' => 'Do you agree to reject the document?',
            'modal-delete-body' => 'Do you agree to delete the document?',

            'modal-btn-yes' => 'Yes',
            'modal-btn-no'  => 'No',

            'toast-title-accept' => ':string document accepted.',
            'toast-title-reject' => ':string document rejected.',
            'toast-title-delete' => ':string document deleted.',
            'toast-title-error'  => 'The document dose not exist.',
        ]
    ],

    'share' => [
        'user-documents' => [
            'btn-add'  => 'Add document',
            'message'  => 'The listener account does not contain any document.',
        ],
    ],

    'column' => [
        'type'  => 'Type',
        'state' => 'State',
    ],

    'placeholder' => [
        'type'       => 'Select Document Type',
        'state'      => 'Select Document State',
        'image'      => 'Select Document Image',
    ],
];
