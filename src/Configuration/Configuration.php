<?php

namespace UhOh\ServiceCheckProvider\Configuration;

/**
 * Class Configuration
 * @package UhOh/ServiceCheckProviders
 *
 */
class Configuration
{
    /**
     * Configuration array
     * 
     * @var array
     */
    private array $configuration;
    
    /**
     * Configuration constructor.
     *
     * @param array $configuration Configuration array
     */
    public function __construct(array $configuration = [])
    {
        $this->configuration =
            $configuration;
    }

    /**
     * Get the configuration
     * 
     * @return string
     */
	public function getConfiguration(): array
    {
        return $this->configuration;
    }
}
