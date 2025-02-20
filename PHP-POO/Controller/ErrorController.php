<?php

class ErrorController extends AbstractController {

    public function render(): void {

        echo $this->renderHeader();
        echo $this->getListView()['erreur']->displayView();
        echo $this->renderFooter();
        
    }
    
}
