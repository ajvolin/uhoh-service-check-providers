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

    /**
     * Constructor for SelectField
     * 
     * @param string $key The unique identifier for the field
     * @param array $options The options for the select field
     */
    public function __construct(string $key, array $options)
    {
        parent::__construct($key);
        $this->options = $options;
    }
}