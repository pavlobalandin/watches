<?php
namespace Gamee\Model;

use Gamee\Exception\WatchException,
	Gamee\Strategy\StrategyInterface,
	Gamee\Validation\ValidationInterface;

abstract class AbstractWatch
{
	const KEY_TITLE       = 'title';
	const KEY_PRICE       = 'price';
	const KEY_DESCRIPTION = 'description';
	const KEY_FOUNTAIN    = 'fountain';

	// in_array workaround
	const REASONABLE_PARAM_SIZE = 4;


	/** @var string */
	protected $title;

	/** @var integer */
	protected $price;

	/** @var string */
	protected $description;

	/** @var Fountain */
	protected $fountain;

	/** @var array */
	private $payload;

	/** @var array */
	private $validators = [];

	/** @var array */
	private $errors = [];

	/** @var StrategyInterface */
	protected $loadStrategy;

	/**
	 * AbstractWatch constructor.
	 * @param StrategyInterface $loadStrategy
	 */
	public function __construct(StrategyInterface $loadStrategy)
	{
		$this->loadStrategy = $loadStrategy;
		$this->validators = [];
		$this->errors = [];
	}

	/**
	 * @param string $name
	 * @param mixed $arguments
	 * @return mixed
	 * @throws WatchException
	 */
	public function __call($name, $arguments)
	{
		$paramName = strtolower(preg_replace('/^get/', '', $name));

		// avoid in_array boolean bug
		if (strlen($paramName) > self::REASONABLE_PARAM_SIZE && in_array($paramName, [
				self::KEY_TITLE,
				self::KEY_PRICE,
				self::KEY_DESCRIPTION,
				self::KEY_FOUNTAIN,
			])) {
			return $this->$paramName;
		}

		throw new WatchException('Param ' . $paramName . ' not found.');
	}

	/**
	 * @param string $fileName
	 * @throws WatchException
	 */
	public function load($fileName)
	{
		if (!$this->loadStrategy->loadFromFile($fileName))
		{
			$exc = $this->loadStrategy->getException();
			throw $exc;
		}

		$this->payload = $this->loadStrategy->getData();
		if (!$this->validate($this->payload)) {
			throw new WatchException('Can\'t load ' . $fileName);
		}

		$this->map($this->payload);
	}

	/**
	 * @param array $data
	 * @return bool
	 */
	protected function validate(array $data)
	{
		$isValid = TRUE;
		foreach ($this->validators as $validator) {
			if (!$validator->isValid($data)) {
				$this->errors[] = $validator->getException();
				$isValid = FALSE;
			}
		}
		return $isValid;
	}

	/**
	 * @return array
	 */
	protected function getErrors()
	{
		return $this->errors;
	}

	/**
	 * @param ValidationInterface $validation
	 */
	protected function addValidation(ValidationInterface $validation)
	{
		$this->validators[] = $validation;
	}

	/**
	 * @param array $payload
	 */
	abstract protected function map(array $payload);
}