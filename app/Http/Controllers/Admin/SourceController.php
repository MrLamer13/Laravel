<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Source\Create;
use App\Http\Requests\Admin\Source\Edit;
use App\Models\News;
use App\Models\Source;
use App\Queries\SourcesQueryBuilder;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SourcesQueryBuilder $builder, News $news): View
    {
        return view('admin.sources.index', [
            'sources' => $builder->getSources($news),
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $newsId = $request->input('newsId');
        $news = News::where('news.id', '=', $newsId)->get();

        return view('admin.sources.create', [
            'news' => $news[0]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        Create              $request,
        SourcesQueryBuilder $builder
    ): RedirectResponse
    {
        $source = $builder->create(array_merge($request->only('news_id'), $request->validated()));

        if ($source) {
            return redirect()
                ->route('admin.news.sources', ['news' => $source->news])
                ->with('success', __('store success'));
        }

        return back()->with('error', __('store error'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Source $source): View
    {
        return view('admin.sources.edit', [
            'source' => $source
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Edit                $request,
        Source              $source,
        SourcesQueryBuilder $builder
    ): RedirectResponse
    {
        if ($builder->update($source, $request->validated())) {
            return redirect()
                ->route('admin.news.sources', ['news' => $source->news])
                ->with('success', __('update success'));
        }

        return back()->with('error', __('update error'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Source $source): JsonResponse
    {
        try {
            $source->delete();

            return response()->json('ok');
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return response()->json('error', 400);
        }
    }
}
