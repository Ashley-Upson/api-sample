<?php

namespace Tests\Feature\Contacts;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdate()
    {
        $contact = Contact::inRandomOrder()->first();

        $response = $this->put('api/contacts/' . $contact->id, [
            'name' => 'Updating the name',
            'email' => 'updated@email.com',
            'message' => 'This message has been updated.'
        ]);

        $response->assertStatus(204);

        $updated = Contact::find($contact->id);

        $this->assertEquals('Updating the name', $updated->name);
        $this->assertEquals('updated@email.com', $updated->email);
        $this->assertEquals('This message has been updated.', $updated->message);
    }
}
