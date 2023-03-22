<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = app(Category::class);

        return view('categories.index', [
            'categories' => $categories->getCategories()
        ]);
    }

    public function show(int $id): View|Redirector
    {
        if ($id == 0 || $id > CategorySeeder::CATEGORY_COUNT) {
            return redirect(route('categories.index'));
        }

        $category = app(Category::class);

        return view('categories.show', [
            'category' => $category->getCategoryById($id)
        ]);
    }

    public function showAll(): View
    {
        $categories = app(Category::class);
        $news = [];

        for ($i = 1; $i <= CategorySeeder::CATEGORY_COUNT; $i++) {
            $news[$i] = $categories->getCategoryById($i);
        }

        return view('categories.showAll', [
            'categories' => $categories->getCategories(),
            'newsList' => $news
        ]);
    }
}
