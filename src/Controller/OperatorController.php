<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Services\OperatorService;
use App\Traits\ApiResponseHelper;

class OperatorController extends Controller
{
    use ApiResponseHelper;

    protected $operatorService;

    public function __construct(OperatorService $operatorService)
    {
        $this->operatorService = $operatorService;
    }

    public function index()
    {
        return $this->render('operators/view.html.php');
    }

    public function list()
    {
        try {
            return $this->makeApiReponse([
                'operators' => $this->operatorService->getOperators()
            ]);
        } catch (\Exception $e) {
            return $this->makeApiReponse([
                'error' => $e->getMessage(),
                'code' => $e->getCode()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function create(Request $request)
    {
        try {
            $this->operatorService->saveOperator($request->request->all());
            return $this->makeApiReponse([
                'success' => true
            ]);
        } catch (\Exception $e) {
            return $this->makeApiReponse([
                'error' => $e->getMessage(),
                'code' => $e->getCode()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
