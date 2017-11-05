@component('mail::message')
    {{-- Greeting --}}
    {{--@if (! empty($greeting))--}}
        {{--# {{ $greeting }}--}}
    {{--@else--}}
        {{--@if ($level == 'error')--}}
            {{--# Whoops!--}}
        {{--@else--}}
            # Olá!
        {{--@endif--}}
    {{--@endif--}}

    {{-- Intro Lines --}}
    {{--@foreach ($introLines as $line)--}}
        {{--{{ $line }}--}}

    {{--@endforeach--}}

    {{-- Action Button --}}
    {{--@isset($actionText)--}}
        {{--<?php--}}
        {{--switch ($level) {--}}
            {{--case 'success':--}}
                {{--$color = 'green';--}}
                {{--break;--}}
            {{--case 'error':--}}
                {{--$color = 'red';--}}
                {{--break;--}}
            {{--default:--}}
                {{--$color = 'blue';--}}
        {{--}--}}
        {{--?>--}}
        {{--@component('mail::button', ['url' => $actionUrl, 'color' => $color])--}}
            {{--{{ $actionText }}--}}
        {{--@endcomponent--}}
    {{--@endisset--}}

    {{-- Outro Lines --}}
    {{--@foreach ($outroLines as $line)--}}
        {{--{{ $line }}--}}

    {{--@endforeach--}}

    {{-- Salutation --}}
    {{--@if (! empty($salutation))--}}
        {{--{{ $salutation }}--}}
    {{--@else--}}
        {{--Regards,<br>{{ config('app.name') }}--}}
    {{--@endif--}}

    {{-- Subcopy --}}
    {{--@isset($actionText)--}}
        {{--@component('mail::subcopy')--}}
            {{--Se você esta tendo problemas ao clicar no "{{ $actionText }}" botão,--}}
            {{--copie e cole a URL em seu navegador: [{{ $actionUrl }}]({{ $actionUrl }})--}}
        {{--@endcomponent--}}
    {{--@endisset--}}
@endcomponent