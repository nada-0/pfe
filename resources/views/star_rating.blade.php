@php
    $rating = $rating ?? 0;
@endphp

@for ($i = 1; $i <= 5; $i++)
    @if ($i <= $rating)
        <i class="fas fa-star star filled"></i>
    @else
        <i class="far fa-star star filled"></i>
    @endif
@endfor