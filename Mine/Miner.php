<?php

namespace Waldekgraban\SimplePhpBlockchain\Mine;

use Waldekgraban\SimplePhpBlockchain\Mine\Mine;

class Miner
{
	public function __construct()
	{
		$this->mine = new Mine();
	}

	/**
	 * Example usage of blocks - show block info
	 */
	public function mine()
	{
		$block = $this->mine->createBlock();

		echo "New Block has been created" . "<br>";
	    echo "Index: " . $block['index'] . "<br>";
	    echo "Timestamp: " . $block['timestamp'] . "<br>";
	    echo "Proof: " . $block['proof'] . "<br>";
	    echo "Previous Hash: " . $block['previous_hash'] . "<br><br>";
	}
}