<?php

class DecoController extends AbstractController {

    public function deconnexion(){
        session_destroy();
        header('location:/');
        exit;
    }

    public function render(): void{
        $this->deconnexion();
    }
}



