<?php

return [
	'404' => [
		'title_page' => '404 page not found',
		'content' => [
			'headline' => '404',
			'title' => 'Oops! Page not found',
			'subtitle' => 'We could not find the page you were looking for. Meanwhile, you may :url</a>',
			'return_link' => 'return to home'
		]
	],
	'401' => [
		'title_page' => '401 unauthorized access',
		'content' => [
			'headline' => '401',
			'title' => 'HTTP Error 401',
			'subtitle' => 'Unauthorized: Access is denied due to invalid credentials.<br> :url</a>',
			'return_link' => 'Return to home'
		]
	],
	'503' => [
		'title_page' => 'Service Unavailable',
		'content' => [
			'title' => 'HTTP Error 503',
			'subtitle' => 'The server is currently unable to handle the request due to a temporary overloading or maintenance of the server.',
		]
	]	
];