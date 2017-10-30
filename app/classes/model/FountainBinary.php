<?php
namespace Gamee\Model;

class FountainBinary extends Fountain
{
	public function __construct($data)
	{
		$data = base64_decode($data);
		parent::__construct($data);
	}
}