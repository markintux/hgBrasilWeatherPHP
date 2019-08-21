<?php

/**
 * Classe que utiliza a API da HG Weather Brasil (http://hgbrasil.com/weather) para retornar dados meteorológicos
 * Class that use the HG Weather Brasil API (http://hgbrasil.com/weather) to return weather data
 * @license http://www.gnu.org/licenses/lgpl.txt LGPLv3+
 * @license https://opensource.org/licenses/MIT MIT
 * @license http://www.gnu.org/licenses/gpl.txt GPLv3+
 * @author  Marcos Vinicius Campez <markintux at gmail dot com>
 * @link 	https://github.com/markintux/hgBrasilWeatherPHP
 */

class Weather {

	private $key = null;
	private $woeid;
	private $lat;
	private $lon;
	private $user_ip;
	private $city_name;

	function __construct($key, $woeid) {
		$this->key 			= $key;
		$this->woeid 		= $woeid;
	}

	public function getWoeid() {
		return $this->woeid;
	}

	public function getKey() {
		return $this->key;
	}

	public function setLat($lat) {
		$this->lat = $lat;
	}

	public function getLat() {
		return $this->lat;
	}

	public function setLon($lon) {
		$this->lon = $lon;
	}

	public function getLon() {
		return $this->lon;
	}

	public function setUserIP($user_ip) {
		$this->user_ip = $user_ip;
	}

	public function getUserIP() {
		return $this->user_ip;
	}

	public function setCityNameParam($city_name) {
		$this->city_name = $city_name;
	}

	public function getCityNameParam() {
		return $this->city_name;
	}	

	public function getJSON() {
		
		$url = 'https://api.hgbrasil.com/weather/?format=json&';

		if(!empty($this->key)) $url = $url .= 'key=' . $this->key . '&';

		if(!empty($this->woeid)) $url = $url .= 'woeid=' . $this->woeid . '&';

		if(!empty($this->lat)) $url = $url .= 'lat=' . $this->lat . '&';

		if(!empty($this->lon)) $url = $url .= 'lon=' . $this->lon . '&';

		if(!empty($this->user_ip)) $url = $url .= 'user_ip=' . $this->user_ip . '&';

		if(!empty($this->city_name)) $url = $url .= 'city_name=' . $this->city_name . '&';

		/* with file_get_contents */
		// $get_result = file_get_contents(substr($url, 0, -1));

		/* with cURL */
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,substr($url, 0, -1));
		$get_result = curl_exec($ch);
		curl_close($ch);
		
		$result = json_decode($get_result, true);

		if($result['status'] == 500) echo $result['error'];

		return $result;
	}

	public function getValidKey() {
		$json = $this->getJSON();
		return $json['valid_key'];
	}

	public function getTemp() {
		$json = $this->getJSON();
		return $json['results']['temp'];
	}

	public function getDate() {
		$json = $this->getJSON();
		return $json['results']['date'];
	}

	public function getTime() {
		$json = $this->getJSON();
		return $json['results']['time'];
	}

	public function getConditionCode() {
		$json = $this->getJSON();
		return $json['results']['condition_code'];
	}

	public function getDescription() {
		$json = $this->getJSON();
		return $json['results']['description'];
	}

	public function getCurrently() {
		$json = $this->getJSON();
		return $json['results']['currently'];
	}

	public function getCity() {
		$json = $this->getJSON();
		return $json['results']['city'];
	}

	public function getImgID() {
		$json = $this->getJSON();
		return $json['results']['img_id'];
	}

	public function getHumidity() {
		$json = $this->getJSON();
		return $json['results']['humidity'];
	}

	public function getWindSpeedy() {
		$json = $this->getJSON();
		return $json['results']['wind_speedy'];
	}

	public function getSunrise() {
		$json = $this->getJSON();
		return $json['results']['sunrise'];
	}

	public function getSunset() {
		$json = $this->getJSON();
		return $json['results']['sunset'];
	}

	public function getConditionSlug() {
		$json = $this->getJSON();
		return $json['results']['condition_slug'];
	}

	public function getCityName() {
		$json = $this->getJSON();
		return $json['results']['city_name'];
	}

	public function getForecast() {
		$json = $this->getJSON();
		return $json['results']['forecast'];
	}

	public function getLatitude() {
		$json = $this->getJSON();
		return $json['results']['latitude'];
	}

	public function getLongitude() {
		$json = $this->getJSON();
		return $json['results']['longitude'];
	}

}