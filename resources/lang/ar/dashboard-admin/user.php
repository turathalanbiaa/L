<?php

return [
    'index' => [
        'title-1' => 'الطلاب',
        'title-2' => 'المستمعين'
    ],

    'create' => [
        'title-1'  => 'اضافة طالب',
        'title-2'  => 'اضافة مستمع',
        'btn-send' => 'ارسال'
    ],

    'store' => [
        'success' => 'تم انشاء المستخدم بنجاح.',
        'failed'  => 'لم يتم انشاء المستخدم، اعد المحاولة.'
    ],

    'show' => [
        'tab' => [
            'profile'       => 'الملف الشخصي',
            'documents'     => 'المستمسكات',
            'account-state' => 'حالة الحساب'
        ],

        'profile-tab' => [
            'btn-edit' => 'تحرير الحساب'
        ],

        'account-state-tab' => [
            'archived-message' => 'الحساب مؤرشف',
            'header-info'      => 'ملئ جميع معلومات الحساب.',
            'header-auth'      => 'توثيق الحساب عن طريق (البريد او الهاتف).',
            'header-documents' => 'قبول جميع المستمسكات المطلوبة.'
        ]
    ],

    'edit' => [
        'change-info'     => 'تغيير معلومات المستخدم',
        'change-password' => 'تغيير كلمة مرور المستخدم',
        'btn-save'        => 'حفظ'
    ],

    'update' => [
        'success' => 'تم تحديث المستخدم بنجاح.',
        'failed'  => 'لم يتم تحديث المستخدم، اعد المحاولة.'
    ],

    'destroy' => [
        'success' => 'تمت ارشفة المستخدم بنجاح.',
        'failed'  => 'لم تتم ارشفة المستخدم، اعد المحاولة.'
    ],

    'components' => [
        'datatable' => [
            'header-1'  => 'الطلاب المسجلين في المعهد',
            'header-2'  => 'المستمعين المسجلين في المعهد',
            'btn-add-1' => 'اضافة طالب',
            'btn-add-2' => 'اضافة مستمع',
            'column'    => [
                'number'     => 'رقم',
                'name'       => 'الاسم',
                'email'      => 'البريد الإلكتروني',
                'phone'      => 'الهاتف',
                'last-login' => 'آخر تسجيل دخول'
            ]
        ],

        'modal-show' => [
            'header'        => 'معلومات المستخدم',
            'btn-info'      => 'عرض المستخدم',
            'btn-dismiss'   => "لا شكرا",
            'error-message' => 'المستخدم غير موجود'
        ],

        'modal-delete' => [
            'header'           => 'ارشفة المستخدم',
            'archive-message'  => 'هل تريد ارشفة المستخدم رقم (:number)؟',
            'archived-message' => 'المستخدم مؤرشف سابقاً',
            'error-message'    => 'المستخدم غير موجود',
            'btn-yes'          => 'نعم',
            'btn-no'           => 'لا'
        ]
    ],

    'label' => [
        'name'        => 'الاسم',
        'type'        => 'النوع',
        'stage'       => 'المرحلة',
        'email'       => 'البريد الإلكتروني',
        'phone'       => 'الهاتف',
        'password'    => 'كلمة المرور',
        're-password' => 'اعد كلمة المرور',
        'gender'      => 'الجنس',
        'country'     => 'البلد',
        'birth-date'  => 'تاريخ الميلاد',
        'address'     => 'العنوان',
        'certificate' => 'الشهادة',
        'created-at'  => 'تاريخ الانشاء',
        'last-login'  => 'أخر تسجيل دخول',
        'state'       => 'الحالة'
    ],

    'placeholder' => [
        'name'        => 'الاسم الرباعي واللقب',
        'stage'       => 'اختر المرحلة',
        'email'       => 'البريد الإلكتروني',
        'phone'       => 'رقم الهاتف',
        'gender'      => 'اختر الجنس',
        'country'     => 'اختر البلد',
        'certificate' => 'اختر الشهادة',
        'birth-date'  => 'تاريخ الميلاد',
        'address'     => 'العنوان الكامل'
    ]
];
