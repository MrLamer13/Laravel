<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Models\Resource;
use App\Services\Contracts\ParserInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ParserInterface $parser): RedirectResponse
    {
        $links = Resource::all();

        foreach ($links as $link) {
            dispatch(new JobNewsParsing($link->resource));
        }

        return back()->with('success', __('parsing success'));
    }
}
