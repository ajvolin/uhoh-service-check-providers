<?php

namespace UhOh\ServiceCheckProvider\Configuration\Fields;

use UhOh\ServiceCheckProvider\Configuration\Fields\Field;
use UhOh\ServiceCheckProvider\Configuration\Validation\Between;
use UhOh\ServiceCheckProvider\Configuration\Validation\Numeric;

/**
 * Class NumberField
 * 
 * @package UhOh/ServiceCheckProvider
 */
class NumberField extends Field
{
    /**
     * Field type
     * 
     * @var string
     */
    protected string $type = 'number';

    /**
     * Minimum number
     * 
     * @var int
     */
    public int $minNumber;

    /**
     * Maximum number
     * 
     * @var int
     */
    public int $maxNumber;

    /**
     * Step
     * 
     * @var int
     */
    public int $step;

    /**
     * Validation rules
     * 
     * @var Rule[]
     */
    protected array $validationRules = [
        new Numeric
    ];

    /**
     * Constructor for NumberField
     * 
     * @param string $key The unique identifier for the field
     * @param int $minNumber The minimum number that can be entered
     * @param int $maxNumber The maximum number that can be entered
     * @param int $step The number to increment by
     */
    public function __construct(string $key, int $minNumber, int $maxNumber, int $step)
    {
        parent::__construct($key);
        $this->minNumber = $minNumber;
        $this->maxNumber = $maxNumber;
        $this->step = $step;

        $this->addRule(new Between($minNumber, $maxNumber));
    }
}