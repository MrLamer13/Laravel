<?php

namespace App\Http\Controllers\InputForm;

use App\Http\Controllers\Controller;
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
        $info = implode(PHP_EOL, $request->except('_token'));
        Storage::disk('public')->append('inputforms/feedback.txt', $info . PHP_EOL);
        return redirect(route('inputforms.feedback.index'))->with('status', 'Данные успешно занесены!');
    }
}
