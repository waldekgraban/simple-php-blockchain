<?php

namespace Waldekgraban\SimplePhpBlockchain\Mine;

use Waldekgraban\SimplePhpBlockchain\Blockchain\Block;

class Mine
{
	public function __construct()
	{
		$this->block = new Block();
		$this->previousBlock = $this->getPreviousBlock();
	}

	public function getPreviousBlock()
	{
		return $this->block->print_previous_block();
	}

	public function getPreviousProof(): string
	{
		return $this->getDataFromArrayByKeyName($this->previousBlock, 'proof');
	}

	public function getDataFromArrayByKeyName(array $array, string $key): string
	{
		return $array[$key];
	}

	public function getBlockProof()
	{
		return $this->block->proof_of_work($this->previousBlock);
	}

	public function getPreviousHash()
	{
		return $this->block->hash($this->previousBlock);
	}

	public function createBlock()
	{
		return $this->block->create_block(
			$this->getBlockProof(), 
			$this->getPreviousHash()
		);
	}
}