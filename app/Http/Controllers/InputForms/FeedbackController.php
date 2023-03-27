<?php

namespace App\Http\Controllers\InputForms;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    public function index(): View
    {
        return view('inputforms.feedback.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $feedback = new Feedback(
            $request->only(['name', 'comment'])
        );

        if ($feedback->save()) {
            return redirect(route('inputforms.feedback.index'))
                ->with('success', 'Данные успешно занесены!');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }
}
