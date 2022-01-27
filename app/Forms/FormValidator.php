<?php

namespace App\Forms;

use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

abstract class FormValidator
{
    protected ValidationFactory $validator;

    /**
     * Constructors
     *
     * @param ValidationFactory $validator
     */
    public function __construct(ValidationFactory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Get Rules
     *
     * @param array $data
     * @return array
     */
    abstract public function rules(array $data);

    /**
     * Get Validation Messages
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }

    /**
     * Get Custome Attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [];
    }

    /**
     * Validate Data
     *
     * @param array $data
     * @return bool
     * @throws ValidationException
     */
    public function validate(array $data)
    {
        return $this->validator->make(
            $data,
            $this->rules($data),
            $this->messages(),
            $this->attributes()
        )
            ->validate();
    }
}
