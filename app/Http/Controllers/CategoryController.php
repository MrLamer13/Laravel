<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Queries\Contracts\CategoriesQuery;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function index(CategoriesQuery $builder): View
    {
        return view('categories.index', [
            'categories' => $builder->getCategories()
        ]);
    }

    public function show(Category $category): View|Redirector
    {
        return view('categories.show', [
            'category' => $category
        ]);
    }

    public function showAll(CategoriesQuery $builder): View
    {
        return view('categories.showAll', [
            'categories' => $builder->getCategoriesWithNews()
        ]);
    }
}
