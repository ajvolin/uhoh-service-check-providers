<?php

namespace UhOh\ServiceCheckProvider\Configuration\Fields;

use UhOh\ServiceCheckProvider\Configuration\Fields\Field;

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
}