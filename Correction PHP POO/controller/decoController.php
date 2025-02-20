<?php
class DecoController extends AbstractController {
    //METHOD
    public function deconnexion():void{
        session_destroy();
        header('location:/');
        exit;
    }

    public function render():void{
        $this->deconnexion();
    }
}