<?php

namespace UhOh\ServiceCheckProvider\Configuration\Fields;

use UhOh\ServiceCheckProvider\Configuration\Fields\SelectField;

/**
 * Class MultiSelectField
 * 
 * @package UhOh/ServiceCheckProvider
 */
class MultiSelectField extends SelectField
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
     * Max options
     * 
     * @var int
     */
    public int $maxOptions;
}