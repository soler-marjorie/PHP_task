<?php
abstract class AbstractController{
    private ?array $listModel;

    /**
     * $listView : tableau associatif démarrant avec
     *[
     * header => viewHeader,
     * footer => viewFooter,
     * les autres list de vue
     * ]
     */
    private ?array $listView;

    public function __constructor(?array $listModel, ?array $listView){
        $this->listModel = $listModel;
        $this->listView = $listView;
    }

    /**
     * Get the value of listModel
     */
    public function getListModel(): ?array
    {
        return $this->listModel;
    }

    /**
     * Set the value of listModel
     */
    public function setListModel(?array $listModel): self
    {
        $this->listModel = $listModel;

        return $this;
    }

    /**
     * Get the value of listView
     */
    public function getListView(): ?array
    {
        return $this->listView;
    }

    /**
     * Set the value of listView
     */
    public function setListView(?array $listView): self
    {
        $this->listView = $listView;

        return $this;
    }

    public abstract function render(): void;

    public function renderHeader():void{
        if(isset($_SESSION['id'])){
            $this->getListView()['header']->setNav('<a href="/moncompte">Mon Compte</a>
                 <a href="/deconnexion">Se Déconnecter</a>');
        }
        echo "<header>Coucou header</header>";
    }

    public function renderFooter(){
        $footer = $this->getListView();
        $footer['footer']->displayView();
    }

}