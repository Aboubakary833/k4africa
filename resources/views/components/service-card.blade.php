<div class="service-single-item service-single-item-style-1 swiper-slide">
    <div class="icon">
        <img src="{{ $original }}" alt="">
        <img src="{{ $hovered }}" alt="">
    </div>
    <div class="content">
        <h5 class="title"><a href="{{ route('services', $link) }}">{{ $title }}</a>
        </h5>
        <p>{{ $text }}</p>
        <a class="text-btn" href="{{ $link }}">Voir les details
            <span class="arrow-icon">
                <img src="assets/images/icons/right-arrow-blue.png" alt="">
                <img src="assets/images/icons/right-arrow-white.png" alt="">
            </span></a>
    </div>
</div>