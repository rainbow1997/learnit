@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('layout.Regards'),<br>
@lang('layout.app_name')
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang('layout.email_click_trouble',
    [
        'actionText' => $actionText,
    ]
) <br/><span class="break-all ">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent

<?php
/*
@component('mail::message')
@lang('layout.app_name')
<br/>
@if (! empty($greeting))
#@lang('welcome_notification.greeting')
@else
@if ($level === 'error')
# @lang('layout.Whoops')
@else
# @lang('layout.hello')
@endif

{{-- Intro Lines --}}
@lang('welcome_notification.email_subject')
{{$email_subject}}
{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{--@lang('welcome_notification.control_panel')--}
{{$btnTextName}}
@endcomponent
@endisset

{{-- Outro Lines --}}
{{--@lang('welcome_notification.message')--}}
{{$email_message}}

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('layout.Regards'),<br>
@lang('layout.app_name')
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang('layout.email_click_trouble',
    [
        'btn' => $actionText
    ]
)
<br/> 
<span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
*/
