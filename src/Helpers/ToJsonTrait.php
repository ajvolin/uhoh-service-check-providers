<?php

namespace UhOh\ServiceCheckProvider\Helpers;

/**
 * Trait ToJsonTrait
 * 
 * @package UhOh/ServiceCheckProviders
 */
trait ToJsonTrait
{
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