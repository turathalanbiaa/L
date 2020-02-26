<?php

return [
    'column' => [
        'type'  => 'النوع',
        'state' => 'الحالة',
    ],

    'placeholder' => [
        'type'       => 'اختر نوع المستمسك',
        'state'      => 'اختر حالة المستمسك',
        'image'      => 'اختر صورة المستمسك',
    ],

    'index' => [
        'title'        => 'المستمسكات',
        'message'      => 'لا يوجد مستمسكات لمراجعتها',
        'btn-loadMore' => 'تحميل المزيد'
    ],

    'create' => [
        'title'    => 'انشاء مستمسك',
        'btn-back' => 'رجوع الى ملف الطالب',
        'btn-send' => "ارسال",

        'note-after-upload-image' => 'سوف يتم تقليل جودة الصورة بعدالرفع لغرض العرض فقط.',
        'note-image-type'         => 'يجب أن تكون صورة (jpeg أو png أو bmp أو gif أو svg أو webp).',
    ],

    'store' => [
        'success' => 'تم رفع المستمسك بنجاح',
        'failed'  => 'لم يتم رفع المستمسك، اعد المحاولة',
    ],

    'share' => [
        'user-document' => [
            'btn-add'  => 'اضافة مستمسك',
            'message'  => 'حساب المستمع لايحتوي على اي مستمسك',
        ],
    ],

    'component' => [
        'documents' => [
            'btn-view' => 'انقر لعرض المستمسك',

            'modal-error-header' => 'تحذير !!!',
            'modal-error-body'   => 'لا يوجد مستمسك، برجى اعادة تحميل الصفحة.',

            'modal-accept-body' => 'هل توافق على قبول المستمسك؟',
            'modal-reject-body' => 'هل توافق على رفض المستمسك؟',
            'modal-delete-body' => 'هل توافق على حذف المستمسك؟',

            'modal-btn-yes' => 'نعم',
            'modal-btn-no'  => 'لا',

            'toast-title-accept' => 'تم قبول مستمسك ',
            'toast-title-reject' => 'تم رفض مستمسك ',
            'toast-title-delete' => 'تم حذف مستمسك ',
            'toast-title-error'  => 'لا يوجد مستمسك.',
        ]
    ],
];
