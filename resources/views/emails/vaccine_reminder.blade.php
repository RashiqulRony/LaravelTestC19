<x-mail::message>
# Introduction
<p>Hello {{ $data['user_name'] }},</p>
<p>This is a reminder that you are scheduled at {{ $data['center_name'] }}.</p>
<p>Vaccination Date: {{ date('d M, Y', strtotime($data['scheduled_date'])) }}</p>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
