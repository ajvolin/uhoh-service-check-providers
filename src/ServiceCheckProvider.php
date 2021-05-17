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
    private string $serviceCheckProviderServiceClass;

    /**
     * @var string
     */
    private string $displayName;

    /**
     * @var ServiceCheckProviderConfigurationFields
     */
    private ServiceCheckProviderConfigurationFields $configurationFields;

    /**
     * @var CheckableService
     */
    private CheckableService $serviceCheckProviderService;

    /**
     * ServiceCheckProvider constructor.
     * @param string $name The name of the service check provider
     * @param string $serviceCheckProviderServiceClass The name of the class implementing the CheckableService contract
     * @param string $displayName The display name for the service check provider
     * @param ServiceCheckProviderConfigurationFields $configurationFields The configuration fields for the service check provider
     */
    public function __construct(string $name,
                                string $serviceCheckProviderServiceClass,
                                string $displayName,
                                ServiceCheckProviderConfigurationFields $configurationFields)
    {
        $this->name = $name;
        $this->serviceCheckProviderServiceClass = $serviceCheckProviderServiceClass;
        $this->displayName = $displayName;
        $this->configurationFields = $configurationFields;
    }

    /**
     * Returns an instantiated CheckableService
     *
     * @return CheckableService
     */
    public function getServiceCheckProviderService(): CheckableService
    {
        if (!isset($this->serviceCheckProviderService)) {
            $this->serviceCheckProviderService = new $this->serviceCheckProviderServiceClass;
        }
         
        return $this->serviceCheckProviderService;
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
     * @return ServiceCheckProviderConfigurationFields
     */
    public function getConfigurationFields(): ServiceCheckProviderConfigurationFields
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
            'name' => $this->sourceName,
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