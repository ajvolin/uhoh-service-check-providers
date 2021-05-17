<?php

namespace UhOh\ServiceCheckProvider\Contracts;

use UhOh\ServiceCheckProvider\Models\ServiceCheckProviderConfiguration;
use UhOh\ServiceCheckProvider\Models\ServiceCheckResult;

interface CheckableService
{
    /**
     * Executes the service check.
     *
     * @param ?ServiceCheckProviderConfiguration $configuration The configuration for the service check provider
     * @return ServiceCheckResult
     */
    public function fire(?ServiceCheckProviderConfiguration $configuration = null): ServiceCheckResult;
}