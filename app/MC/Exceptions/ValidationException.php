<?php namespace MC\Exceptions;


use Exception;

class ValidationException extends Exception {

    protected  $errors;
    protected  $message;

    public function __construct($message, $errors, $code=0, Exception $previous = null){

        $this->errors = $errors;
        $this->message = $message;

        parent::__construct($message,$code,$previous);

    }

    public function getErrors(){
        return $this->errors;
    }
} 