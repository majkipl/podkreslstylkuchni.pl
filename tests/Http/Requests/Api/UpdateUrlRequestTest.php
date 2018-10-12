<?php

namespace Tests\Http\Requests\Api;

use App\Enums\ProductType;
use App\Http\Requests\Api\UpdateUrlRequest;
use App\Models\Product;
use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\Feature\Api\Validation\ValidationTestCase;
use Illuminate\Support\Facades\Validator;

class UpdateUrlRequestTest extends ValidationTestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @param array $arr
     * @param array $without
     * @return array
     */
    public function getData(array $arr = [], array $without = []): array
    {
        $url = factory(Url::class)->create();

        $data = [
            'url' => $url->url,
            'product_id' => $url->product_id,
            'id' => $url->id
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

        $validator = Validator::make($data, (new UpdateUrlRequest())->rules());

        $this->assertFalse($validator->fails());
    }

    /** @test */
    public function validation_fails_if_url_is_missing()
    {
        $data = $this->getData([], ['url']);

        $this->expectValidationException($data, UpdateUrlRequest::class);
    }

    /** @test */
    public function validation_fails_if_url_is_not_string()
    {
        $data = $this->getData([
            'url' => $this->faker->numberBetween(1, 100)
        ]);

        $this->expectValidationException($data, UpdateUrlRequest::class);
    }

    /** @test */
    public function validation_fails_if_url_is_exceeds_max_length()
    {
        $data = $this->getData([
            'url' => Str::random(256),
        ]);

        $this->expectValidationException($data, UpdateUrlRequest::class);
    }

    /** @test */
    public function validation_fails_if_product_id_is_missing()
    {
        $data = $this->getData([], ['product_id']);

        $this->expectValidationException($data, UpdateUrlRequest::class);
    }

    /** @test */
    public function validation_fails_if_product_id_is_not_integer()
    {
        $data = $this->getData([
            'product_id' => $this->faker->word
        ]);

        $this->expectValidationException($data, UpdateUrlRequest::class);
    }

    /** @test */
    public function validation_fails_if_product_id_is_not_exists()
    {
        $data = $this->getData([
            'product_id' => $this->faker->randomNumber()
        ]);

        // Create a mock request object
        $request = new UpdateUrlRequest();
        $request->merge($data);

        // Validate the request
        $validator = Validator::make($data, $request->rules(), $request->messages());

        // Ensure the slug.unique validation rule fails
        $this->assertTrue($validator->fails());
    }

    /** @test */
    public function validation_fails_if_id_is_missing()
    {
        $data = $this->getData([], ['id']);

        $this->expectValidationException($data, UpdateUrlRequest::class);
    }

    /** @test */
    public function validation_fails_if_id_is_not_integer()
    {
        $data = $this->getData([
            'id' => $this->faker->word
        ]);

        $this->expectValidationException($data, UpdateUrlRequest::class);
    }

    /** @test */
    public function validation_fails_if_id_is_not_product_exist()
    {
        $data = $this->getData([
            'id' => $this->faker->randomNumber()
        ]);

        $this->expectValidationException($data, UpdateUrlRequest::class);
    }




}
