<?php


namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ResponseTrait
{
    protected $resourceItem;
    protected $resourceCollection;

    protected function respondWithNoContent(string $message = ''): JsonResponse
    {

        return new JsonResponse([
            'message' => $message
        ], 200);
    }

    protected function respondWithCollection($collection)
    {
        return (new $this->resourceCollection($collection));
    }

    protected function respondWithItem(Model $item)
    {
        return (new $this->resourceItem($item));
    }

    protected function respondWithCustomData($data, $status = 200, string $message = null): JsonResponse
    {

        return new JsonResponse([
            'data' => $data,
            'message' => $message
        ], $status);
    }

    protected function respondWithNoSuccess(string $message, int $status): JsonResponse
    {
        return new JsonResponse([
            'message' => $message
        ], $status);


    }


}
