<?php

namespace UhOh\ServiceCheckProvider\Configuration\Validation;

use UhOh\ServiceCheckProvider\Configuration\Validation\Rule;
use UhOh\ServiceCheckProvider\Exceptions\ServiceCheckValidationRuleError;

/**
 * Class Regex
 * 
 * @package UhOh/ServiceCheckProvider
 */
class Regex extends Rule
{
    /**
     * Rule name
     * 
     * @var string
     */
    protected string $name = 'regex';

    /**
     * Pattern
     * 
     * @var int
     */
    public string $pattern;

    /**
     * Rule constructor
     * 
     * @param int $pattern
     */
    public function __construct(string $pattern)
    {
        try {
            preg_match($pattern, '');
            $this->pattern = $pattern;
        } catch (\Throwable $e) {
            throw new ServiceCheckValidationRuleError(
                "The pattern {$pattern} is invalid.\n{$e}"
            );
        }
    }
}