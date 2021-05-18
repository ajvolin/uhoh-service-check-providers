<?php

namespace UhOh\ServiceCheckProvider\Configuration;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Arr;
use UhOh\ServiceCheckProvider\Configuration\ConfigurationFieldGroup;
use UhOh\ServiceCheckProvider\Exceptions\ServiceCheckConfigurationError;
use UhOh\ServiceCheckProvider\Helpers\ToJsonTrait;

/**
 * Class ConfigurationFields
 * @package UhOh/ServiceCheckProviders
 *
 */
class ConfigurationFields implements Arrayable, Jsonable
{
    use ToJsonTrait;

    /** 
     * Configuration field groups
     * 
     * @var ConfigurationFieldGroup[]
     */
    private array $groups = [];

    /**
     * Gets all bound fields in a configuration
     * 
     * @param ConfigurationFieldGroup[] $groups The groups to search
     * @return array Array of bound fields
     */
    private function getBoundFields(array $groups): array
    {
        $boundFields = [];
        
        foreach($groups as $group) {
            $boundFields = array_merge(
                $boundFields,
                $group->bindGroupToFieldValue,
                $this->getBoundFields($group->nestedGroups)
            );
        }

        return $boundFields;
    }

    /** 
     * Validates configuration
     * 
     * @return bool
     */
    public function validateConfiguration(): bool
    {
        $error = false;

        $boundFields = $this->getBoundFields($this->groups);
        $config = Arr::dot($this->toArray());
        
        foreach ($boundFields as $field) {
            if (!Arr::has($config, $boundFields)) {
                $error = true;
                break;
            }
        }

        return $error;
    }

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
        if (!$this->validateConfiguration()) {
            throw new ServiceCheckConfigurationError(
                "The configuration fields are invalid. This is caused by invalid binds to field paths."
            );
        }
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
            $arr[$group->key] = $group->toArray();
        }
        
        return $arr;
    }
}