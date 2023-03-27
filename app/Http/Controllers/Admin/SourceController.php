<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Source;
use App\Queries\SourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
    public function store(Request $request, SourcesQueryBuilder $builder): RedirectResponse
    {
        $source = $builder->create(
            $request->only(['news_id', 'title', 'url'])
        );

        if ($source) {
            return redirect()->route('admin.news.sources', ['news' => $source->news])
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись');
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
        Request             $request,
        Source              $source,
        SourcesQueryBuilder $builder
    ): RedirectResponse
    {
        if ($builder->update($source, $request->only(['title', 'url']))) {
            return redirect()->route('admin.news.sources', ['news' => $source->news])
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
