<?php

return [
    'index' => [
        'title'           => 'المستمسكات',
        'filter-header-'  => "جميع المستمسكات",
        'filter-header-1' => "الهوية الشخصية",
        'filter-header-2' => "التزكية الدينية",
        'filter-header-3' => "الشهادة العلمية",
        'filter-header-4' => "الصورة الشخصية",
        'message'         => 'لا توجد مستمسكات لمراجعتها.',
        'btn-load-more'   => 'تحميل المزيد'
    ],

    'create' => [
        'title'    => 'اضافة مستمسك',
        'btn-back' => 'رجوع الى ملف الطالب',
        'btn-send' => "ارسال",

        'note-after-upload-image' => 'سوف يتم تقليل جودة الصورة بعدالرفع لغرض العرض فقط.',
        'note-image-type'         => 'يجب أن تكون صورة (jpeg أو png أو bmp أو gif أو svg أو webp).',
    ],

    'store' => [
        'success' => 'تم انشاء المستمسك بنجاح.',
        'failed'  => 'لم يتم انشاء المستمسك، اعد المحاولة.',
    ],

    'components' => [
        'documents' => [
            'btn-view' => 'انقر لعرض المستمسك',

            'modal-error-header'  => 'تحذير',
            'modal-error-body'  => 'المستمسك غير موجود',

            'modal-accept-body' => 'هل توافق على قبول المستمسك؟',
            'modal-reject-body' => 'هل توافق على رفض المستمسك؟',
            'modal-delete-body' => 'هل توافق على حذف المستمسك؟',

            'modal-btn-yes' => 'نعم',
            'modal-btn-no'  => 'لا',

            'toast-title-accept' => 'تم قبول مستمسك :string.',
            'toast-title-reject' => 'تم رفض مستمسك :string.',
            'toast-title-delete' => 'تم حذف مستمسك :string.',
            'toast-title-error'  => 'المستمسك غير موجود.',
        ]
    ],

    'share' => [
        'user-documents' => [
            'btn-add'  => 'اضافة مستمسك',
            'message'  => 'حساب المستمع لايحتوي على اي مستمسك.',
        ],
    ],

    'column' => [
        'type'  => 'النوع',
        'state' => 'الحالة',
    ],

    'placeholder' => [
        'type'       => 'اختر نوع المستمسك',
        'state'      => 'اختر حالة المستمسك',
        'image'      => 'اختر صورة المستمسك',
    ],
];
