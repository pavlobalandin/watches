<?php
namespace Gamee\Model;

use Gamee\Strategy\StrategyInterface,
	Gamee\Validation\DescriptionValidation,
	Gamee\Validation\PriceValidation,
	Gamee\Validation\StringValidation,
	Gamee\Validation\Validation;

class Watch extends AbstractWatch
{
	public function __construct(StrategyInterface $loadStrategy)
	{
		parent::__construct($loadStrategy);
		$this->addValidation(new StringValidation(self::KEY_TITLE));
		$this->addValidation(new PriceValidation(self::KEY_PRICE));
		$this->addValidation(new DescriptionValidation(self::KEY_DESCRIPTION));
		$this->addValidation(new Validation(self::KEY_FOUNTAIN));
	}

	protected function map(array $payload)
	{
		$this->title = $payload[self::KEY_TITLE];
		$this->price = $payload[self::KEY_PRICE];
		$this->description = $payload[self::KEY_DESCRIPTION];

		if (is_array($payload[self::KEY_FOUNTAIN])) {
			$this->fountain = new FountainParam($payload[self::KEY_FOUNTAIN]);
		} else {
			$this->fountain = new FountainBinary($payload[self::KEY_FOUNTAIN]);
		}
	}

}