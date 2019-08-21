<?php  

/**
 * 	Arquivo que demonstra a utilização da classe Weather
 * 	File that shows how to use the Weather class
 *  @author Marcos Vinicius Campez <markintux at gmail dot com>
 * 	@link 	https://github.com/markintux/hgBrasilWeatherPHP
 */

/*
 *	Patch para classe
 *	Patch for the class
 */
	
	include 'class/Weather.php';

/*
 * 	Exibe informações apenas com o WOEID da cidade desejada, neste caso $key é opcional
 * 	Shows the informations using only the WOEID city code, $key is optional
 */
	$key	 = '';
	$woeid   = 456076;
	$weather = new Weather($key, $woeid);

/*
 *	Exibe informações de acordo com a latitude e longitude
 *	Shows the informations using latitude and longitude
 */

	// $key	 = 'SUA_CHAVE_AQUI YOUR_KEY_HERE';
	// $woeid   = '';
	// $weather = new Weather($key, $woeid);
	// $weather->setLat('-20.8861169');
	// $weather->setLon('-47.5854134');

/*
 *	Exibe informações de acordo com um IP específico, usa-se 'remote' para o sistema obter o IP com base no cliente
 *  Shows the informations using a specific IP, use 'remote' to catch the client IP
 */

	// $key	 = 'SUA_CHAVE_AQUI YOUR_KEY_HERE';
	// $woeid   = '';
	// $weather = new Weather($key, $woeid);
	// $weather->setUserIP('remote');

/*
 *	Exibe informações de acordo com o nome da cidade
 *  Shows the informations using the name of the city
 */

	// $key	 = 'SUA_CHAVE_AQUI YOUR_KEY_HERE';
	// $woeid   = '';
	// $weather = new Weather($key, $woeid);
	// $weather->setCityNameParam('Batatais');

/*
 *	Exibindo as informações
 *	Showing the informations
 */

	/* 	
		temp - temperatura atual em ºC
	 	temp - current temperature in ºC
	*/
	echo 'Temp: '.$weather->getTemp().'<br />';

	/* 	
		date - data da consulta
	 	date - current date
	*/
	echo 'Date: '.$weather->getDate().'<br />';

	/* 	
		time - hora da consulta
	 	time - current time
	*/
	echo 'Time: '.$weather->getTime().'<br />';

	/* 	
		condition_code - código da condição de tempo atual (https://console.hgbrasil.com/documentation/weather/conditions)
	 	condition_code - current weather condition code (https://console.hgbrasil.com/documentation/weather/conditions)
	*/
	echo 'Condition Code: '.$weather->getConditionCode().'<br />';

	/* 	
		currently - retorna se está de dia ou de noite no idioma escolhido
	 	currently - returns if is day or night using the selected language
	*/
	echo 'Currently: '.$weather->getCurrently().'<br />';

	/* 	
		city - nome da cidade seguido por uma vírgula (mantido para as libs antigas)
	 	city - the name of the city followed with a comma (kept for the old libs)
	*/
	echo 'City: '.$weather->getCity().'<br />';

	/* 	
		img_id - id da imagem que representa a condição de tempo atual
	 	img_id - the image id that represents the current weather
	*/
	echo 'Image ID: '.$weather->getImgID().'<br />';

	/* 	
		humidity - umidade atual em percentual
	 	humidity - current humidity in percentage
	*/
	echo 'Humidity: '.$weather->getHumidity().'<br />';

	/* 	
		wind_speedy - velocidade do vento em km/h
	 	wind_speedy - wind speed in km/h
	*/
	echo 'Wind Speedy: '.$weather->getWindSpeedy().'<br />';

	/* 	
		sunrise - nascer do sol em horário local da cidade
	 	sunrise - sunrise city time
	*/
	echo 'Sunrise: '.$weather->getSunrise().'<br />';

	/* 	
		sunset - pôr do sol em horário local da cidade
	 	sunset - sunset city time
	*/
	echo 'Sunset: '.$weather->getSunset().'<br />';

	/* 	
		condition_slug - slug da condição de tempo atual (https://console.hgbrasil.com/documentation/weather/condition_slugs)
	 	condition_slug - slug of current weather condition (https://console.hgbrasil.com/documentation/weather/condition_slugs)
	*/
	echo 'Condition Slug: '.$weather->getConditionSlug().'<br />';

	/* 	
		city_name - nome da cidade
	 	city_name - name of the city
	*/
	echo 'City Name: '.$weather->getCityName().'<br />';

	/* 	
		forecast - array com a previsão do tempo para outros dias
	 	forecast - the forecast weather array for the other days
	*/
	foreach ($weather->getForecast() as $value) {
		
		/* 	
			date - data da previsão dd/mm
	 		date - weather forecast date
		*/
		$date = $value['date'];

		/* 	
			weekday - dia da semana abreviado
	 		weekday - weather forecast of the week day (for short)
		*/
		$weekday = $value['weekday'];

		/* 	
			max - temperatura máxima em ºC
	 		max - max temperature
		*/
		$max = $value['max'];

		/* 	
			min - temperatura mínima em ºC
	 		min - minimum temperature
		*/
		$min = $value['min'];

		/* 	
			description - descrição da previsão
	 		description - weather forecast description
		*/
		$description = $value['description'];

		/* 	
			condition - slug da condição (https://console.hgbrasil.com/documentation/weather/condition_slugs)
	 		condition - slug of weather condition (https://console.hgbrasil.com/documentation/weather/condition_slugs)
		*/
		$condition = $value['condition'];

		
		/* 	
			exibindo as informações
	 		showing the informations
		*/
		echo $date. ' | '.$weekday.' | '.$max.' | '.$min.' | '.$description.' | '.$condition.'<br />';

	}