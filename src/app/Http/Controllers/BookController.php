<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     * Отображает данные (условно весь список книг)
     */
    public function index()
    {
        return "Show books list";
    }

    /**
     * Show the form for creating a new resource.
     * Отображение формы создания новой книги
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     * Получаем данные из формы создания книг
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     * Отображает конкретную запись
     * Принимает id этой книги и отображает её
     */
    public function show(string $id)
    {
        return "Show book by " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     * Отображает форму редактирования книги
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     * Данный метод сохраняет данные из формы edit
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     * Метод удаляет данные из формы edit
     */
    public function destroy($id)
    {

    }
}
