<?php
/**
 * Created by PhpStorm.
 * User: dustinwoodard
 * Date: 12/4/13
 * Time: 6:49 PM
 */

namespace MC\Exceptions;


class UserIdInvalidException extends Exception {

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