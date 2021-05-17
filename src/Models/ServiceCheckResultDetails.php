<?php

namespace UhOh\ServiceCheckProvider\Models;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use UhOh\ServiceCheckProvider\Exceptions\ServiceCheckResultDetailError;
use UhOh\ServiceCheckProvider\Models\ServiceCheckResultDetail;

/**
 * Class ServiceCheckResultDetails
 * @package UhOh/ServiceCheckProviders
 *
 */

class ServiceCheckResultDetails implements Arrayable, Jsonable
{
    /**
     * Array of service check result details
     * 
     * @var ServiceCheckResultDetail[]
     */
    private array $serviceCheckResultDetails;
    
    /**
     * ServiceCheckResultDetails constructor.
     *
     * @param ServiceCheckResultDetail[] $serviceCheckResultDetails Array of details
     */
    public function __construct(?array $serviceCheckResultDetails = null)
    {
        if (!is_null($serviceCheckResultDetails)) {
            foreach($serviceCheckResultDetails as $detail) {
                if($detail instanceof ServiceCheckResultDetail) {
                    array_push($this->serviceCheckResultDetails, $detail);
                } else {
                    throw new ServiceCheckResultDetailError(
                        "Detail in serviceCheckResultDetails array is not an instance of ServiceCheckResultDetail."
                    );
                }
            }
        }
    }

    /**
     * Add a result detail
     * 
     * @return int
     */
	public function addResultDetail(ServiceCheckResultDetail $detail): void
    {
        array_push($this->serviceCheckResultDetails, $detail);
    }

    /**
     * Get the value of the detail
     * 
     * @return string
     */
	public function getResultDetails(): array
    {
        return $this->serviceCheckResultDetails;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
	public function toArray(): array
    {
        $arr = [];

        foreach ($this->serviceCheckResultDetails as $detail) {
            array_push($arr, $detail->toArray());
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
