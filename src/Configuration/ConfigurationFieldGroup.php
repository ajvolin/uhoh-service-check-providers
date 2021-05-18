<?php

namespace UhOh\ServiceCheckProvider\Configuration;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use UhOh\ServiceCheckProvider\Configuration\Fields\Field;

/**
 * Class ConfigurationFieldGroup
 * @package UhOh/ServiceCheckProviders
 *
 */
class ConfigurationFieldGroup implements Arrayable, Jsonable
{
    /**
     * Field group key (unique identifier)
     * 
     * @var string
     */
    public string $key;

    /** 
     * Field group label (optional)
     * 
     * @var string|null
     */
    public ?string $label;

    /** 
     * Field group description / help text (optional)
     * 
     * @var string|null
     */
    public ?string $description;

    /** 
     * Bind visibility of field group to other field value(s)
     * 
     * @var array
     */
    public array $bindGroupToFieldValue;

    /**
     * Field group is duplicable, i.e. multiple rows of same fields
     * 
     * @var bool
     */
    public bool $isDuplicable;

    /**
     * Field group duplication limit, i.e. max number of rows
     * 
     * @var int|null
     */
    public ?int $maxDuplicates;

    /** 
     * Configuration fields for this group
     * 
     * @var Field[]
     */
    public array $fields;

    /**
     * Adds a field to the group
     * 
     * @param Field $field
     */
    public function addField(Field $field): void
    {
        array_push($this->fields, $field);
    }

    /**
     * Gets the fields in the group
     * 
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
	public function toArray(): array
    {
        $arr = [
            'key' => $this->key,
            'label' => $this->label,
            'description' => $this->description,
            'bind_to_field' => $this->bindGroupToFieldValue,
            'is_duplicable' => $this->isDuplicable,
            'max_duplicates' => $this->maxDuplicates,
            'fields' => []
        ];

        foreach($this->fields as $field) {
            array_push($arr['fields'], $field);
        }
        
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