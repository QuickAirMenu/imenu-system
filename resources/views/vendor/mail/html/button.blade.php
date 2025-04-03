@props([
    'url',
    'color' => $primaryColor ?? '#007bff', // استخدام اللون من قاعدة البيانات
    'align' => 'center',
])

<table class="action" align="{{ $align }}" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="{{ $align }}">
<table width="50%" border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="{{ $align }}">
<table border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td>
<a href="{{ $url }}" class="button button-custom" target="_blank" rel="noopener"
   style="background-color: {{ $color }}; color: {{ $color }} !important; padding: 10px 20px; 
   border-radius: 5px; text-decoration: none; display: inline-block;">
    {{ $slot }}
</a>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
