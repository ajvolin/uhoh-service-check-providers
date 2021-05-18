<?php

namespace UhOh\ServiceCheckProvider\Contracts;

use UhOh\ServiceCheckProvider\Configuration\Configuration;
use UhOh\ServiceCheckProvider\Result\Result;

interface CheckableService
{
    /**
     * Executes the service check.
     *
     * @param ?Configuration $configuration The configuration for the service check provider
     * @return Result
     */
    public function fire(?Configuration $configuration = null): Result;
}