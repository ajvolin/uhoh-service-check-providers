<?php

namespace UhOh\ServiceCheckProvider\Configuration\Fields;

use UhOh\ServiceCheckProvider\Configuration\Fields\Field;
use UhOh\ServiceCheckProvider\Configuration\Validation\Email;

/**
 * Class EmailField
 * 
 * @package UhOh/ServiceCheckProvider
 */
class EmailField extends Field
{
    /**
     * Field type
     * 
     * @var string
     */
    protected string $type = 'email';

    /**
     * Validation rules
     * 
     * @var Rule[]
     */
    protected array $validationRules = [
        new Email
    ];
}