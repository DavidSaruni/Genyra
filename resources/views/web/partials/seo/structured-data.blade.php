@php
    $siteUrl = rtrim(config('app.url'), '/');

    $organizationSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        '@id' => $siteUrl . '/#organization',
        'name' => 'genyra Group',
        'legalName' => 'Genyra Group Limited',
        'url' => $siteUrl,
        'logo' => asset('images/logo.jpeg'),
        'image' => asset('images/logo.jpeg'),
        'description' => 'genyra Group delivers MedTech, BioSciences, calibration, and health systems solutions across East Africa.',
        'email' => 'info@genyragroup.com',
        'telephone' => '+254735553500',
        'foundingDate' => '2017',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'P.O. Box 43844',
            'addressLocality' => 'Nairobi',
            'postalCode' => '00100',
            'addressCountry' => 'KE',
        ],
        'areaServed' => [
            ['@type' => 'Country', 'name' => 'Kenya'],
            ['@type' => 'Country', 'name' => 'Uganda'],
            ['@type' => 'Country', 'name' => 'Tanzania'],
            ['@type' => 'Country', 'name' => 'Rwanda'],
            ['@type' => 'Country', 'name' => 'South Sudan'],
            ['@type' => 'Country', 'name' => 'Ethiopia'],
        ],
    ];

    $websiteSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        '@id' => $siteUrl . '/#website',
        'name' => 'genyra Group',
        'url' => $siteUrl,
        'publisher' => ['@id' => $siteUrl . '/#organization'],
        'inLanguage' => 'en',
    ];
@endphp
<script type="application/ld+json">{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@stack('structured_data')
