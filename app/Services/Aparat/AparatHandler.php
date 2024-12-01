<?php


namespace App\Services\Aparat;


use App\Exceptions\CanNotGetTokenException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AparatHandler
{
    private Http $http;
    const Token_Expire_time=3600;

    public function __construct(Http $http)
    {
        $this->http=$http;
    }

    public function mostViewedVideos()
    {
        $url=config('aparat.mostViewedVideosUrl');
      $response= $this->http::get($url);

      return $response->json('mostviewedvideos');
    }

    public function login()
    {
        $password=config('aparat.password');
        $user=config('aparat.user');
        $url=config('aparat.loginUrl');

        $url=str_replace('{user}',$user,$url);
        $url=str_replace('{password}',$password,$url);

        $response=$this->http::get($url);
        return $response->json('login');

    }

    public function upload()
    {
        $url=config('aparat.formUploadUrl');
        dd($this->getToken());

    }

    private function getToken()
    {
      return  Cache::remember('token_aparat',self::Token_Expire_time,function (){
            $loginData=$this->login();
            if (array_key_exists('ltoken',$loginData) )
            {
                return $loginData['ltoken'];
            }
            throw new CanNotGetTokenException;
        });

    }
}
