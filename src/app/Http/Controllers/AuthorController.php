<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Traits\HttpRes;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use HttpRes;

    /**
     * Display a listing of the resource.
     * Отображает данные (условно весь список авторов)
     */
    public function index()
    {
        return "Show authors list";
    }

    /**
     * Show the form for creating a new resource.
     * Отображение формы создания нового автора
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Получаем данные из формы создания автора
     */
    public function store(CreateAuthorRequest $request)
    {
        $storeArr = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'description' => $request->description,
        ];

        $data = Author::create($storeArr);
        $author = AuthorResource::collection(Author::where('id', $data->id)->get());

        return $this->success(201, 'Author Added Successfully', $author[0]);
    }

    /**
     * Display the specified resource.
     * Отображает конкретную запись
     * Принимает id этого автора и отображает его
     */
    public function show(string $id)
    {
        //метод show для получения информации
        //о конкретном авторе со списком его книг

        $author = Author::with(['books'])
            ->where('id', $id)->get();
        return $this->success('200', "Show author with ID " . $id, $author[0]);
    }

    /**
     * Show the form for editing the specified resource.
     * Отображает форму редактирования автора
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Данный метод сохраняет данные из формы edit
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * Метод удаляет данные из формы edit
     */
    public function destroy(string $id)
    {
        //
    }
}
