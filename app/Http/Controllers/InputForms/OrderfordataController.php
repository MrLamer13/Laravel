<?php

namespace App\Http\Controllers\InputForms;

use App\Http\Controllers\Controller;
use App\Http\Requests\InputForms\OrderForData\Create;
use App\Models\Orderfordata;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrderfordataController extends Controller
{
    public function index(): View
    {
        return view('inputforms.orderfordata.index');
    }

    public function store(Create $request): RedirectResponse
    {
        $orders = new Orderfordata(
            $request->validated());

        if ($orders->save()) {
            return redirect()
                ->route('inputforms.orderfordata.index')
                ->with('success', __('store success'));
        }

        return back()->with('error', __('store error'));
    }
}
