<?php

abstract class AbstractModel{
    private ?InterfaceBdd $bdd;

    public function __construct(?InterfaceBdd $bdd){
        $this->bdd = $bdd;
    }

    /**
     * Get the value of bdd
     */
    public function getBdd(): InterfaceBdd
    {
        return $this->bdd;
    }

    /**
     * Set the value of bdd
     */
    public function setBdd(InterfaceBdd $bdd): self
    {
        $this->bdd = $bdd;

        return $this;
    }

    
    public abstract function addAccount(): void;

    public abstract function updateAccount(): void;

    public abstract function deleteAccount(): void;

    public abstract function getAllAccount(): array|null;

    public abstract function getAccountById(): array|null;


}