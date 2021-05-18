<?php

namespace UhOh\ServiceCheckProvider\Configuration\Validation;

use UhOh\ServiceCheckProvider\Configuration\Validation\Rule;

/**
 * Class Max
 * 
 * @package UhOh/ServiceCheckProvider
 */
class Max extends Rule
{
    /**
     * Rule name
     * 
     * @var string
     */
    protected string $name = 'max';

    /**
     * Maximum length
     * 
     * @var int
     */
    public int $max;

    /**
     * Rule constructor
     * 
     * @param int $max
     */
    public function __construct(int $max)
    {
        $this->max = $max;
    }
}