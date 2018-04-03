<?php

namespace App\Services;

class Api
{
    public $url = 'http://54.94.144.200/sandbox/paguetudo/v1/';

    /**
     * Acesso à API Easy for Pay Mineirão
     * 
     * @param string $endpoint URL para o ending point utilizado
     * @param string $method Método utilizado
     * @param array/null $data Dados para a API
     * @param string $parse Tipo de retorno
     * @param string $key Tipo de token: A = Administrador / U = User / V = Vendedor
     * @return objeto
     */
    public function call($endpoint, $method, $data = null, $parse = true, $key = 'V') 
    {
        if (!$endpoint) {
            return false;
        }
        $data = $parse ? $this->parse($data) : $data;
        
        $headers = [
            'Accept: application/json', 
            'Content-Type: application/json', 
            'Authorization: Custom 57fa266619b1529ceb39fbc61371fcd3ca599f592d5755f00bfa7c715d3faf8f23f7fc8922fd905c29490140a9ff9203d8b560602790ba331ae60e53d8688f38', 
            strtoupper($method) == 'PUT' ? 'Content-Length:' . strlen($data) : ''
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url . $endpoint);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (!empty($data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if (!$result = curl_exec($ch)) {
            return curl_error($ch);
        } else {
            return $result;
        }
    }
    
    /**
     * Converter informação em UTF8
     * 
     * @param array $param Parâmetros para conversão em UTF8
     * @return array
     */
    public function utf8ize($param) 
    {
        if (is_array($param)) {
            foreach ($param as $k => $v) {
                $param[$k] = $this->utf8ize($v);
            }
        } else if (is_string($param) && mb_detect_encoding($param) === 'ISO-8859-1') {
            return utf8_encode($param);
        }
        return $param;
    }

    /**
     * Converter informação em UTF8 e codificá-la em JSON
     * 
     * @param type $data Informação para conversão
     * @return type
     */
    function parse($data) 
    {
        if (!$data) {
            return null;
        }
        return json_encode($this->utf8ize($data));
    }
    
    /**
     * Retornar objeto com mensagem de erro
     */
    public function getApiError($errorMsg) 
    {
        return (object)['successo' => '0', 'erro' => ['mensagem' => $errorMsg]];
    }
    
    /**
     * Retornar objeto com mensagem de sucesso
     */
    public function getApiSuccess($errorMsg) 
    {
        return (object)['successo' => '1', 'mensagem' => $errorMsg];
    }
    
    /**
     * Setar valor de URL da Api
     */
    public function setUrl($url=''){
        $this->url=$url;
    }   
    
    /**
     * Retornar a URL da Api
     */
    public function getUrl(){
        return $this->url;
    } 
    
}