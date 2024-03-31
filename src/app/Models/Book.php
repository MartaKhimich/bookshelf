<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    public function authors()
    {
        return $this->belongsToMany(
            Author::class,
            'book_author',
            'book_id',
            'author_id'
        );
    }

    //        метод index в BookController фильтрация по нескольким авторам

    //        $querySearch = $request->input('last_name', []);
    //        //dd($querySearch);
    //        $result = Book::with(['authors'])->when(!empty($querySearch), function ($q) use ($querySearch) {
    //                $q->whereHas('authors', function($q) use ($querySearch) {
    //                    foreach($querySearch as $last_name) {
    //                        $q->orWhere('last_name', '=', $last_name);
    //                    }
    //            });
    //        })
    //            ->toSql();
    //
    //        return collect($result);
}
