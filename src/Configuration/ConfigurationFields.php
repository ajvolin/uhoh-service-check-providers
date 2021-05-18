<?php

namespace UhOh\ServiceCheckProvider\Configuration;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Arr;
use UhOh\ServiceCheckProvider\Configuration\ConfigurationFieldGroup;
use UhOh\ServiceCheckProvider\Exceptions\ServiceCheckConfigurationError;

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
    private array $groups = [];

    // /** 
    //  * Validates configuration
    //  * 
    //  * @return bool
    //  */
    // public function validateConfiguration(): bool
    // {
    //     $config = $this->toArray();
    //     foreach ($config as $k => $v) {

    //     }
    // }

    /**
     * Adds a group to the configuration
     * 
     * @param ConfigurationFieldGroup $group
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
    public function getGroups(): array
    {
        // if (!$this->validateConfiguration()) {
        //     throw new ServiceCheckConfigurationError(
        //         "The configuration fields are invalid. This is caused by invalid binds to field paths."
        //     );
        // }
        return $this->groups;
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
            $arr[$group->getKey()] = $group->toArray();
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