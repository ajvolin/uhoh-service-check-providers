<?php

namespace UhOh\ServiceCheckProvider\Result;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * Class ResultDetail
 * @package UhOh/ServiceCheckProviders
 *
 */

class ResultDetail implements Arrayable, Jsonable
{
    /**
     * The name of the detail
     * 
     * @var string
     */
    private string $name;

    /**
     * The detail
     * 
     * @var string
     */
	private string $detail;
    
    /**
     * ResultDetail constructor.
     *
     * @param string $name The name of the detail
     * @param string $detail The value of the detail
     */
    public function __construct(string $name,
                                string $detail)
    {
        $this->name = $name;
        $this->detail = $detail;
    }

    /**
     * Get the name of the detail
     * 
     * @return int
     */
	public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of the detail
     * 
     * @return string
     */
	public function getDetail(): string
    {
        return $this->detail;    
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
	public function toArray(): array
    {
        return [
            'name' => $this->name,
            'detail' => $this->detail
        ];
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
