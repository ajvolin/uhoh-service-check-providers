<?php

namespace UhOh\ServiceCheckProvider\Result;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use UhOh\ServiceCheckProvider\Helpers\ToJsonTrait;
use UhOh\ServiceCheckProvider\Result\ResultDetails;

/**
 * Class Result
 * @package UhOh/ServiceCheckProviders
 *
 */

class Result implements Arrayable, Jsonable
{
    use ToJsonTrait;

    /**
     * The status of the service
     * 
     * @var int
     */
    private int $status;

    /**
     * The formatted result of the service check
     * 
     * @var string
     */
	private string $formattedResult;

    /**
     * The raw result of the service check
     * 
     * @var string
     */
	private string $rawResult;

    /**
     *  Result details
     * 
     * @var ResultDetails
     */
	private ?ResultDetails $resultDetails;
    
    /**
     * Result constructor.
     *
     * @param int $status The status of the service check
     * @param string $formattedResult The formatted service check result
     * @param string $rawResult The raw service check result
     * @param ResultDetails|null $resultDetails Service check result details
     */
    public function __construct(int $status,
                                string $formattedResult,
                                string $rawResult,
                                ?ResultDetails $resultDetails = null)
    {
        $this->status = $status;
        $this->formattedResult = $formattedResult;
        $this->rawResult = $rawResult;
        $this->$resultDetails = $resultDetails;
    }

    /**
     * Get the status of the service
     * 
     * @return int
     */
	public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * Get the formatted result of the service check
     * 
     * @return string
     */
	public function getFormattedResult(): string
    {
        return $this->formattedResult;    
    }

    /**
     * Get the raw result of the service check
     * 
     * @return string
     */
	public function getRawResult(): string
    {
        return $this->rawResult;    
    }

    /**
     * Get the raw result of the service check
     * 
     * @return ResultDetails
     */
	public function getResultDetails(): ResultDetails
    {
        return $this->resultDetails;    
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
	public function toArray(): array
    {
        return [
            'status' => $this->status,
            'formatted_result' => $this->formattedResult,
            'raw_result' => $this->rawResult,
            'result_details' =>
                !is_null($this->resultDetails) ?
                    $this->resultDetails->toArray() : null
        ];
    }
}
