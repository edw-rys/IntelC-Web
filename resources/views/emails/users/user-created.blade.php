@component('mail::message')
# Bienvenido (a) {{ $user->institution_name }},

Se ha creado una nueva cuenta de usuario en {{ config('app.company_name') }} para usted, con la siguiente información:

**Institución:** {{ $user->institution_name }}

**Email:** {{ $user->email }}

**Contraseña:** {{ $password }}

@component('mail::button', ['url' => route('auth.login.show'), 'color' => 'green'])
    {{ trans('global.access') }}
@endcomponent

Saludos,<br>
{{ config('app.company_name') }}
@endcomponent