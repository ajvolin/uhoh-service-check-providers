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
    private string $key;

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
     * Bind visibility of field group to other fields
     * Format for array values is group_key.field_key => field value
     * where group_key starts at the top level of the configuration fields
     * object and traversed down to the desired group/field
     * 
     * @var array
     */
    public array $bindGroupToFieldValue = [];

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
    public array $fields = [];

    /** 
     * Nested field groups
     * 
     * @var ConfigurationFieldGroup[]
     */
    public array $nestedGroups = [];

    /**
     * The constructor for the ConfigurationFieldGroup class
     * 
     * @param string $key The unique identifier for the field group
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

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
     * Gets the group key
     * 
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Adds a nested group to the current group
     * 
     * @param ConfigurationFieldGroup $group
     */
    public function addNestedGroup(ConfigurationFieldGroup $group): void
    {
        array_push($this->nestedGroups, $group);
    }

    /**
     * Gets the nested field groups in the current group
     * 
     * @return ConfigurationFieldGroup[]
     */
    public function getNestedGroups(): array
    {
        return $this->nestedGroups;
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
            'label' => $this->label ?? null,
            'description' => $this->description ?? null,
            'bind_to' => $this->bindGroupToFieldValue,
            'is_duplicable' => $this->isDuplicable,
            'max_duplicates' => $this->maxDuplicates ?? 0,
            'fields' => [],
            'groups' => []
        ];

        foreach($this->fields as $field) {
            $arr['fields'][$field->getKey()] = $field->toArray();
        }

        foreach($this->nestedGroups as $group) {
            $arr['groups'][$group->getKey()] = $group->toArray();
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