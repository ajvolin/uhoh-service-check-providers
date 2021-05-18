<?php

namespace UhOh\ServiceCheckProvider;

use UhOh\ServiceCheckProvider\Contracts\CheckableService;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class ServiceCheckProvider implements Arrayable, Jsonable
{
    /**
     * @var string
     */
    private string $name;
    
    /**
     * @var string
     */
    private string $serviceClass;

    /**
     * @var string
     */
    private string $displayName;

    /**
     * @var ConfigurationFields
     */
    private ConfigurationFields $configurationFields;

    /**
     * @var CheckableService
     */
    private CheckableService $service;

    /**
     * ServiceCheckProvider constructor.
     * @param string $name The name of the service check provider
     * @param string $serviceClass The name of the class implementing the CheckableService contract
     * @param string $displayName The display name for the service check provider
     * @param ConfigurationFields $configurationFields The configuration fields for the service check provider
     */
    public function __construct(string $name,
                                string $serviceClass,
                                string $displayName,
                                ConfigurationFields $configurationFields)
    {
        $this->name = $name;
        $this->serviceClass = $serviceClass;
        $this->displayName = $displayName;
        $this->configurationFields = $configurationFields;
    }

    /**
     * Returns an instantiated CheckableService
     *
     * @return CheckableService
     */
    public function getService(): CheckableService
    {
        if (!isset($this->service)) {
            $this->service = new $this->serviceClass;
        }
         
        return $this->service;
    }

    /**
     * Returns the name for the service check provider
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns the display name for the service check provider
     *
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * Returns the configuration fields for the service check provider
     *
     * @return ConfigurationFields
     */
    public function getConfigurationFields(): ConfigurationFields
    {
        return $this->configurationFields;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'display_name' => $this->displayName,
            'configuration_fields' => $this->configurationFields
        ];
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