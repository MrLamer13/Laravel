<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function show(Category $category): View|Redirector
    {
        return view('categories.show', [
            'category' => $category
        ]);
    }

    public function showAll(CategoriesQueryBuilder $builder): View
    {
        return view('categories.showAll', [
            'categories' => $builder->getCategories()
        ]);
    }
}
