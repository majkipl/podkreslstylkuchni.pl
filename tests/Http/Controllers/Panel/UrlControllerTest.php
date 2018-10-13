<?php

namespace Tests\Http\Controllers\Panel;

use App\Models\Application;
use App\Models\Product;
use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Panel\PanelBaseTestCase;

class UrlControllerTest extends PanelBaseTestCase
{
    use RefreshDatabase;

    public $route = 'back.url';

    public $model = Url::class;
}
