<?php

namespace UhOh\ServiceCheckProvider;

use UhOh\ServiceCheckProvider\ServiceCheckProvider;
use UhOh\ServiceCheckProvider\Exceptions\ServiceCheckProviderException;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class ServiceCheckProviders implements Arrayable, Jsonable
{
    /**
     * Array of registered service check providers
     * 
     * @var ServiceCheckProvider[]
     */
    private array $serviceCheckProviders = [];

    /**
     * Registers a service check provider
     *
     * @param ServiceCheckProvider $serviceCheckProvider
     * @return void
     */
    public function registerServiceCheckProvider(
        ServiceCheckProvider $serviceCheckProvider): void
    {
        try {
            if (!array_key_exists($serviceCheckProvider->getName(), $this->serviceCheckProviders)) {
                $this->serviceCheckProviders[$serviceCheckProvider->getName()] = $serviceCheckProvider;
                ksort($this->serviceCheckProviders);
            } else {
                throw new ServiceCheckProviderException(
                    "Service check provider with name {$serviceCheckProvider->getName()} already exists."
                );
            }
        } catch (ServiceCheckProviderException $e) {
            report($e);
        }
    }

    /**
     * Returns the requested service check provider
     *
     * @param string $serviceCheckProviderName
     * @return ServiceCheckProvider
     */
    public function getServiceCheckProvider(
        string $serviceCheckProviderName): ServiceCheckProvider
    {
        if (array_key_exists($serviceCheckProviderName, $this->serviceCheckProviders)) {
            return $this->serviceCheckProviders[$serviceCheckProviderName];
        } else {
            throw new ServiceCheckProviderException(
                "Service check provider with name {$serviceCheckProviderName} does not exist."
            );
        }
    }
    
    /**
     * Returns all registered service check providers
     *
     * @return ServiceCheckProvider[]
     */
    public function getServiceCheckProviders(): array
    {
        return $this->serviceCheckProviders;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $arr = ['providers' => []];

        foreach ($this->serviceCheckProviders as $k => $v) {
            $arr['providers'][$k] = $v->toArray();
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