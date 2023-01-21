<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\CategoryStoreRequest;
use App\Http\Requests\Tenant\CategoryUpdateRequest;
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

    public function edit($id): View
    {
        return view('tenant.category.edit', [
            'category' => Category::find($id),
            'categories' => Category::orderBy('position')->whereNull('parent_id')->get(),
        ]);
    }

    public function update(CategoryUpdateRequest $request, $id): RedirectResponse
    {
        $category = Category::find($id);
        $category->update(request()->all());

        return redirect()->route('category.index', tenant());
    }

    public function destroy($id): RedirectResponse
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category.index', tenant());
    }
}
