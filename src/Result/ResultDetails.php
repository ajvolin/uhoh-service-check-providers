<?php

namespace UhOh\ServiceCheckProvider\Result;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use UhOh\ServiceCheckProvider\Exceptions\ServiceCheckResultDetailError;
use UhOh\ServiceCheckProvider\Helpers\ToJsonTrait;
use UhOh\ServiceCheckProvider\Result\ResultDetail;

/**
 * Class ResultDetails
 * @package UhOh/ServiceCheckProviders
 *
 */

class ResultDetails implements Arrayable, Jsonable
{
    use ToJsonTrait;

    /**
     * Array of service check result details
     * 
     * @var ResultDetail[]
     */
    private array $ResultDetails;
    
    /**
     * ResultDetails constructor.
     *
     * @param ResultDetail[] $ResultDetails Array of details
     */
    public function __construct(?array $ResultDetails = null)
    {
        if (!is_null($ResultDetails)) {
            foreach($ResultDetails as $detail) {
                if($detail instanceof ResultDetail) {
                    array_push($this->ResultDetails, $detail);
                } else {
                    throw new ServiceCheckResultDetailError(
                        "Detail in ResultDetails array is not an instance of ResultDetail."
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
	public function addResultDetail(ResultDetail $detail): void
    {
        array_push($this->ResultDetails, $detail);
    }

    /**
     * Get the value of the detail
     * 
     * @return string
     */
	public function getResultDetails(): array
    {
        return $this->ResultDetails;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
	public function toArray(): array
    {
        $arr = [];

        foreach ($this->ResultDetails as $detail) {
            array_push($arr, $detail->toArray());
        }

        return $arr;
    }
}
