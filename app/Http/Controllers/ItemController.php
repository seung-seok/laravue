<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function index(Request $request){
        ($request->query('cats'))?$cats = $request->query('cats'):$cats = '01_00';
        
        // Setting URL
        $url = 'https://domeggook.com/ssl/api/';
        // Setting Request Parameters
        $data = array(
            'ver'    => '4.1',
            'mode'   => 'getPopularItemList',
            'aid'    => 'd83f03ffd532e0ba63a95106dc961f45', //5652a4d7a9b8b995e6f3545d189a2a85
            'cat'     => $cats,
            // 'cat'     => '01_00',
            'om'     => 'json',
            'sz'     => '10'
        );
        $url = $url . "?" . http_build_query($data, '', );

        $ch = curl_init();                                 //curl 초기화
        curl_setopt($ch, CURLOPT_URL, $url);               //URL 지정하기
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함
        
        $response = curl_exec($ch);
        curl_close($ch);

        $res = json_decode($response, true);
        $res = json_encode($res['domeggook']['list']['item'], JSON_PRETTY_PRINT);
        
        return $res;
    }
}
