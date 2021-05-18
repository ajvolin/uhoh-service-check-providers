<?php

namespace UhOh\ServiceCheckProvider\Configuration\Fields;

use UhOh\ServiceCheckProvider\Configuration\Fields\Field;

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
}