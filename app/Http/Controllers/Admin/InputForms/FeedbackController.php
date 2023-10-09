<?php

namespace App\Http\Controllers\Admin\InputForms;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $feedbackList = Feedback::all();

        return view('admin.inputforms.feedback.index', [
            'feedbackList' => $feedbackList
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param Feedback $feedback
     * @return JsonResponse
     */
    public function destroy(Feedback $feedback): JsonResponse
    {
        try {
            $feedback->delete();

            return response()->json('ok');
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return response()->json('error', 400);
        }
    }
}
