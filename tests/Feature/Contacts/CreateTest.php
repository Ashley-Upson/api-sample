<?php

namespace Tests\Feature\Contacts;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $data = [
            'name' => 'Some name',
            'email' => 'ashley@aupson.co.uk',
            'message' => 'This is an automated PHPUnit test.',
        ];

        $response = $this->post('api/contacts', $data);

        $response->assertStatus(204);

        $contact = Contact::where($data)->first();

        $this->assertNotNull($contact);
    }
}
