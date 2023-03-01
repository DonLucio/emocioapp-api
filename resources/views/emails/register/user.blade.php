@component("mail::message")
# Bienvenido a la app de gestión de emociones: Emocioapp
@component('mail::panel')
Hola {{$nombres}} {{$apellidos}}, hemos creado tu nueva cuenta, la clave de acceso es: {{$clave}}
@endcomponent
@component('mail::subcopy')
Emocioapp. Maestria en Innovación Educativa. Glucio.
@endcomponent
@endcomponent