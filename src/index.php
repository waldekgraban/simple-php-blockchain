<?php
/*
 *
 * Created by Waldemar Graban 2022
 *
 */

namespace Waldekgraban\SimplePhpBlockchain;

require_once "../vendor/autoload.php";

use Waldekgraban\SimplePhpBlockchain\Mine\Miner;

//example of use

$miner = new Miner();

$miner->mine();
$miner->mine();