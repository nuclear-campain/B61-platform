<?php

namespace App\Exceptions;

use Exception;

/**
 * Class MakeUserException 
 * 
 * @package App\Exceptions
 */
class MakeUserException extends Exception
{
    /**
     * The supplied email is invalid.
     *
     * @param  string $email The given email address for the user. 
     * @return \App\Exceptions\MakeUserException
     */
    public static function invalidEmail($email): MakeUserException
    {
        return new static("The email address [{$email}] is invalid");
    }
    /**
     * The supplied email already exists.
     *
     * @param  string $email The given email address for the user. 
     * @return \App\Exceptions\MakeUserException
     */
    public static function emailExists($email): MakeUserException
    {
        return new static("A user with the email address {$email} already exists");
    }
}
