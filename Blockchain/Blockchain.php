<?php
/*
 *
 * Created by Waldemar Graban 2022
 *
 */

namespace Waldekgraban\SimplePhpBlockchain\Blockchain;

abstract class Blockchain
{
    protected $chain;
    protected $difficulty;

    private const CRYPTOGRAPHIC_METHOD = 'sha256';

    public const DEFAULT_CHAIN_VALUE = [];
    public const DEFAULT_PROOF_VALUE = 1;
    public const DEFAULT_CHAIN_DIFFICULT = 4;
    public const DEFAULT_PREVIOUS_HASH = '0';

    protected function constructBlock(): void
    {
        $this->chain = self::DEFAULT_CHAIN_VALUE;
        $this->difficulty = self::DEFAULT_CHAIN_DIFFICULT;

        $this->create_block(
            self::DEFAULT_PROOF_VALUE,
            self::DEFAULT_PREVIOUS_HASH
        );
    }

	public function create_block(string $proof, string $previous_hash): array
    {
        $block = $this->composeSingleBlock($proof, $previous_hash);
        $this->connectBlocks($block);

        return $block;
    }

    private function connectBlocks(array $block): void
    {
        array_push($this->chain, $block);
    }

    protected function composeSingleBlock(string $proof, string $previous_hash): array
    {
        return [
            'index' => $this->get_chain_length() + 1, 
            'timestamp' => time(),
            'proof' => $proof,
            'previous_hash' => $previous_hash
        ];
    }

    public function print_previous_block(): array
    {
        return $this->chain[$this->get_chain_length() - 1];
    }

    public function proof_of_work($previous_proof): int
    {
        $new_proof = self::DEFAULT_PROOF_VALUE;
        $check_proof = false;
        for($i = 0; $i < $this->difficulty; $i++){
            $needle = @$needle."0";
        }

        while($check_proof == false){
            $hash_operation = hash('sha256', $new_proof ** 2 - $previous_proof ** 2);
            $str = substr_count($hash_operation, $needle, 0, $this->difficulty);
            if($str > 0){
                $check_proof = true;
            }else{
                $new_proof += 1;
            }
        }

        return $new_proof;
    }

    public function hash(array $block): string
    {
        return hash(self::CRYPTOGRAPHIC_METHOD, json_encode($block));
    }

    public function isChainValid($chain): bool
    {
        $previous_block = $chain[0];
        $block_index = 1;
        $chain_length = 0;
        foreach($chain as $ch){
            $chain_length += 1;
        }
        for($i = 0; $i < $this->difficulty; $i++){
            $needle = @$needle."0";
        }

        while($block_index < $chain_length){
            $block = $chain[$block_index];
            if($block['previous_hash'] != $this->hash($previous_block)){
                return false;
            }

            $previous_proof = $previous_block['proof'];
            $proof = $block['proof'];
            $hash_operation = hash(self::CRYPTOGRAPHIC_METHOD, $proof ** 2 - $previous_proof ** 2);
            $str = substr_count($hash_operation, $needle, 0, $this->difficulty);

            if($str <= 0){
                return false;
            }

            $previous_block = $block;
            $block_index += 1;
        }
        return true;
    }

    function get_chain_length(): int
    {
        return count($this->chain);
    }
}