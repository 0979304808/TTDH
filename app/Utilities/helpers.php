<?php

use App\Models\Socials\Language;
use App\User;
use Carbon\Carbon;

if(!function_exists('all_language')){
    /**
     * Get all language
     *
     * @return \App\Models\Socials\Language
     */
    function all_language(){
        $lang = Language::orderBy('name')->pluck('name', 'id');
        return $lang;
    }
}

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

if(!function_exists('convert_vi_to_en')){
    /**
     * Convert vietnamese without diacritical marks
     * @param string $string
     */
    function convert_vi_to_en($string){
        $string = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $string);
        $string = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $string);
        $string = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $string);
        $string = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $string);
        $string = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $string);
        $string = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $string);
        $string = preg_replace("/(đ)/", "d", $string);
        $string = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $string);
        $string = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $string);
        $string = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $string);
        $string = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $string);
        $string = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $string);
        $string = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $string);
        $string = preg_replace("/(Đ)/", "D", $string);

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

if(!function_exists('make_url_pagi')){
    function make_url_pagi($uri,array $query_string){
        $string = '';
        foreach ($query_string as $key => $val)
        {
            $string .= "&$key=$val";
        }
        return $uri . ($string ? '?'.ltrim($string, '&') : '');
    }
}

if(!function_exists('paging')){
    /**
     * custom for my pagination
     */
    function paging($link, $total_records, $current_page, $limit, $keyword = '')
    {
        $range = 10;
        $min   = 0;
        $max   = 0;

        $total_page = ceil($total_records / $limit);

        if($current_page > $total_page){
            $current_page = $total_page;
        }elseif($current_page < 1){
            $current_page = 1;
        }

        $middle = ceil($range/2);
        if($total_page < $range){
            $min = 1;
            $max = $total_page;
        }else{
            $min = $current_page - ($middle + 1);
            $max = $current_page + ($middle - 1);

            if($min<1){
                $min = 1;
                $max = $range;
            }elseif($max > $total_page){
                $max = $total_page;
                $min = $total_page - $range + 1;
            }
        }

        $start = ($current_page -1)*$limit;
        $html = "<div class='text-center'>";
        $html .= "<nav aria-label='Page navigation'>";
        $html .= "<ul class='pagination'>";

        if($current_page > 1 && $max > 1){
            $html .= '<li><a href="'.str_replace('{page}', $current_page-1, $link).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for($i=$min; $i<=$max; $i++){
            if($i == $current_page){
                $html .= '<li class="active"><a>'.$i.'<span class="sr-only"></span></a></li>';
            }else{
                $html .= '<li><a href="'.str_replace('{page}', $i, $link).'">'.$i.'<span class="sr-only"></span></a></li>';

            }
        }

        if($current_page < $max && $max > 1){
            $html .= '<li><a href="'.str_replace('{page}', $current_page+1, $link).'"aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
        }
        $html .= "</ul>";
        $html .= "</nav>";
        $html .= "</div>";
        // Trả kết quả
        return array(
            'start' => $start,
            'limit' => $limit,
            'key'  => $keyword,
            'html' => $html
        );
    }
}
