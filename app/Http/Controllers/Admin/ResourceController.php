<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Resource\Create;
use App\Http\Requests\Admin\Resource\Edit;
use App\Models\Resource;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $resources = Resource::all();

        return view('admin.resources.index', [
            'resources' => $resources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request): RedirectResponse
    {
        $resource = Resource::create($request->validated());

        if ($resource) {
            return redirect()
                ->route('admin.resources.index')
                ->with('success', __('store success'));
        }

        return back()->with('error', __('store error'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource): View
    {
        return view('admin.resources.edit', [
           'resource' => $resource
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Edit $request,
        Resource $resource
    ): RedirectResponse
    {
        $resource->fill($request->validated());

        if ($resource->save()) {
            return redirect()
                ->route('admin.resources.index')
                ->with('success', __('update success'));
        }

        return back()->with('error', __('update error'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource): JsonResponse
    {
        try {
            $resource->delete();

            return response()->json('ok');
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return response()->json('error', 400);
        }
    }
}
