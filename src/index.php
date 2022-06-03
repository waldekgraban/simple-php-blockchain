<?php
/*
 *
 * Created by Waldemar Graban 2022
 *
 */

namespace Waldekgraban\SimplePhpBlockchain;

require_once "../vendor/autoload.php";

use Waldekgraban\SimplePhpBlockchain\Blockchain\Block;

//example of use

$blockchain = new Block();

function mine() {
    global $blockchain;
    $previous_block = $blockchain->print_previous_block();
    $previous_proof = $previous_block['proof'];

    $proof = $blockchain->proof_of_work($previous_proof);
    $previous_hash = $blockchain->hash($previous_block);
    $block = $blockchain->create_block($proof, $previous_hash);

    // var_dump($block);
    // die;

    echo "New Block has been created\n";
    echo "Index: " . $block['index'] . "\n";
    echo "Timestamp: " . $block['timestamp'] . "\n";
    echo "Proof: " . $block['proof'] . "\n";
    echo "Previous Hash: " . $block['previous_hash'] . "\n";
}

mine();
mine();