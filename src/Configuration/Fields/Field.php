<?php

namespace UhOh\ServiceCheckProvider\Configuration\Fields;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Str;
use ReflectionObject;
use ReflectionProperty;

/**
 * Class Field
 * @package UhOh/ServiceCheckProviders
 *
 */
abstract class Field implements Arrayable, Jsonable
{
    /**
     * Field type
     * 
     * @var string
     */
    protected string $type;

    /**
     * Field key (unique identifier)
     * 
     * @var string
     */
    public string $key;

    /** 
     * Field label
     * 
     * @var string
     */
    public string $label;

    /** 
     * Field description / help text
     * 
     * @var string
     */
    public string $description;

    /**
     * Field placeholder
     * 
     * @var string
     */
    public string $placeholder;

    /**
     * Field default value
     * 
     * @var string
     */
    public string $defaultValue;

    /**
     * Field is required
     * 
     * @var bool
     */
    public bool $required;

    /** 
     * Bind field to other field value
     * 
     * @var array
     */
    public array $bindToFieldValue;

    /**
     * Validation rules
     * 
     * @var array
     */
    public array $validationRules;

     /**
     * Convert the object to an array.
     *
     * @return array
     */
	public function toArray(): array
    {
        $arr = [
            'type' => $this->type
        ];
        $props = (new ReflectionObject($this))->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($props as $prop) {
            $propName = $prop->getName();
            $propNameArrayKey = Str::snake($propName);
            if (isset($this->{$propName})) {
                $arr[$propNameArrayKey] = $this->{$propName};
            } else {
                $arr[$propNameArrayKey] = null;
            }
        }

        ksort($arr);

        return $arr;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0): string
    {
        return json_encode($this->toArray(), $options);
    }
}