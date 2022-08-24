<?php

namespace App\Helpers;

use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

class PageRouteService
{
    private $routes = [];

    public function __construct()
    {
        $this->determinePagesRoutes();
    }

    public function getRoute(Page $page)
    {
        return $this->routes[$page->id];
    }

    private function determinePagesRoutes()
    {
        $pages = Page::all()->keyBy('id');

        foreach ($pages as $id => $page) {
            $urls = $this->determinePageSlugs($page, $pages);

            if (count($urls) === 1) {
                $this->routes[$id] = url( $urls[0]);
            }
            else {
                $this->routes[$id] = url( implode('/', $urls));
            }
        }
    }

    private function determinePageSlugs(Page $page, Collection $pages, array $urls = [])
    {
        array_unshift($urls, $page->url);

        if (!is_null($page->parent_id)) {
            $urls = $this->determinePageSlugs($pages[$page->parent_id], $pages, $urls);
        }

        return $urls;

    }
}
