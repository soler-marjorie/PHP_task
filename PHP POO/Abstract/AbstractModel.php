<?php

abstract class AbstractModel{
    private InterfaceBdd $bdd;

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

    
    public abstract function addAccount(PDO $bdd, array $account): void;

    public abstract function updateAccount(PDO $bdd, array $account): void;

    public abstract function deleteAccount(PDO $bdd, string $email): void;

    public abstract function getAllAccount(PDO $bdd): array|null|string;

    public abstract function getAccountByEmail(PDO $bdd, string $email): array|null|string;


}