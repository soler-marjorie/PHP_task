<?php
abstract class AbstractModel {
    //ATTRIBUT
    private ?interfaceBDD $bdd;

    //CONSTRUCTEUR
    public function __construct(?InterfaceBDD $bdd){
        $this->bdd = $bdd;
    }
    
    //GETTER ET SETTER
    public function getBdd(): ?interfaceBDD { return $this->bdd; }
    public function setBdd(?interfaceBDD $bdd): AbstractModel { $this->bdd = $bdd; return $this; }

    //METHOD
    public abstract function add():void;

    public abstract function update():void;

    public abstract function delete():void;

    public abstract function getAll():array | null;

    public abstract function getById():array | null;
}