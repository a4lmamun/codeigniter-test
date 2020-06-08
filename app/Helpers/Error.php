<?php namespace App\Helpers;

class Error
{
	public static function notFound($response, $message) {
		$response->setStatusCode(404, $message);
		return view('errors/html/error_404');
	}
}