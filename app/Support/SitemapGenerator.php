<?php

namespace App\Support;

use App\Models\News;
use Carbon\CarbonInterface;
use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Support\Facades\Route;

class SitemapGenerator
{
    /**
     * @return array<int, array{loc: string, lastmod?: string, changefreq: string, priority: string}>
     */
    public function urls(): array
    {
        $urls = array_merge(
            $this->urlsFromRoutes(),
            $this->newsArticleUrls(),
        );

        usort($urls, function (array $a, array $b): int {
            if ($a['loc'] === '/') {
                return -1;
            }
            if ($b['loc'] === '/') {
                return 1;
            }

            return strcmp($a['loc'], $b['loc']);
        });

        return $urls;
    }

    /**
     * Build sitemap entries from public GET routes (no hardcoded paths).
     *
     * @return array<int, array{loc: string, changefreq: string, priority: string}>
     */
    private function urlsFromRoutes(): array
    {
        $urls = [];

        foreach (Route::getRoutes() as $route) {
            if (! $this->isSitemapRoute($route)) {
                continue;
            }

            $name = $route->getName();
            $path = $this->pathFromRoute($name);

            $meta = $this->routeMeta($name);
            $urls[] = [
                'loc' => $path,
                'changefreq' => $meta['changefreq'],
                'priority' => $meta['priority'],
            ];
        }

        return $urls;
    }

    /**
     * @return array<int, array{loc: string, lastmod: string, changefreq: string, priority: string}>
     */
    private function newsArticleUrls(): array
    {
        if (! Route::has('news.readmore')) {
            return [];
        }

        $urls = [];

        $articles = News::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->get(['slug', 'updated_at', 'published_at']);

        foreach ($articles as $article) {
            $lastmod = $article->updated_at ?? $article->published_at;

            $urls[] = [
                'loc' => $this->pathFromRoute('news.readmore', ['slug' => $article->slug]),
                'lastmod' => $this->formatLastmod($lastmod),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ];
        }

        return $urls;
    }

    private function isSitemapRoute(LaravelRoute $route): bool
    {
        if (! in_array('GET', $route->methods(), true)) {
            return false;
        }

        $name = $route->getName();
        if (! $name) {
            return false;
        }

        if ($route->parameterNames() !== []) {
            return false;
        }

        if (str_starts_with($name, 'admin.')) {
            return false;
        }

        if (in_array($name, ['login', 'contact.submit'], true)) {
            return false;
        }

        $uri = $route->uri();
        if (str_starts_with($uri, 'admin') || $uri === 'up') {
            return false;
        }

        return true;
    }

    /**
     * @param  array<string, string>  $parameters
     */
    private function pathFromRoute(string $name, array $parameters = []): string
    {
        $path = parse_url(route($name, $parameters), PHP_URL_PATH) ?? '/';

        if ($path !== '/' && str_ends_with($path, '/')) {
            $path = rtrim($path, '/');
        }

        return $path === '' ? '/' : $path;
    }

    /**
     * @return array{changefreq: string, priority: string}
     */
    private function routeMeta(string $name): array
    {
        return match ($name) {
            'home' => ['changefreq' => 'weekly', 'priority' => '1.0'],
            'news' => ['changefreq' => 'daily', 'priority' => '0.9'],
            'courses.readmore' => ['changefreq' => 'monthly', 'priority' => '0.7'],
            default => ['changefreq' => 'monthly', 'priority' => '0.8'],
        };
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
