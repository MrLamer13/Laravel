<?php

namespace App\Http\Controllers\Admin\InputForms;

use App\Http\Controllers\Controller;
use App\Models\OrderForData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderForDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $orders = OrderForData::all();

        return view('admin.inputforms.orderfordata.index', [
           'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderForData $orderForData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderForData $orderForData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderForData $orderForData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderForData $orderForData): RedirectResponse
    {
        if ($orderForData->delete()) {
            return redirect()->route('admin.orderfordata.index')
                ->with('success', 'Запись успешно удалена');
        }

        return back()->with('error', 'Не удалось удалить запись');
    }
}
