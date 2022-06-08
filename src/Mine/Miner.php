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
	public function mineOnce()
	{
		$block = $this->mine->createBlock();

		echo "New Block has been created" . "<br>";
	    echo "Index: " . $block['index'] . "<br>";
	    echo "Timestamp: " . $block['timestamp'] . "<br>";
	    echo "Proof: " . $block['proof'] . "<br>";
	    echo "Previous Hash: " . $block['previous_hash'] . "<br><br>";
	}

	public function mine()
	{
		
		for ($i=0; $i < $this->getQuantityOfBlock() +1; $i++) { 
		
			$block = $this->mine->createBlock();

			echo "New Block has been created" . "<br>";
		    echo "Index: " . $block['index'] . "<br>";
		    echo "Timestamp: " . $block['timestamp'] . "<br>";
		    echo "Proof: " . $block['proof'] . "<br>";
		    echo "Previous Hash: " . $block['previous_hash'] . "<br><br>";
		}
		
	}

	public function setQuantityOfBlock(int $blockQty): void
	{
		$this->blockQty = $blockQty;
	}

	public function getQuantityOfBlock(): int
	{
		if(isset($this->blockQty)){
			return $this->blockQty;
		}

		return 1;
	}
}
