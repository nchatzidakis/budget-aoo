<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\TenantStoreRequest;
use Illuminate\Http\Request;
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

    public function store(TenantStoreRequest $request)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
