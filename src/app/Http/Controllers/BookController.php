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
    public function index(Request $request)
    {
        //метод index в BookController фильтрация по одному автору

//        $result = Book::with(['authors'])
//            ->whereHas('authors', function($q) use ($request) {
//                $q->where('last_name', '=', $request->input('last_name'));
//            })
//            ->get();
//
//        return collect($result);

        //метод index в BookController фильтрация по нескольким авторам

        $authors = $request->input('last_name', []);
        $result = Book::with(['authors'])->when(!empty($authors), function ($q) use ($authors) {
            $q->whereHas('authors', function($q) use ($authors) {
                $q->whereIn('last_name', $authors);
            });
        })
            ->get();
        return collect($result);
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
