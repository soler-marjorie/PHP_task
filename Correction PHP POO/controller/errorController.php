<?php
class ErrorController extends AbstractController{
    //METHOD
    public function render():void{
        //Rendu du Header
        echo $this->renderHeader();

        //Rendu de la page Error
        echo $this->getListViews()['erreur']->displayView();

        //Rendu du Footer
        echo $this->renderFooter();
    }
}