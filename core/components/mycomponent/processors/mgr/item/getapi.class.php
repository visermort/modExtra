<?php

class myComponentItemGetapiProcessor extends modProcessor
{
    public $objectType = 'myComponentItem';
    public $classKey = 'myComponentItem';
    public $languageTopics = array('mycomponent');
    public $responseArray = array();


    private function execCurl($url,$login,$password){
        $myCurl = curl_init();
        curl_setopt_array($myCurl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => false,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $login.':'.$password,
         
        ));
        $response = curl_exec($myCurl);
        curl_close($myCurl);
        return $response;
    }


    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }


        //конфиги 
        $apiUrl = $this->modx->getOption('mycomponent_api_url');
        $login = $this->modx->getOption('mycomponent_api_login');
        $password = $this->modx->getOption('mycomponent_api_password');

         //просто пробный запрос - список заказов
        $url = $apiUrl.'entity/customerorder';

        $response = $this->execCurl($url,$login,$password);



        return $this->modx->toJSON(array('status'=>true, 'message' => $response));
    }

}

return 'myComponentItemGetapiProcessor';