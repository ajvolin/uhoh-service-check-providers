<?php

namespace UhOh\ServiceCheckProvider\Configuration\Fields;

use UhOh\ServiceCheckProvider\Configuration\Fields\NumberField;

/**
 * Class RangeField
 * 
 * @package UhOh/ServiceCheckProvider
 */
class RangeField extends NumberField
{
    /**
     * Field type
     * 
     * @var string
     */
    protected string $type = 'range';
}