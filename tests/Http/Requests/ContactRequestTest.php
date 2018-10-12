<?php

namespace Tests\Http\Requests;

use App\Http\Requests\ContactRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Tests\Feature\Api\Validation\ValidationTestCase;

class ContactRequestTest extends ValidationTestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @param array $arr
     * @param array $without
     * @return array
     */
    public function getData(array $arr = [], array $without = []): array
    {
        $data = [
            'name' => $this->faker->firstName,
            'email' => $this->faker->word . '@gmail.com',
            'message' => $this->faker->text(4096, true),
            'legal_5' => true,
        ];

        foreach ($without as $item) {
            if (array_key_exists($item, $data)) {
                unset($data[$item]);
            }
        }

        return array_merge($data, $arr);
    }

    /** @test */
    public function validation_pass_for_valid_data()
    {
        $data = $this->getData();

        $validator = Validator::make($data, (new ContactRequest())->rules());

        $this->assertFalse($validator->fails());
    }

    /** @test */
    public function validation_fails_if_name_is_not_exists()
    {
        $data = $this->getData([], ['name']);

        $this->expectValidationException($data, ContactRequest::class);
    }

    /** @test */
    public function validation_fails_if_name_is_not_a_string()
    {
        $data = $this->getData([
            'name' => $this->faker->numberBetween(1, 100)
        ]);

        $this->expectValidationException($data, ContactRequest::class);
    }

    /** @test */
    public function validation_fails_if_name_is_less_that_min_length()
    {
        $data = $this->getData([
            'name' => Str::random(2)
        ]);

        $this->expectValidationException($data, ContactRequest::class);
    }

    /** @test */
    public function validation_fails_if_name_is_exceeds_max_length()
    {
        $data = $this->getData([
            'name' => Str::random(129),
        ]);

        $this->expectValidationException($data, ContactRequest::class);
    }

    /** @test */
    public function validation_fails_if_email_is_not_exists()
    {
        $data = $this->getData([], ['email']);

        $this->expectValidationException($data, ContactRequest::class);
    }

    /** @test */
    public function validation_fails_if_email_is_not_rfc()
    {
        $data = $this->getData([
            'email' => Str::random(16),
        ]);

        $this->expectValidationException($data, ContactRequest::class);
    }

    /** @test */
    public function validation_fails_if_message_is_not_exists()
    {
        $data = $this->getData([], ['message']);

        $this->expectValidationException($data, ContactRequest::class);
    }

    /** @test */
    public function validation_fails_if_message_is_not_a_string()
    {
        $data = $this->getData([
            'message' => $this->faker->randomDigit,
        ]);

        $this->expectValidationException($data, ContactRequest::class);
    }

    /** @test */
    public function validation_fails_if_message_is_exceeds_max_length()
    {
        $data = $this->getData([
            'message' => Str::random(4097),
        ]);

        $this->expectValidationException($data, ContactRequest::class);
    }
}
