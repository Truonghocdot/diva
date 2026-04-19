<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

class PagePreviewController extends Controller
{
    public function show(Page $page): View
    {
        abort_unless(request()->hasValidSignature(), 403);

        return view('pages.show', [
            'page' => $page,
            'isPreview' => true,
        ]);
    }
}
