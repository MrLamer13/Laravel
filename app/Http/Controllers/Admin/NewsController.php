<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NewsQueryBuilder $builder): View
    {
        return view('admin.news.index', [
            'news' => $builder->getNews(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, NewsQueryBuilder $builder): RedirectResponse
    {
        $news = $builder->create(
            $request->only(['title', 'author', 'status', 'image', 'description', 'isVisible'])
        );

        if ($news) {
            foreach ($request->category as $key => $value) {
                $news->categories()->attach($key);
            }

            return redirect()->route('admin.news.index')
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
    public function edit(News $news): View
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request          $request,
        News             $news,
        NewsQueryBuilder $builder
    ): RedirectResponse
    {
        if ($builder->update($news, $request->only([
            'title',
            'author',
            'status',
            'image',
            'description',
            'isVisible'
        ]))) {
            $news->categories()->detach();
            foreach ($request->category as $key => $value) {
                $news->categories()->attach($key);
            }

            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): RedirectResponse
    {
        if ($news->delete()) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно удалена');
        }

        return back()->with('error', 'Не удалось удалить запись');
    }
}
