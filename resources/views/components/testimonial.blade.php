<div class="testimonial-single-content-item swiper-slide">
    <p>{{ $text }}</p>
    <ul class="review-star">
        @for ($i = 0; $i < $fillStarsNumber; $i++)
            <li class="fill"><i class="icofont-star"></i></li>
        @endfor
        @for ($i = 0; $i < $blankStarsNumber; $i++)
            <li class="blank"><i class="icofont-star"></i></li>
        @endfor
    </ul>
</div>
