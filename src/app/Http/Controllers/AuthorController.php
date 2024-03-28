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
     */
    public function index()
    {
        return "Show authors list";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
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
     */
    public function show(string $id)
    {
        return "Show author with " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
