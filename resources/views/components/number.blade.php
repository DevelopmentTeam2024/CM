@php
    $str = (string) $number;
    $s = strlen($str);
@endphp

<span class="badge rounded-pill p-2 m-2 bg-{{ $class ?? 'secondary' }} p-1">
    @for ($i = 0; $i < $s; $i++)
        <i class="fa fa-{{ $str[$i] }}"></i>
    @endfor
</span>
