<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AddProductRequest;
use App\Http\Requests\Api\IndexProductRequest;
use App\Http\Requests\Api\UpdateProductRequest;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Traits\ApiRequestParametersTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use ApiRequestParametersTrait;

    /**
     * @param IndexProductRequest $request
     * @return JsonResponse
     */
    public function index(IndexProductRequest $request): JsonResponse
    {
        $params = $this->getRequestParameters($request);
        extract($params);

        $query = Product::search($search, $searchable)->filter($filter)->orderBy($sort, $order);

        $itemsCount = $query->count('id');
        $items = $query->offset($offset)->limit($limit)->get();

        return response()->json([
            'total' => $itemsCount,
            'rows' => $items
        ], Response::HTTP_OK);
    }

    /**
     * @param AddProductRequest $request
     * @return JsonResponse
     */
    public function add(AddProductRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $product = new Product($request->validated());

            $product->save();

            DB::commit();

            Cache::forget('products');

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route('back.product')
                    ]
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(
                [
                    'errors' => [
                        'main' => [
                            'Nie możemy dodać Twojego zgłoszenia, aby rozwiązać problem skontaktuj się z administratorem serwisu.'
                        ]
                    ],
                    'message' => 'Wewnętrzny błąd serwisu.'
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    /**
     * @param UpdateProductRequest $request
     * @return JsonResponse
     */
    public function update(UpdateProductRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $product = Product::findOrFail($request->input('id'));

            $product->fill($request->validated());

            $product->save();

            DB::commit();

            Cache::forget('products');

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route('back.product')
                    ]
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(
                [
                    'errors' => [
                        'main' => [
                            'Nie możemy zaktualizować rekordu, aby rozwiązać problem skontaktuj się z administratorem serwisu.'
                        ]
                    ],
                    'message' => 'Wewnętrzny błąd serwisu.'
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function delete(Product $product): JsonResponse
    {
        DB::beginTransaction();

        try {
            $product->delete();

            DB::commit();

            Cache::forget('products');

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Rekord został pomyślnie usunięty.'
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(
                [
                    'errors' => [
                        'main' => [
                            'Nie możemy usunąć rekordu, aby rozwiązać problem skontaktuj się z administratorem serwisu.'
                        ]
                    ],
                    'message' => 'Wewnętrzny błąd serwisu.'
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
