@component('mail::message')

# Nuevo mensaje para: {{ config('app.company_name') }}

# Correo: {{ $email }}

# Nombre: {{ $name }}

{{ $message }}

Saludos,<br>
{{ config('app.company_name') }}
@endcomponent