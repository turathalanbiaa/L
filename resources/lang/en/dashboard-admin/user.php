<?php

return [
    'index' => [
        'title-1' => 'Students',
        'title-2' => 'Listeners'
    ],

    'create' => [
        'title-1'  => 'Add Student',
        'title-2'  => 'Add Listener',
        'btn-send' => 'Send'
    ],

    'store' => [
        'success' => 'The user was created successfully.',
        'failed'  => 'The user was not created, Try again.'
    ],

    'show' => [
        'tab' => [
            'profile'       => 'Profile',
            'documents'     => 'Documents',
            'account-state' => 'Account state'
        ],

        'profile-tab' => [
            'btn-edit' => 'Edit account'
        ],

        'account-state-tab' => [
            'header-info'      => 'Fill out all account information.',
            'header-auth'      => 'Authenticating the account by (email or phone).',
            'header-documents' => 'Accept all required documents.',
        ]
    ],

    'edit' => [
        'change-info'     => 'Change user information',
        'change-password' => 'Change user password',
        'btn-save'        => 'Save'
    ],

    'update' => [
        'success' => 'The user was updated successfully.',
        'failed'  => 'The user was not updated, Try again.'
    ],

    'components' => [
        'datatable' => [
            'header-1'  => 'Students enrolled in the institute',
            'header-2'  => 'Listeners enrolled in the institute',
            'btn-add-1' => 'Add student',
            'btn-add-2' => 'Add listener',
            'column'    => [
                'number'     => 'No.',
                'name'       => 'Name',
                'email'      => 'Email',
                'phone'      => 'Phone',
                'last-login' => 'Last login date'
            ]
        ],

        'modal-show' => [
            'header'        => 'Account information',
            'btn-info'      => 'Show account',
            'btn-dismiss'   => 'No, thanks',
            'error-message' => 'The user dose not exist.'
        ]
    ],

    'label' => [
        'name'        => 'Name',
        'type'        => 'Type',
        'stage'       => 'Stage',
        'email'       => 'Email',
        'phone'       => 'Phone',
        'password'    => 'Password',
        're-password' => 'Re-Password',
        'gender'      => 'Gender',
        'country'     => 'Country',
        'birth-date'  => 'Birth Date',
        'address'     => 'Address',
        'certificate' => 'Certificate',
        'created-at'  => 'Created At',
        'last-login'  => 'Last Login',
        'state'       => 'State',
    ],

    'placeholder' => [
        'name'        => 'Full Name and Surname',
        'stage'       => 'Select Stage',
        'email'       => 'Email',
        'phone'       => 'Phone',
        'gender'      => 'Select Gender',
        'country'     => 'Select Country',
        'certificate' => 'Select Certificate',
        'birth-date'  => 'Birth Date',
        'address'     => 'Full Address'
    ]
];
