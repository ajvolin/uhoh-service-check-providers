<?php

namespace UhOh\ServiceCheckProvider\Models;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * Class ServiceCheckResultDetail
 * @package UhOh/ServiceCheckProviders
 *
 */

class ServiceCheckResultDetail implements Arrayable, Jsonable
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
     * ServiceCheckResultDetail constructor.
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
        $arr = [
            'name' => $this->name,
            'detail' => $this->detail
        ];

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
