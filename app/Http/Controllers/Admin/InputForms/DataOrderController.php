<?php

namespace App\Http\Controllers\Admin\InputForms;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\DataOrder;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class DataOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $dataOrders = DataOrder::all();

        return view('admin.inputforms.dataorders.index', [
            'dataOrders' => $dataOrders
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
    public function show(DataOrder $dataOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataOrder $dataOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataOrder $dataOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id/* DataOrder $dataOrder*/): JsonResponse
    {
        try {
            $dataOrder = DataOrder::query()->where('id', '=', $id)->first();
            $dataOrder->delete();

            return response()->json('ok');
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return response()->json('error', 400);
        }
    }
}
