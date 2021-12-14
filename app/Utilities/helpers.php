<?php

use App\Models\Socials\Language;
use App\User;
use Carbon\Carbon;

if(!function_exists('user')){
    /**
     * Get the authenticated user
     *
     * @return \App\User
     */
    function user(){
        $token = request()->header('Authorization');
        return User::where('tokenId', $token)->first();
    }
}

if(!function_exists('language')){
    /**
     * Return language request if not exists
     *
     * @return string language
     */
    function language(){
        $lang = request('lang', config('language.default'));
        $result = collect(config('language.full'))->filter(function($langs) use($lang){
            if($langs['short'] == $lang || $langs['long'] == $lang){
                return $langs['short'];
            }
        })->first();

        return ($result !== null) ? $result['short'] : null;
    }
}

if(!function_exists('my_slug')){
    /**
     * New function my_slug if not exists
     *
     * @return string slug
     */
    function my_slug($string, $separator = '-'){
        $string = trim(convert_vi_to_en($string));
        $string = mb_strtolower($string, 'UTF-8');

        // Remove multiple dashes or whitespaces or underscores
        $string = preg_replace("/[\s-_]+/", ' ', $string) ;
        // Convert whitespaces and underscore to the given separator
        $string = preg_replace("/[\s_]/", $separator, $string);

        // Generate timestamp create
        $string = $string . '-' . Carbon::now()->timestamp;

        return rawurldecode($string);
    }
}

if (!function_exists('create_slug')) {
    function create_slug($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
}



if(!function_exists('curl_post')){
    /**
     * Get data via curl
     *
     * @return object
     */
    function curl_post($url, $data){
        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-type: application/json',
			'Accept: */*'
		));
		$response = curl_exec($ch);
		curl_close($ch);
		return json_decode($response);
    }
}

if(!function_exists('curl_get')){
    /**
     * Get data via curl
     *
     * @return object
     */
    function curl_get($url){
        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-type: application/json',
			'Accept: */*'
		));
		$response = curl_exec($ch);
		curl_close($ch);
		return json_decode($response);
    }
}

if (!function_exists('check_spanm')){
    function check_spam($content){
        $pattern = "/chó|chết/i";
        if( preg_match($pattern, $content) != 0 ){
            return true;
        }
        return false;
    }
}
