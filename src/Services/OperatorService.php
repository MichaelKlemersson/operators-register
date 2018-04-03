<?php

namespace App\Services;

use App\Services\Api;
use App\Traits\OperatorValidation;

class OperatorService
{
    use OperatorValidation;

    protected $apiDriver;

    public function __construct(Api $apiDriver)
    {
        $this->apiDriver = $apiDriver;
    }

    public function saveOperator(array $data, $isUpdate = false)
    {
        if ($this->validate($data)) {
            $result = json_decode($this->apiDriver->call(
                'operador/',
                $isUpdate ? 'PUT' : 'POST',
                $data
            ));
            
            if ($result->successo != 1) {
                throw new \Exception($result->erro->mensagem, (int) $result->erro->codigo);
            }
        }

        return true;
    }

    public function getOperators()
    {
        $data = json_decode($this->apiDriver->call('operador/', 'GET'), true);

        if (intval($data['successo']) === 1) {
            return $data['objeto'];
        }

        throw new \Exception($data['erro']['mensagem'], $data['erro']['codigo']);
    }
}
