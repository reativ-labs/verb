<?php namespace Reativ\Verb\Http\Exceptions;

class InternalServerErrorException extends HttpException {

    public function __construct(string $description = null) {
        parent::__construct(500, 'Internal Server Error', $description);
    }
}