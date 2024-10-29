<?php

namespace GraphQL\Exception;

use RuntimeException;

/**
 * This exception is triggered when the GraphQL endpoint returns an error in the provided query
 *
 * Class QueryError
 *
 * @package GraphQl\Exception
 */
class QueryError extends RuntimeException
{
    /**
     * @var array|object
     */
    protected $errorDetails;
    /**
     * @var array|object
     */
    protected $data;
    /**
     * @var array
     */
    protected $errors;

    /**
     * QueryError constructor.
     *
     * @param array|object $errorDetails
     */
    public function __construct($errorDetails, $asArray = false)
    {
        $this->data = [];
        if ($asArray && !empty($errorDetails['data'])) {
            $this->data = $errorDetails['data'];
        } else if (!$asArray && !empty($errorDetails->data)) {
            $this->data = $errorDetails->data;
        }
        $this->errors = $asArray ? $errorDetails['errors'] : $errorDetails->errors;
        $this->errorDetails = $this->errors[0];
        parent::__construct($asArray ? $this->errorDetails['message'] : $this->errorDetails->message);
    }

    /**
     * @return array|object
     */
    public function getErrorDetails()
    {
        return $this->errorDetails;
    }

    /**
     * @return array|object
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
