<?php

namespace UhOh\ServiceCheckProvider\Configuration\Validation;

use UhOh\ServiceCheckProvider\Configuration\Validation\Rule;

/**
 * Class Alphanumeric
 * 
 * @package UhOh/ServiceCheckProvider
 */
class Alphanumeric extends Rule
{
    /**
     * Rule name
     * 
     * @var string
     */
    protected string $name = 'alpha_num';
}