@component('mail::message')
#Wiadomość z {{ config('app.name') }}

Od [{{ $data['email'] }}](mailto:{{ $data['email'] }})</br>
Telefon: {{ $data['phone'] }}
Wiadomość: {{ $data['message'] }}
@endcomponent