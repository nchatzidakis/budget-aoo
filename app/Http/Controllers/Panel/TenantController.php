<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\TenantStoreRequest;
use App\Http\Requests\Panel\TenantUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TenantController extends Controller
{
    public function index(): View
    {
        return view('tenant.tenant.index', [
            'tenants' => auth()->user()->tenants,
        ]);
    }

    public function create(): View
    {
        return view('tenant.tenant.create');
    }

    public function store(TenantStoreRequest $request): RedirectResponse
    {
        $tenant = auth()->user()->tenants()->create([
            'name' => request('name'),
        ]);

        return redirect()->route('tenant.show', $tenant);
    }

    public function show()
    {
        return view('tenant.tenant.show');
    }

    public function edit($id): View
    {
        return view('tenant.tenant.edit', [
            'tenant' => auth()->user()->tenants()->findOrFail($id),
        ]);
    }

    public function update(TenantUpdateRequest $request, $id): RedirectResponse
    {
        $tenant = auth()->user()->tenants()->findOrFail($id);
        $tenant->update([
            'name' => request('name'),
        ]);

        return redirect()->route('tenant.show', $tenant);
    }

    public function destroy($id): RedirectResponse
    {
        //
    }
}
