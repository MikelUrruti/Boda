<x-mail::message>
# {{ __("emailinvitacion.kaixo") }}

{{ __("emailinvitacion.mensaje") }}:

<ul class="fs-5">
    <li>{{ __("emailinvitacion.correo") }}: {{ $correo }}</li>
    <li>{{ __("emailinvitacion.password") }}: {{ $password }}</li>
</ul>
<x-mail::button :url="$url" :color="'success'">
    {{ __("emailinvitacion.iniciarsesion") }}
</x-mail::button>

{{ __("emailinvitacion.pd") }}:

{{ __("emailinvitacion.saludo") }}<br>
{{ __("emailinvitacion.emisores") }}
</x-mail::message>
