<?php

namespace UhOh\ServiceCheckProvider\Models;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use UhOh\ServiceCheckProvider\Models\ServiceCheckResultDetails;

/**
 * Class ServiceCheckResult
 * @package UhOh/ServiceCheckProviders
 *
 */

class ServiceCheckResult implements Arrayable, Jsonable
{
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
     * @var ServiceCheckResultDetails
     */
	private ?ServiceCheckResultDetails $resultDetails;
    
    /**
     * ServiceCheckResult constructor.
     *
     * @param int $status The status of the service check
     * @param string $formattedResult The formatted service check result
     * @param string $rawResult The raw service check result
     * @param ?ServiceCheckResultDetails $resultDetails Service check result details
     */
    public function __construct(int $status,
                                string $formattedResult,
                                string $rawResult,
                                ?ServiceCheckResultDetails $resultDetails = null)
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
     * @return ServiceCheckResultDetails
     */
	public function getResultDetails(): ServiceCheckResultDetails
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
        $arr = [
            'status' => $this->status,
            'formatted_result' => $this->formattedResult,
            'raw_result' => $this->rawResult
        ];

        if (!is_null($this->resultDetails)) {
            $arr['result_details'] = $this->resultDetails->toArray();
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
