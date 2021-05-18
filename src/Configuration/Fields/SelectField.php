<?php

namespace UhOh\ServiceCheckProvider\Configuration\Fields;

use UhOh\ServiceCheckProvider\Configuration\Fields\Field;

/**
 * Class SelectField
 * 
 * @package UhOh/ServiceCheckProvider
 */
class SelectField extends Field
{
    /**
     * Field type
     * 
     * @var string
     */
    protected string $type = 'select';

    /**
     * Select options
     * 
     * @var array
     */
    public array $options;
}