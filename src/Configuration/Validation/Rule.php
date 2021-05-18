<?php

namespace UhOh\ServiceCheckProvider\Configuration\Validation;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Str;
use ReflectionObject;
use ReflectionProperty;

/**
 * Class Rule
 * @package UhOh/ServiceCheckProviders
 *
 */
abstract class Rule implements Arrayable, Jsonable
{
    /**
     * Validation rule name
     * 
     * @var string
     */
    protected string $name;

     /**
     * Convert the object to an array.
     *
     * @return array
     */
	public function toArray(): array
    {
        $arr = [$this->name => []];
        $props = (new ReflectionObject($this))->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($props as $prop) {
            $propName = $prop->getName();
            $propNameArrayKey = Str::snake($propName);
            if (isset($this->{$propName})) {
                $arr[$this->name][$propNameArrayKey] = $this->{$propName};
            } else {
                $arr[$this->name][$propNameArrayKey] = null;
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