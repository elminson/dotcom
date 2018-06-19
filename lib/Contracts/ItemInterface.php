<?php

namespace DotCom\Contracts;

/**
 * Created by edeoleo@gmail.com.
 * User: Elminson De Oleo Baez
 * Date: 6/15/2018
 * Time: 7:28 PM
 */

interface ItemInterface
{
    /**
     * @return int The price of the individual item
     */
    public function getAmount();

}
