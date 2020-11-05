<?php

namespace Tests\Feature\Contacts;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDelete()
    {
        $contact = Contact::inRandomOrder()->first();

        $response = $this->delete('api/contacts/' . $contact->id);

        $response->assertStatus(204);

        $deleted = Contact::find($contact->id);

        $this->assertNull($deleted);
    }
}
