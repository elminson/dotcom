<?php

namespace DotCom\Utils;

use DotCom\Contracts\LoggerInterface;


class Logger implements LoggerInterface
{

    public function log_message($message)
    {
        if (is_string($message)) {
            file_put_contents("Logclass.txt", date("Y-m-d H:i:s") . " " . $message . "\n", FILE_APPEND);
        }
    }

    /**
     * Logs the passed object, string, or Throwable instance to the console.
     *
     * @param $e
     */
    public function Log($e)
    {
        $msg = self::LineSeparator();
        $msg .= "Message: " . $e->getMessage() . "\n\n";
        $msg .= "File: " . $e->getFile() . "\n\n";
        $msg .= "Line: " . $e->getLine() . "\n\n";
        $msg .= "Trace: \n" . $e->getTraceAsString() . "\n\n";
        $msg .= self::LineSeparator();
        self::log_message($msg);
    }

    /**
     * Outputs a separator line to log.
     *
     * @param int $length Length of the line separator.
     * @param string $character Character to use as separator.
     * @return string
     */
    public function LineSeparator($length = 40, $character = '-')
    {
        $break = str_repeat($character, $length);
        return ("{$break}\n");
    }
}