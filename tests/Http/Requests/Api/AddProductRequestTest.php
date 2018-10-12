<?php

namespace Tests\Http\Requests\Api;

use App\Enums\ProductType;
use App\Http\Requests\Api\AddProductRequest;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\Feature\Api\Validation\ValidationTestCase;
use Illuminate\Support\Facades\Validator;

class AddProductRequestTest extends ValidationTestCase
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
            'name' => $this->faker->name,
            'code' => $this->faker->name,
            'type' => ProductType::RETRO,
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

        $validator = Validator::make($data, (new AddProductRequest())->rules());

        $this->assertFalse($validator->fails());
    }

    /** @test */
    public function validation_fails_if_name_is_missing()
    {
        $data = $this->getData([], ['name']);

        $this->expectValidationException($data, AddProductRequest::class);
    }

    /** @test */
    public function validation_fails_if_name_is_not_string()
    {
        $data = $this->getData([
            'name' => $this->faker->numberBetween(1, 100)
        ]);

        $this->expectValidationException($data, AddProductRequest::class);
    }

    /** @test */
    public function validation_fails_if_name_is_exceeds_max_length()
    {
        $data = $this->getData([
            'name' => Str::random(129)
        ]);

        $this->expectValidationException($data, AddProductRequest::class);
    }

    /** @test */
    public function validation_fails_if_code_is_missing()
    {
        $data = $this->getData([], ['code']);

        $this->expectValidationException($data, AddProductRequest::class);
    }

    /** @test */
    public function validation_fails_if_code_is_not_string()
    {
        $data = $this->getData([
            'code' => $this->faker->numberBetween(1, 100)
        ]);

        $this->expectValidationException($data, AddProductRequest::class);
    }

    /** @test */
    public function validation_fails_if_code_is_exceeds_max_length()
    {
        $data = $this->getData([
            'code' => Str::random(17)
        ]);

        $this->expectValidationException($data, AddProductRequest::class);
    }

    /** @test */
    public function validation_fails_if_code_is_not_unique()
    {
        // Create product
        $existingProduct = factory(Product::class)->create();

        $data = $this->getData([
            'code' => $existingProduct->code
        ]);

        // Create a mock request object
        $request = new AddProductRequest();
        $request->merge($data);

        // Validate the request
        $validator = Validator::make($data, $request->rules(), $request->messages());

        // Ensure the slug.unique validation rule fails
        $this->assertTrue($validator->fails());
    }

    /** @test */
    public function validation_fails_if_type_is_missing()
    {
        $data = $this->getData([], ['type']);

        $this->expectValidationException($data, AddProductRequest::class);
    }

    /** @test */
    public function validation_fails_if_type_is_not_product_type()
    {
        $data = $this->getData([
            'type' => $this->faker->word
        ]);

        $this->expectValidationException($data, AddProductRequest::class);
    }

}
