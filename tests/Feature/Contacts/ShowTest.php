<?php

namespace Tests\Feature\Contacts;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShow()
    {
        $contact = Contact::inRandomOrder()->first();

        $response = $this->get('api/contacts/' . $contact->id);

        $response->assertStatus(200);

        $response->assertJson($contact->toArray());
    }
}
