<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('tenant.category.index', [
            'categories' => Category::orderBy('position')->whereNull('parent_id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('tenant.category.create', [
            'categories' => Category::orderBy('position')->whereNull('parent_id')->get(),
        ]);
    }

    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        Category::create(request()->all());
        return redirect()->route('category.create', tenant());
    }
}
