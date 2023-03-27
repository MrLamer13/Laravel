<?php

namespace App\Http\Controllers\Admin\InputForms;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

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
     */
    public function destroy(Feedback $feedback): RedirectResponse
    {
        if ($feedback->delete()) {
            $feedbackList = Feedback::all();
            return redirect()->route('admin.inputforms.feedback.index', [
                'feedbackList' => $feedbackList
            ])->with('success', 'Запись успешно удалена');
        }

        return back()->with('error', 'Не удалось удалить запись');
    }
}
