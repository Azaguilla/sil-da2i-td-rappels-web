<?php
/**
 * Un controller pour les contrôler tous
 * User: Laurie
 * Date: 14/11/2018
 * Time: 09:27
 */

class LordController
{
    function getBlock($file, $data = array())
    {
        require $file;
    }
}