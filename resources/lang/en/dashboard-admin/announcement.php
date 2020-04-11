<?php

return [
    'index' => [
        'title' => 'Announcements'
    ],

    'create' => [
        'title'    => 'Add Announcement',
        'note'     => 'The announcement must contain one of the fields (description, image, YouTube video).',
        'btn-send' => 'Send'
    ],

    'store' => [
        'success' => 'The announcement was created successfully.',
        'failed'  => 'The announcement was not created, try again.'
    ],

    'edit' => [
        'note'         => 'The announcement must contain one of the fields (description, image, YouTube video)..',
        'change-info'  => 'Change announcement info',
        'change-image' => 'Change announcement image',
        'btn-save'     => 'Save'
    ],

    'update' => [
        'success' => 'The announcement was updated successfully.',
        'failed'  => 'The announcement was not updated, try again.'
    ],

    'destroy' => [
        'success' => 'The announcement was deleted successfully.',
        'failed'  => 'The announcement was not deleted, try again.'
    ],

    'change-state' => [
        'title-0'     => 'The announcement No. (:number) has been inactivated.',
        'title-1'     => 'The announcement No. (:number) has been activated.',
        'title-error' => 'The announcement dose not exist.'
    ],

    'components' => [
        'datatable' => [
            'header-'  => 'All announcements',
            'header-1' => 'All announcements are announced to students',
            'header-2' => 'All announcements are announced to listeners',
            'header-3' => 'All announcements are announced to students and listeners',
            'btn-add'  => 'Add announcement',
            'column'   => [
                'number'     => 'No.',
                'title'      => 'Title',
                'type'       => 'Type',
                'state'      => 'State',
                'created-at' => 'Created at'
            ]
        ],

        'modal-show' => [
            'header'        => 'Show announcement',
            'btn-edit'      => 'Edit announcement',
            'btn-dismiss'   => 'No, thanks',
            'error-message' => 'The announcement dose not exist.'
        ],

        'modal-delete' => [
            'header'        => 'Delete announcement',
            'message'       => 'Do you want to delete announcement No. (:number).',
            'btn-yes'       => 'Yes',
            'btn-no'        => 'NO',
            'error-message' => 'The announcement dose not exist.'
        ]
    ],

    'label' => [
        'title'         => 'Title',
        'description'   => 'Description',
        'image'         => 'Image',
        'youtube_video' => 'YouTube Video',
        'type'          => 'Type',
        'state'         => 'State',
        'created_at'    => 'Created At',
        'check-image'   => 'The Announcement Contains An Image.',
        'check-content' => 'The Announcement Contains (Description, YouTube Video).'
    ],

    'placeholder' => [
        'title'         => 'Title',
        'description'   => 'Description',
        'image'         => 'Choose an image',
        'youtube_video' => 'Video id',
        'type'          => 'Select the type',
        'state'         => 'Select the state',
        'check-image'   => 'If you make this selection, it will be allowed to make the announcement not contain (description, YouTube video).',
        'check-content' => 'If you make this selection, it will be allowed to make the announcement not contain an image.'
    ],
];
