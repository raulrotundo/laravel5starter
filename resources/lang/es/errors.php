<?php

return [
	'404' => [
		'title_page' => '404 página no encontrada',
		'content' => [
			'headline' => '404',
			'title' => 'Oops! página no encontrada',
			'subtitle' => 'No hemos podido encontrar la página que estabas buscando. De momento, usted puede :url</a>',
			'return_link' => 'regresar al escritorio'
		]
	],
	'401' => [
		'title_page' => '401 Acceso no autorizado',
		'content' => [
			'headline' => '401',
			'title' => 'HTTP Error 401',
			'subtitle' => 'Acceso no autorizado: Acceso denegado debido a credenciales no válidas.<br> :url</a>',
			'return_link' => 'Regresar al escritorio'
		]
	],
	'503' => [
		'title_page' => 'Servicio No Disponible',
		'content' => [
			'title' => 'HTTP Error 503',
			'subtitle' => 'El servidor actualmente es incapaz de manejar la solicitud debido a una sobrecarga temporal o mantenimiento del servidor.',
		]
	]
	
];