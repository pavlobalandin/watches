<?php
namespace Gamee\Model;

class Fountain
{
	const TYPE_JSON   = 'json';
	const TYPE_BINARY = 'binary';

	/** @var mixed */
	protected $data;

	/**
	 * Fountain constructor.
	 * @param mixed $data
	 */
	public function __construct($data)
	{
		$this->data = $data;
	}

	/**
	 * @return mixed
	 */
	function getData()
	{
		return $this->data;
	}
}