<?php

namespace Railken\LaraOre\Work\Attributes\MockData\Exceptions;

use Railken\LaraOre\Work\Exceptions\WorkAttributeException;

class WorkMockDataNotDefinedException extends WorkAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'mock_data';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'WORK_MOCK_DATA_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
