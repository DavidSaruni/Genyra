@php
    $subtitle = $director['credentials'] !== '' ? $director['credentials'] : $director['role'];
@endphp
<article class="director-flip">
    <div class="director-flip__inner">
        <div class="director-flip__face director-flip__front">
            @if($director['photo'])
                <img src="{{ asset($director['photo']) }}" alt="{{ $director['name'] }}">
            @else
                <div class="director-flip__placeholder" aria-hidden="true"></div>
            @endif
            <div class="director-flip__caption">
                <h3>{{ $director['name'] }}</h3>
                <p>{{ $director['role'] }}</p>
            </div>
        </div>
        <div class="director-flip__face director-flip__back">
            @if($director['photo'])
                <img src="{{ asset($director['photo']) }}" alt="" aria-hidden="true">
            @else
                <div class="director-flip__placeholder" aria-hidden="true"></div>
            @endif
            <div class="director-flip__shade">
                <h3>{{ $director['name'] }}</h3>
                <p class="director-flip__role">{{ $subtitle }}</p>
                <p class="director-flip__bio">{{ $director['bio'] }}</p>
                <button type="button"
                        class="view-director-profile director-flip__more"
                        data-director-group="{{ $group }}"
                        data-director-index="{{ $index }}">
                    More <span aria-hidden="true">&gt;</span>
                </button>
            </div>
        </div>
    </div>
</article>
