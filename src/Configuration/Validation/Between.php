<?php

namespace UhOh\ServiceCheckProvider\Configuration\Validation;

use UhOh\ServiceCheckProvider\Configuration\Validation\Rule;

/**
 * Class Between
 * 
 * @package UhOh/ServiceCheckProvider
 */
class Between extends Rule
{
    /**
     * Rule name
     * 
     * @var string
     */
    protected string $name = 'between';

    /**
     * Minimum length
     * 
     * @var int
     */
    public int $min;

    /**
     * Maximum length
     * 
     * @var int
     */
    public int $max;

    /**
     * Rule constructor
     * 
     * @param int $min
     * @param int $max
     */
    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }
}