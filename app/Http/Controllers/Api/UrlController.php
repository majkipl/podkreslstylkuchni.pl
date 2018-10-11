<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AddUrlRequest;
use App\Http\Requests\Api\IndexUrlRequest;
use App\Http\Requests\Api\UpdateUrlRequest;
use App\Models\Product;
use App\Models\Url;
use App\Traits\ApiRequestParametersTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    use ApiRequestParametersTrait;

    public function index(IndexUrlRequest $request): JsonResponse
    {
        $params = $this->getRequestParameters($request);
        extract($params);

        $query = Url::search($search, $searchable)->filter($filter)->orderBy($sort, $order);

        $itemsCount = $query->count('id');
        $items = $query->offset($offset)->limit($limit)->get();

        return response()->json([
            'total' => $itemsCount,
            'rows' => $items
        ], Response::HTTP_OK);
    }

    public function add(AddUrlRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $url = new Url($request->validated());
            $params = $request->all();

            $url->save();

            DB::commit();

            Cache::forget('urls');
            Cache::forget('products');

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route('back.url')
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

    public function update(UpdateUrlRequest $request)
    {
        DB::beginTransaction();

        try {
            $url = Url::findOrFail($request->input('id'));

            $oldProductId = Product::findOrFail($url->product_id);;
            $newProductId = Product::findOrFail($request->input('product_id'));;

            $url->fill($request->validated());

            $url->save();

            DB::commit();

            Cache::forget('urls');
            Cache::forget('urls_' . $oldProductId->code);
            Cache::forget('urls_' . $newProductId->code);
            Cache::forget('products');

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route('back.url')
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
     * @param Shop $url
     * @return JsonResponse
     */
    public function delete(Url $url): JsonResponse
    {
        DB::beginTransaction();

        try {
            $url->delete();

            DB::commit();

            Cache::forget('urls');
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

    public function product(string $productCode)
    {
        $urls = Url::getByProductCode($productCode);

        return response()->json([
            'total' => $urls->count(),
            'rows' => $urls
        ], Response::HTTP_OK);
    }
}
