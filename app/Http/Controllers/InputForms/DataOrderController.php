<?php

namespace App\Http\Controllers\InputForms;

use App\Http\Controllers\Controller;
use App\Http\Requests\InputForms\DataOrder\Create;
use App\Models\DataOrder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DataOrderController extends Controller
{
    public function index(): View
    {
        return view('inputforms.dataorders.index');
    }

    public function store(Create $request): RedirectResponse
    {
        $orders = new DataOrder(
            $request->validated());

        if ($orders->save()) {
            return redirect()
                ->route('inputforms.dataorders.index')
                ->with('success', __('store success'));
        }

        return back()->with('error', __('store error'));
    }
}
