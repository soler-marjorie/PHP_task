<?php
class MyAccountController extends AbstractController{
    //METHOD
    public function render():void{
        //Vérifier si on est connecté
        if(!isset($_SESSION['id'])){
            //Non connecté : je redirige vers l'accueil
            header('location:/');
            exit;
        }

        //Rendues des vues si on est connecté
        //Header
        echo $this->renderHeader();

        //Mon Compte
        echo $this->getListViews()['monCompte']->displayView();
        
        //Footer
        echo $this->renderFooter();
    }
}