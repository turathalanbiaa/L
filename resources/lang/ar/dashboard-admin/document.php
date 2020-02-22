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
        'image-type' => 'يجب أن تكون صورة (jpeg أو png أو bmp أو gif أو svg أو webp)',
    ],

    //
    'index' => [
        'title' => 'المستمسكات'
    ],

    'create' => [
        'title' => 'انشاء مستمسك',
        'btn-send' => "ارسال"
    ],

    'store' => [
        'success' => 'تم رفع المستمسك بنجاح',
        'failed'  => 'لم يتم رفع المستمسك، اعد المحاولة',
    ],

    'share' => [
        'documents-tab-content' => [
            'btn-add'  => 'اضافة مستمسك',
            'message'  => 'حساب المستمع لايحتوي على اي مستمسك',
            'btn-view' => 'انقر لعرض المستمسك',

            'modal-error-header' => 'تحذير !!!',
            'modal-error-body'   => 'لا يوجد مستمسك، برجى اعادة تحميل الصفحة.',

            'modal-accept-body' => 'هل توافق على قبول المستمسك؟',
            'modal-reject-body' => 'هل توافق على رفض المستمسك؟',
            'modal-delete-body' => 'هل توافق على حذف المستمسك؟',
            'modal-btn-yes' => 'نعم',
            'modal-btn-no'  => 'لا',
        ],
    ]
];
