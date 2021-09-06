<?php

namespace App\Core\Traits;

trait Helpful {

	public static function covertKind($kind){
		$kind = explode(',', $kind);
		$kinds = config('kind');
		$result = '';
		foreach($kind as $value){
			$item = isset($kinds[trim($value)]) ? $kinds[trim($value)] : '';
			$result = (!empty($result)) ? ($result . ', ' . $item) : $item;
		}
		return $result;
	}
	
	public static function deCovertKind($kind){
		$kind = explode(',', $kind);
		$kinds = array_flip((array)config('kind'));
		$result = '';
		foreach($kind as $value){
			$item = isset($kinds[trim($value)]) ? $kinds[trim($value)] : '';
			$result = (!empty($result)) ? ($result . ', ' . $item) : $item;
		}
		return $result;
	}

	public static function deKindArray($kind){
		if(empty($kind)){
			return $kind;
		}
		$kinds = (array) config('kind');
		$result = '';
		foreach($kind as $value){
			$key = array_search($value, $kinds);
			$result = (!empty($result)) ? ($result . ', ' . $key) : $key;
		}

		return $result;
	}

	public static function getKinds(){
		$data = config('kind');
		foreach($data as $value => $text){
			$kinds[] = [
				'value' => $value,
				'text'  => $text
			];
		}
		return $kinds;
	}

    /**
     * @return string
     */
    public function generateToken(){
        return md5($this->generateString(30));
    }
    
    /**
     * @return string
     */
    public function generateString($length = 12){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
    }

    public function curlPost($url, $data){
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