@props(['url'])
<tr>
<td class="header">
    <a href="{{ $url }}" style="display: inline-block;">
        @if (trim($slot) === config('app.name'))
            <img src="https://onesip.sa/images/settings/{{$option->logo}}" class="logo" alt="">
        @else
            {{ $slot }}
        @endif
    </a>
</td>
</tr>
