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
        'success' => 'The user account was created successfully.',
        'failed'  => 'The user account was not created, try again.'
    ],

    'show' => [
        'tab' => [
            'profile'       => 'Profile',
            'documents'     => 'Documents'
        ],

        'profile-tab' => [
            'btn-edit' => 'Edit account'
        ],
    ],

    'edit' => [
        "change-info" => "Change account information",
        "change-pass" => "Change account password",
        "btn-save"    => "Save"
    ],

    'update' => [
        'success' => 'The user account was updated successfully.',
        'failed'  => 'The user account was not updated, try again.'
    ],

    "change-state" => [
        "success-1" => "The user account was activated successfully.",
        "failed-1"  => "The user account was not activated, try again.",
        "success-3" => "The user account was disabled successfully.",
        "failed-3"  => "The user account was not disabled, try again."
    ],

    'components' => [
        'datatable' => [
            'header-1-'  => 'All students',
            'header-1-1' => 'The students have untrusted accounts',
            'header-1-2' => 'The students have trusted accounts',
            'header-1-3' => 'The students have disable accounts',
            'header-2-'  => 'All listeners',
            'header-2-1' => 'The listeners have untrusted accounts',
            'header-2-2' => 'The listeners have trusted accounts',
            'header-2-3' => 'The listeners have disable accounts',
            'btn-add'    => 'Add',
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
            'btn-info'      => 'View',
            'btn-dismiss'   => 'No, thanks',
            'error-message' => 'The user dose not exist.'
        ],

        "modal-change-state" => [
            "header"          => "Account State",
            "active-message"  => "Do you want to activate the user account No. (:number)?",
            "disable-message" => "Do you want to disable the user account No. (:number)?",
            'error-message'   => 'The user dose not exist.',
            'btn-yes'         => 'Yes',
            'btn-no'          => 'NO'
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
        'state'       => 'State'
    ],

    'placeholder' => [
        'name'        => 'Full name and surname',
        'stage'       => 'Select the stage',
        'email'       => 'Email',
        'phone'       => 'Phone',
        'gender'      => 'Select the gender',
        'country'     => 'Select the country',
        'certificate' => 'Select the certificate',
        'address'     => 'Full address'
    ]
];
