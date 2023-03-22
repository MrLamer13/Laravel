<?php

namespace App\Http\Controllers\InputForm;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderForDataController extends Controller
{
    public function index(): View
    {
        return view('inputforms.orderfordata.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $info = implode(PHP_EOL, $request->except('_token'));
        Storage::disk('public')->append('inputforms/orderfordata.txt', $info . PHP_EOL);
        return redirect(route('inputforms.orderfordata.index'))->with('status', 'Данные успешно занесены!');
    }
}
