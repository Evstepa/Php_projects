<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TelegraphText;

class TelegraphTextController extends Controller
{
    /**
     * Страница списка всех текстов
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        $context = ['tts' => TelegraphText::latest()->get()];
        return view('index', $context);
    }

    /**
     * Страница выбранного текста
     *
     * @param TelegraphText $tt
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail(TelegraphText $tt)
    {
        return view('detail', ['tt' => $tt]);
    }
}
