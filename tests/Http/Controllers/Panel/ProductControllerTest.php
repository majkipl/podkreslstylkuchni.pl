<?php

namespace Tests\Http\Controllers\Panel;

use App\Models\Application;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Panel\PanelBaseTestCase;

class ProductControllerTest extends PanelBaseTestCase
{
    use RefreshDatabase;

    public $route = 'back.product';

    public $model = Product::class;

    public function user_has_not_access_to_create()
    {
    }

    public function user_has_access_to_create()
    {
    }

    public function user_has_not_access_to_edit()
    {
    }

    public function user_has_access_to_edit()
    {
    }

    public function user_has_access_to_edit_and_not_exist_id()
    {
    }
}
