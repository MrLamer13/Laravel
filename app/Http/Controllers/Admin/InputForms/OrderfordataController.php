<?php

namespace App\Http\Controllers\Admin\InputForms;

use App\Http\Controllers\Controller;
use App\Models\Orderfordata;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class OrderfordataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $ordersfordata = Orderfordata::all();

        return view('admin.inputforms.orderfordata.index', [
            'ordersfordata' => $ordersfordata
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
    public function show(Orderfordata $orderfordata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orderfordata $orderfordata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orderfordata $orderfordata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orderfordata $orderfordata): JsonResponse
    {
        try {
            $orderfordata->delete();

            return response()->json('ok');
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return response()->json('error', 400);
        }
    }
}
