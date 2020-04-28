<?php

return [
    "index" => [
        "title" => "الاساتذة"
    ],

    "create" => [
        "title"    => "اضافة استاذ",
        "btn-send" => "ارسال"
    ],

    "store" => [
        "success" => "تم انشاء حساب الاستاذ بنجاح.",
        "failed"  => "لم يتم انشاء حساب الاستاذ، اعد المحاولة."
    ],

    "show" => [
        "tab" => [
            "profile" => "الملف الشخصي",
            "courses" => "الدورات"
        ],

        "profile-tab" => [
            "btn-edit" => "تحرير الحساب"
        ],

        "courses-tab" => [
            "header-study-courses"   => "الدورات الدراسية",
            "header-general-courses" => "الدورات العامه",
            "message"                => "لا توجد دورات"
        ]
    ],

    "edit" => [
        "change-info" => "تغيير معلومات الحساب",
        "change-pass" => "تغيير كلمة مرور الخاصة بالحساب",
        "btn-save"    => "حفظ"
    ],

    "update" => [
        "success" => "تم تحديث حساب الاستاذ بنجاح.",
        "failed"  => "لم يتم تحديث حساب الاستاذ، اعد المحاولة."
    ],

    "change-state" => [
        "success-0" => "تم تفعيل حساب الاستاذ بنجاح.",
        "failed-0"  => "لم يتم تفعيل حساب الاستاذ، اعد المحاولة.",
        "success-1" => "تم تعطيل حساب الاستاذ بنجاح.",
        "failed-1"  => "لم يتم تعطيل حساب الاستاذ، اعد المحاولة."
    ],

    "components" => [
        "datatable" => [
            "header-"  => "جميع الاساتذة",
            "header-0" => "الاساتذة المعطلة حساباتهم",
            "header-1" => "الاساتذة المفعلة حساباتهم",
            "column"   => [
                "number"     => "رقم",
                "name"       => "الاسم",
                "email"      => "البريد الإلكتروني",
                "phone"      => "الهاتف",
                "last-login" => "آخر تسجيل دخول"
            ]
        ],

        "modal-show" => [
            "header"        => "معلومات الحساب",
            "btn-info"      => "عرض",
            "btn-dismiss"   => "لا شكرا",
            "error-message" => "الاستاذ غير موجود"
        ],

        "modal-change-state" => [
            "header"        => "حالة الحساب",
            "message-0"     => "هل تريد تفعيل حساب الاستاذ رقم (:number)؟",
            "message-1"     => "هل تريد تعطيل حساب الاستاذ رقم (:number)؟",
            "error-message" => "الاستاذ غير موجود",
            "btn-yes"       => "نعم",
            "btn-no"        => "لا"
        ]
    ],

    "label" => [
        "name"        => "الاسم",
        "email"       => "البريد الإلكتروني",
        "phone"       => "الهاتف",
        "password"    => "كلمة المرور",
        "re-password" => "اعد كلمة المرور",
        "description" => "الوصف",
        "created-at"  => "تاريخ الانشاء",
        "last-login"  => "أخر تسجيل دخول",
        "state"       => "الحالة"
    ],

    "placeholder" => [
        "name"        => "الاسم واللقب",
        "email"       => "البريد الإلكتروني",
        "phone"       => "رقم الهاتف",
        "description" => "الوصف",
        "state"       => "اختر الحالة"
    ]
];
