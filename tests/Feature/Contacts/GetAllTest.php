<?php

namespace Tests\Feature\Contacts;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetAllTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAll()
    {
        $response = $this->get('api/contacts');

        $response->assertStatus(200);

        $contacts = Contact::all();

        $response->assertJson($contacts->toArray(), $contacts->toJson());
    }
}
