<?php

namespace DotCom\Contracts;

/**
 * Created by edeoleo@gmail.com.
 * User: Elminson De Oleo Baez
 * Date: 6/15/2018
 * Time: 7:28 PM
 */

interface LoggerInterface
{
    /**
     * @param $message
     * @return mixed
     */
    public function log_message($message);

    /**
     * @param $e
     * @return mixed
     */
    public function Log($e);

    /**
     * @return mixed
     */
    public function LineSeparator();
}
