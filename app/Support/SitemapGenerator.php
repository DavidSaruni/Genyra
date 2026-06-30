<?php

namespace App\Support;

use App\Models\News;
use Carbon\CarbonInterface;

class SitemapGenerator
{
    /**
     * @return array<int, array{loc: string, lastmod?: string, changefreq: string, priority: string}>
     */
    public function urls(): array
    {
        $urls = [
            ['loc' => '/', 'changefreq' => 'weekly', 'priority' => '1.0'],
            ['loc' => '/our-story', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => '/vission-mission', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => '/values', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => '/strategic-direction', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => '/directors', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => '/management', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => '/projects', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => '/news', 'changefreq' => 'daily', 'priority' => '0.9'],
            ['loc' => '/courses', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => '/courses/readmore', 'changefreq' => 'monthly', 'priority' => '0.7'],
        ];

        $articles = News::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->get(['slug', 'updated_at', 'published_at']);

        foreach ($articles as $article) {
            $lastmod = $article->updated_at ?? $article->published_at;

            $urls[] = [
                'loc' => '/news/' . $article->slug,
                'lastmod' => $this->formatLastmod($lastmod),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ];
        }

        return $urls;
    }

    public function toXml(): string
    {
        $baseUrl = rtrim(config('app.url'), '/');

        $lines = [
            '<?xml version="1.0" encoding="UTF-8"?>',
            '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">',
        ];

        foreach ($this->urls() as $url) {
            $lines[] = '  <url>';
            $lines[] = '    <loc>' . htmlspecialchars($baseUrl . $url['loc'], ENT_XML1) . '</loc>';

            if (! empty($url['lastmod'])) {
                $lines[] = '    <lastmod>' . $url['lastmod'] . '</lastmod>';
            }

            $lines[] = '    <changefreq>' . $url['changefreq'] . '</changefreq>';
            $lines[] = '    <priority>' . $url['priority'] . '</priority>';
            $lines[] = '  </url>';
        }

        $lines[] = '</urlset>';

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    public function writeToPublic(): string
    {
        $path = public_path('sitemap.xml');
        file_put_contents($path, $this->toXml());

        return $path;
    }

    private function formatLastmod(?CarbonInterface $date): ?string
    {
        return $date?->toAtomString();
    }
}
