@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://alrayahhotel.com/images/settings/{{$option->logo}}" class="logo" alt="">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
