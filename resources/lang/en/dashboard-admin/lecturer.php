<?php

return [
    "index" => [
        "title" => "Lecturers"
    ],

    "create" => [
        "title"    => "Add Lecturer",
        "btn-send" => "Send"
    ],

    "store" => [
        "success" => "The lecturer account was created successfully.",
        "failed"  => "The lecturer account was not created, try again."
    ],

    "show" => [
        "tab" => [
            "profile" => "Profile",
            "courses" => "Courses"
        ],

        "profile-tab" => [
            "btn-edit" => "Edit Account"
        ],

        "courses-tab" => [
            "header-study-courses"   => "Study courses",
            "header-general-courses" => "General courses",
            "message"                => "There are no courses"
        ]
    ],

    "edit" => [
        "change-info" => "Change account information",
        "change-pass" => "Change account password",
        "btn-save"    => "Save"
    ],

    "update" => [
        "success" => "The lecturer account was updated successfully.",
        "failed"  => "The lecturer account was not updated, try again."
    ],

    "change-state" => [
        "success-0" => "The lecturer account was activated successfully.",
        "failed-0"  => "The lecturer account was not activated, try again.",
        "success-1" => "The lecturer account was disabled successfully.",
        "failed-1"  => "The lecturer account was not disabled, try again."
    ],

    "components" => [
        "datatable" => [
            "header-"  => "All lecturers",
            "header-0" => "The lecturers have disable accounts",
            "header-1" => "The lecturers have active accounts",
            "btn-add"  => "Add",
            "column"   => [
                "number"     => "No.",
                "name"       => "Name",
                "email"      => "Email",
                "phone"      => "Phone",
                "last-login" => "Last login"
            ]
        ],

        "modal-show" => [
            "header"        => "Account information",
            "btn-info"      => "View",
            "btn-dismiss"   => "No, thanks",
            "error-message" => "The lecturer dose not exist."
        ],

        "modal-change-state" => [
            "header"        => "Account State",
            "message-0"     => "Do you want to activate the lecturer account No. (:number)?",
            "message-1"     => "Do you want to disable the lecturer account No. (:number)?",
            "error-message" => "The lecturer dose not exist.",
            "btn-yes"       => "Yes",
            "btn-no"        => "No"
        ]
    ],

    "label" => [
        "name"        => "Name",
        "email"       => "Email",
        "phone"       => "Phone",
        "password"    => "Password",
        "re-password" => "Re-Password",
        "description" => "Description",
        "created-at"  => "Created At",
        "last-login"  => "Last Login",
        "state"       => "State"
    ],

    "placeholder" => [
        "name"        => "Name and surname",
        "email"       => "Email",
        "phone"       => "Phone",
        "description" => "Description",
        "state"       => "Select the state"
    ]
];
