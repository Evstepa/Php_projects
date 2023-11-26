<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TelegraphText;


class HomeController extends Controller
{
    private const TT_VALIDATOR = [
        'title' => 'required|max:50',
        'text' => 'required',
    ];

    private const TT_ERROR_MESSAGES = [
        'required' => 'Заполните это поле',
        'max' => 'Значение не должно быть длиннее :max символов',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['tts' => Auth::user()->texts()->latest()->get()]);
    }

    /**
     * Форма добавления текста
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAddForm()
    {
        return view('tt_add');
    }

    /**
     * Сохранение текста в таблицу
     *
     * @param Request $request
     * @return void
     */
    public function storeText(Request $request)
    {
        $validated = $request->validate(
            self::TT_VALIDATOR,
            self::TT_ERROR_MESSAGES
        );
        Auth::user()->texts()->create([
            'title' => $validated['title'],
            'text' => $validated['text']
        ]);
        return redirect()->route('home');
    }

    /**
     * Форма редактирования текста
     *
     * @param TelegraphText $tt
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showEditForm(TelegraphText $tt)
    {
        return view('tt_edit', ['tt' => $tt]);
    }

    /**
     * Обновление текста в таблице
     *
     * @param Request $request
     * @param TelegraphText $tt
     * @return void
     */
    public function updateText(Request $request, TelegraphText $tt)
    {
        $validated = $request->validate(
            self::TT_VALIDATOR,
            self::TT_ERROR_MESSAGES
        );
        $tt->fill([
            'title' => $validated['title'],
            'text' => $validated['text']
        ]);
        $tt->save();
        return redirect()->route('home');
    }

    /**
     * Страница удаления текста
     *
     * @param TelegraphText $tt
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showDeleteForm(TelegraphText $tt)
    {
        return view('tt_delete', ['tt' => $tt]);
    }

    /**
     * Удаление текста из таблицы
     *
     * @param TelegraphText $tt
     * @return void
     */
    public function destroyText(TelegraphText $tt)
    {
        $tt->delete();
        return redirect()->route('home');
    }
}
