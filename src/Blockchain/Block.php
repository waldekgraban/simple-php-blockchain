<?php
/*
 *
 * Created by Waldemar Graban 2022
 *
 */

namespace Waldekgraban\SimplePhpBlockchain\Blockchain;

class Block extends Blockchain
{
    public function __construct()
    {
        $this->constructBlock();
    }
}