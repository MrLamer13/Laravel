<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\Create;
use App\Http\Requests\Admin\News\Edit;
use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use App\Services\Contracts\UploadInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $statuses = StatusEnum::getValues();

        return view('admin.news.create', [
            'categories' => $categories,
            'statuses' => $statuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        Create           $request,
        NewsQueryBuilder $builder,
        UploadInterface  $upload
    ): RedirectResponse
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = Storage::disk('public')
                ->url($upload->save($request->file('image')));
        } else {
            $validated['image'] = $request->image_link;
        }

        $news = $builder->create($validated);

        if ($news) {
            $news->categories()->attach($request->getCategoryIds());

            return redirect()
                ->route('admin.news.index')
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
    public function edit(News $news): View
    {
        $categories = Category::all();
        $statuses = StatusEnum::getValues();

        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'statuses' => $statuses
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Edit             $request,
        News             $news,
        NewsQueryBuilder $builder,
        UploadInterface  $upload
    ): RedirectResponse
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = Storage::disk('public')
                ->url($upload->save($request->file('image')));
        } else {
            $validated['image'] = $request->image_link;
        }

        if ($builder->update($news, $validated)) {
            $news->categories()->sync($request->getCategoryIds());

            return redirect()
                ->route('admin.news.index')
                ->with('success', __('update success'));
        }

        return back()->with('error', __('update error'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): JsonResponse
    {
        try {
            $news->delete();

            return response()->json('ok');
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return response()->json('error', 400);
        }
    }
}
