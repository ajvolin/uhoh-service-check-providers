<?php

namespace UhOh\ServiceCheckProvider\Configuration\Validation;

use UhOh\ServiceCheckProvider\Configuration\Validation\Rule;

/**
 * Class Length
 * 
 * @package UhOh/ServiceCheckProvider
 */
class Length extends Rule
{
    /**
     * Rule name
     * 
     * @var string
     */
    protected string $name = 'length';

    /**
     * Length
     * 
     * @var int
     */
    public int $length;

    /**
     * Rule constructor
     * 
     * @param int $length
     */
    public function __construct(int $length)
    {
        $this->length = $length;
    }
}