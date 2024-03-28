<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Traits\HttpRes;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use HttpRes;

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
    public function store(CreateBookRequest $request)
    {
        $storeArr = [
            'title' =>  $request->title,
            'description' => $request->description,
        ];

        $data = Book::create($storeArr);
        $book = BookResource::collection(Book::where('id', $data->id)->get());

        return $this->success(201, 'Book Added Successfully', $book[0]);
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
