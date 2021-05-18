<?php

namespace UhOh\ServiceCheckProvider\Configuration\Validation;

use UhOh\ServiceCheckProvider\Configuration\Validation\Rule;

/**
 * Class Min
 * 
 * @package UhOh/ServiceCheckProvider
 */
class Min extends Rule
{
    /**
     * Rule name
     * 
     * @var string
     */
    protected string $name = 'min';

    /**
     * Minimum length
     * 
     * @var int
     */
    public int $min;

    /**
     * Rule constructor
     * 
     * @param int $min
     */
    public function __construct(int $min)
    {
        $this->min = $min;
    }
}