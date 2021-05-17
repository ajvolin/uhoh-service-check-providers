<?php

namespace UhOh\ServiceCheckProvider\Models;

/**
 * Class ServiceCheckProviderConfiguration
 * @package UhOh/ServiceCheckProviders
 *
 */

class ServiceCheckProviderConfiguration
{
    /**
     * Configuration array
     * 
     * @var array
     */
    private array $serviceCheckProviderConfiguration;
    
    /**
     * ServiceCheckProviderConfiguration constructor.
     *
     * @param array $serviceCheckProviderConfiguration Configuration array
     */
    public function __construct(array $serviceCheckProviderConfiguration = [])
    {
        $this->serviceCheckProviderConfiguration =
            $serviceCheckProviderConfiguration;
    }

    /**
     * Get the configuration
     * 
     * @return string
     */
	public function getConfiguration(): array
    {
        return $this->serviceCheckProviderConfiguration;
    }
}
