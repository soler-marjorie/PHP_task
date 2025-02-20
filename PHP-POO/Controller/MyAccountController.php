<?php

class MyAccountController extends AbstractController {

    public function render(): void {
        $this->getListView()['header']->displayView();
        if(isset($_SESSION['id'])){
            header('location:/');
            exit;
        }

        echo $this->renderHeader();
        echo $this->getListView()['moncompte']->displayView();
        echo $this->renderFooter();
        
    }
    
}

