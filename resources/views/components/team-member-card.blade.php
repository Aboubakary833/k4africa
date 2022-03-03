<div class="team-single-item swiper-slide">
    <div class="top">
        <div class="image img-responsive">
            <img src="{{ asset('storage/' . $image) }}" alt="{{ $name }}">
        </div>
        <div class="content">
            <h4 class="name">{{ $name }}</h4>
            <span class="profession">{{ $role }}</span>
        </div>
    </div>
    <div class="bottom">
        <div class="content">
            <span class="profession">{{ $role }}</span>
        </div>
    </div>
</div>