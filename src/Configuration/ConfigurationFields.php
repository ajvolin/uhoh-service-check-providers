<?php

namespace UhOh\ServiceCheckProvider\Configuration;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use UhOh\ServiceCheckProvider\Configuration\ConfigurationFieldGroup;

/**
 * Class ConfigurationFields
 * @package UhOh/ServiceCheckProviders
 *
 */
class ConfigurationFields implements Arrayable, Jsonable
{
    /** 
     * Configuration field groups
     * 
     * @var ConfigurationFieldGroup[]
     */
    public array $groups;

    /**
     * Adds a group to the configuration
     * 
     * @param  $group
     */
    public function addGroup(ConfigurationFieldGroup $group): void
    {
        array_push($this->groups, $group);
    }

    /**
     * Gets the field groups for the configuration
     * 
     * @return ConfigurationFieldGroup[]
     */
    public function getGroup(): array
    {
        return $this->group;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
	public function toArray(): array
    {
        $arr = [];

        foreach($this->groups as $group) {
            $arr[$group->key] = $group->toArray();
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