<?php

namespace UhOh\ServiceCheckProvider\Configuration\Fields;

use UhOh\ServiceCheckProvider\Configuration\Fields\Field;
use UhOh\ServiceCheckProvider\Configuration\Validation\Url;

/**
 * Class UrlField
 * 
 * @package UhOh/ServiceCheckProvider
 */
class UrlField extends Field
{
    /**
     * Field type
     * 
     * @var string
     */
    protected string $type = 'url';

    /**
     * Validation rules
     * 
     * @var Rule[]
     */
    protected array $validationRules = [
        new Url
    ];
}