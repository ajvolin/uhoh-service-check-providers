<?php

namespace UhOh\ServiceCheckProvider\Configuration\Fields;

use UhOh\ServiceCheckProvider\Configuration\Fields\SelectField;
use UhOh\ServiceCheckProvider\Configuration\Validation\Max;

/**
 * Class MultiSelectField
 * 
 * @package UhOh/ServiceCheckProvider
 */
class MultiSelectField extends SelectField
{
    /**
     * Max options
     * 
     * @var int
     */
    public int $maxOptions;

    /**
     * Constructor for MultiSelectField
     * 
     * @param array $options The options for the select field
     * @param int $maxOptions The maximum number of options that can be selected
     */
    public function __construct(array $options, ?int $maxOptions = null)
    {
        parent::__construct($options);
        if (isset($maxOptions)) {
            $this->maxOptions = $maxOptions;

            $this->addRule(new Max($maxOptions));
        }
    }
}