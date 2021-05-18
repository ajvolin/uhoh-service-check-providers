<?php

namespace UhOh\ServiceCheckProvider\Configuration\Fields;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Arr;
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
     * Field key (unique identifier)
     * 
     * @var string
     */
    private string $key;

    /**
     * Field type
     * 
     * @var string
     */
    protected string $type;

    /**
     * Validation rules
     * 
     * @var Rule[]
     */
    protected array $validationRules = [];

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
     * The constructor for the Field class
     * 
     * @param string $key The unique identifier for the field
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * Gets the field key
     * 
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Adds a validation rule for the field
     * 
     * @param Rule $rule The rule to add
     */
    public function addRule($rule): void
    {
        array_push($this->validationRules, $rule);
    }

    /**
     * Gets the validation rules for the field
     * 
     * @return Rule[]
     */
    public function getRules(): array
    {
        return $this->validationRules;
    }

     /**
     * Convert the object to an array.
     *
     * @return array
     */
	public function toArray(): array
    {
        $arr = [
            'type' => $this->type,
            'key' => $this->key,
            'rules' => []
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

        foreach ($this->validationRules as $rule) {
            array_push($arr['rules'], $rule->toArray());
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