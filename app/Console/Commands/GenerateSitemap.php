<?php

namespace App\Console\Commands;

use App\Support\SitemapGenerator;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate public/sitemap.xml for search engines';

    public function handle(SitemapGenerator $generator): int
    {
        $path = $generator->writeToPublic();
        $urlCount = count($generator->urls());

        $this->info("Sitemap written to {$path}");
        $this->info("Base URL: " . rtrim(config('app.url'), '/'));
        $this->info("URLs included: {$urlCount}");

        return self::SUCCESS;
    }
}
