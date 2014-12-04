<?php

namespace Att\M2X;

class M2X {

	const DEFAULT_API_BASE = 'https://api-m2x.att.com';
  	const DEFAULT_API_VERSION = 'v2';

/**
 * The full URI to the M2X API
 *
 * @var string
 */
  	protected $endpoint;

/**
 * Holds the API Key
 *
 * @var string
 */
	protected $apiKey;

/**
 * Holds the instance that does all HTTP requests
 *
 * @var HttpRequest
 */
	public $HttpRequest;

/**
 * Contructor
 *
 * @param string $apiKey
 * @return void
 */
	public function __construct($apiKey) {
		$this->apiKey = $apiKey;
		$this->endpoint = self::DEFAULT_API_BASE . '/' . self::DEFAULT_API_VERSION;
	}

/**
 * Returns the API Key
 *
 * @return string
 */
	public function apiKey() {
		return $this->apiKey;
	}

/**
 * Returns the full URI to the M2X API
 *
 * @return string
 */
	public function endpoint() {
		return $this->endpoint;
	}

/**
 * Returns the API status
 *
 * @return [type] [description]
 */
	public function status() {
		$data = $this->get('/status');
		return $data;
	}

	public function get($path) {
		$request = $this->request();
		return $request->get($this->endpoint . $path);
	}

/**
 * Creates an instance of the HttpRequest if it doesnt exist yet
 *
 * @return HttpRequest
 */
	private function request() {
		if (!$this->HttpRequest) {
			$this->request = new HttpRequest();
		}

		return $this->request;
	}
}