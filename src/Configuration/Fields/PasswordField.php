<?php

namespace UhOh\ServiceCheckProvider\Configuration\Fields;

use UhOh\ServiceCheckProvider\Configuration\Fields\Field;

/**
 * Class PasswordField
 * 
 * @package UhOh/ServiceCheckProvider
 */
class PasswordField extends Field
{
    /**
     * Field type
     * 
     * @var string
     */
    protected string $type = 'password';
}