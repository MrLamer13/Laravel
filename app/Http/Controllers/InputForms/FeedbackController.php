<?php

namespace App\Http\Controllers\InputForms;

use App\Http\Controllers\Controller;
use App\Http\Requests\InputForms\Feedback\Create;
use App\Models\Feedback;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class FeedbackController extends Controller
{
    public function index(): View
    {
        return view('inputforms.feedback.index');
    }

    public function store(Create $request): RedirectResponse
    {
        $feedback = new Feedback($request->validated());

        if ($feedback->save()) {
            return redirect()
                ->route('inputforms.feedback.index')
                ->with('success', __('store success'));
        }

        return back()->with('error', __('store error'));
    }
}
