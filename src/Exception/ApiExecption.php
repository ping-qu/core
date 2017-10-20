<?php
/**
 * Created by PhpStorm.
 * User: yuelin
 * Date: 2017/10/20
 * Time: 下午3:51
 */

class ApiException extends \Exception
{
    private $message;
    private $error_id;
    private $code;

    function __construct($message = '', $error_id = 'ERROR', $code = 400)
    {
            parent::__construct($message,$code);
    }

    public function getHTTPStatus()
    {
        return $this->code;
    }


    public function getErrorId()
    {
        return $this->error_id;
    }

    public function getErrorMessage()
    {
        return empty($this->message)?'':$this->message;
    }

}