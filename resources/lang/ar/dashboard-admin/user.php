<?php

return [
    'column' => [
        'id'             => 'رقم',
        'name'           => 'الاسم',
        'type'           => 'النوع',
        'lang'           => 'اللغة',
        'stage'          => 'المرحلة',
        'email'          => 'البريد',
        'phone'          => 'الهاتف',
        'password'       => 'كلمة المرور',
        'gender'         => 'الجنس',
        'country'        => 'البلد',
        'birth_date'     => 'تاريخ الميلاد',
        'address'        => 'العنوان',
        'certificate'    => 'الشهادة',
        'created_at'     => 'تاريخ الانشاء',
        'last_login'     => 'أخر تسجيل دخول',
        'state'          => 'الحالة',
        'remember_token' => 'الرمز',

        're_password'     => 'اعد كلمة المرور',
        'last_login_null' => 'لم يسجل'
    ],

    'placeholder' => [
        'name'        => 'الاسم الرباعي واللقب',
        'stage'       => 'اختر المرحلة',
        'email'       => 'البريد الإلكتروني',
        'phone'       => 'رقم الهاتف',
        'gender'      => 'اختر الجنس',
        'country'     => 'اختر البلد',
        'certificate' => 'اختر الشهادة'
    ],

    'components' => [
        'datatable' => [
            'title-1'   => 'الطلاب المسجلين في المعهد',
            'title-2'   => 'المستمعين المسجلين في المعهد',
            'btn-add-1' => 'اضافة طالب',
            'btn-add-2' => 'اضافة مستمع'
        ],

        'modal-info' => [
            'header-1'      => 'معلومات حساب الطالب',
            'header-2'      => 'معلومات حساب المستمع',
            'btn-info'      => 'عرض الملف',
            'btn-dismiss'   => "لا شكرا",
            'error-message' => 'المستخدم غير موجود'
        ]
    ],

    'index' => [
        'title-1'   => 'الطلاب',
        'title-2'   => 'المستمعين'
    ],

    'create' => [
        'title-1'  => 'اضافة طالب',
        'title-2'  => 'اضافة مستمع',
        'btn-send' => 'ارسال'
    ],

    'store' => [
        'success' => 'تم انشاء الحساب بنجاح.',
        'failed'  => 'لم يتم انشاء الحساب، اعد المحاولة.'
    ],

    'show' => [
        'tab' => [
            'profile'   => 'الملف الشخصي',
            'documents' => 'المستمسكات'
        ],

        'profile-tab' => [
            'btn-edit' => 'تحرير الحساب'
        ]
    ],

    'edit' => [
        'title'           => 'حساب: ',
        'change-info'     => 'تغيير معلومات الحساب',
        'change-password' => 'تغيير كلمة المرور',
        'btn-save'        => 'حفظ'
    ],

    'update' => [
        'success' => 'تم تحديث الحساب بنجاح.',
        'failed'  => 'لم يتم تحديث الحساب.'
    ]
];
