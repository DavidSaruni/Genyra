<section class="px-4 sm:px-6 lg:px-8 py-10 bg-white" aria-labelledby="partner-logos-title">
    <div class="max-w-7xl mx-auto">
        <div class="max-w-3xl mb-6 md:mb-8">
            <h2 id="partner-logos-title" class="text-3xl md:text-4xl font-bold text-[#22235a] mb-4">Our Partners</h2>
            <p class="text-md md:text-xl text-gray-600 leading-relaxed">Organisations we work with to deliver healthcare solutions across East Africa.</p>
        </div>
    </div>
    <div class="partner-logos">
        @foreach ($partnerLogos as $logo)
            @php
                $logoName = preg_replace('/\.(jpe?g|png|svg|webp)$/i', '', pathinfo($logo, PATHINFO_FILENAME));
                $logoName = trim(preg_replace('/\s*logo\s*$/i', '', $logoName));
            @endphp
            <div class="partner-logos__item">
                <img src="{{ asset($logo) }}" alt="{{ $logoName }}">
            </div>
        @endforeach
    </div>
</section>
