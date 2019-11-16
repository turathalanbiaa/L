@component('mail::message')
    <div style="direction: rtl; text-align: right;">
        <strong>الاسم:</strong> {{$data["name"]}} <br><br>
        <strong>البريد:</strong> {{$data["email"]}} <br><br>
        <strong>الموضوع:</strong> {{$data["subject"]}}<br><br>
        <strong>الرسالة:</strong> {{$data["message"]}}<br><br>
    </div>
@endcomponent
