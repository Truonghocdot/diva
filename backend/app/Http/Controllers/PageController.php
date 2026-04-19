<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $page = Page::query()
            ->where('is_homepage', true)
            ->where('is_published', true)
            ->first();

        abort_unless($page, 404);

        return view('pages.show', compact('page'));
    }

    public function show(string $slug): View
    {
        $page = Page::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('pages.show', compact('page'));
    }
}
