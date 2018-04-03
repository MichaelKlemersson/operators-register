<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

trait ApiResponseHelper
{
    public function makeApiReponse($content, $code = Response::HTTP_OK)
    {
        if (is_object($content)) {
            $content = (array) $content;
        }

        return new JsonResponse($content, $code);
    }
}
