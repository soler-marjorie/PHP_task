<?php

class Error implements InterfaceView{
    public function displayView(): string{
        ob_start();
?>
        <h1>Erreur 404 : Vous vous êtes perdu en chemin.</h1>
<?php
        return ob_get_clean();
    }
}