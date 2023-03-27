<?php

namespace App\Http\Controllers\InputForms;

use App\Http\Controllers\Controller;
use App\Models\OrderForData;
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
        $orders = new OrderForData(
            $request->only([
                'name',
                'phone',
                'email',
                'order'
            ])
        );

        if ($orders->save()) {
            return redirect(route('inputforms.orderfordata.index'))
                ->with('success', 'Данные успешно занесены!');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }
}
