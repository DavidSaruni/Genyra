@php
    $siteUrl = rtrim(config('app.url'), '/');
    $articleUrl = route('news.readmore', $article->slug);
    $articleImage = $article->main_image
        ? asset('storage/' . $article->main_image)
        : asset('images/logo.jpeg');

    $articleSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'NewsArticle',
        'headline' => $article->title,
        'description' => \Illuminate\Support\Str::limit(strip_tags($article->excerpt ?? ''), 300),
        'image' => [$articleImage],
        'datePublished' => $article->published_at?->toAtomString(),
        'dateModified' => ($article->updated_at ?? $article->published_at)?->toAtomString(),
        'author' => [
            '@type' => 'Organization',
            'name' => 'genyra Group',
            'url' => $siteUrl,
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'genyra Group',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('images/logo.jpeg'),
            ],
        ],
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => $articleUrl,
        ],
        'url' => $articleUrl,
        'isAccessibleForFree' => true,
        'inLanguage' => 'en',
    ];

    if ($article->categories->isNotEmpty()) {
        $articleSchema['articleSection'] = $article->categories->first()->name;
        $articleSchema['keywords'] = $article->categories->pluck('name')->implode(', ');
    }
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => $siteUrl],
        ['name' => 'News', 'url' => route('news')],
        ['name' => $article->title, 'url' => $articleUrl],
    ],
])
