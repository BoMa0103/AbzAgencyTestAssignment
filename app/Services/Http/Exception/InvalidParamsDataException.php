<?php

namespace App\Services\Http\Exception;

class InvalidParamsDataException extends HttpClientException
{
    protected array $errors;

    public function __construct(array $errors)
    {
        $this->errors = $errors;
        parent::__construct('Invalid Params');
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getErrorsMessage(): string
    {
        return $this->getErrors()['message'] ?? $this->getMessage();
    }
}
