<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HttpTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test__the_application_returns_a_successful_response_books_index(): void
    {
        $response = $this->get(route('books.index'));

        $response->assertStatus(200);
    }

    public function test__the_application_returns_a_successful_response_books_store(): void
    {
        $response = $this->get(route('books.store'));

        $response->assertStatus(200);
    }

    public function test__the_application_returns_a_successful_response_books_create(): void
    {
        $response = $this->get(route('books.create'));

        $response->assertStatus(200);
    }

}
