<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Tumedibot')
<img src={{asset('medibot_f.png')}} class="logo" alt="Tumedibot">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
