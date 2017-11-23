<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;



Route::get('/','Controller@index');
/*Route::get('/', function () {
    
	/*try{
		$client = new Client();

		$respuesta = $client->get('http://localhost/apirestMongo/public/restMongo.php/listar');

		$data = json_decode($respuesta->getBody()->getContents());
		echo "Estudiantes <br>";
		foreach ($data as $estudiante) {
			echo "$estudiante->nombre <br>";

		}
	}
	catch (GuzzleHttp\Exception\ClientException $e) {
		
	    $response = $e->getResponse();
	    $responseBodyAsString = $response->getBody()->getContents();
	}

	return view('welcome');

});*/
