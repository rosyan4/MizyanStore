@for($i = 1; $i <= 5; $i++)
    @if($i <= $rating)
        <i class="fas fa-star text-warning"></i>
    @else
        <i class="far fa-star text-warning"></i>
    @endif
@endfor