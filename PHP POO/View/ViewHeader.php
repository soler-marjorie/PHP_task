<?php

class Header implements InterfaceView{
    private ?string $header = '';
    

    /**
     * Get the value of nav
     */
    public function getHeader(): ?string
    {
        return $this->header;
    }

    /**
     * Set the value of nav
     */
    public function setHeader(?string $header): Header
    {
        $this->header = $header;
        return $this;
    }

    public function displayView(): string{
        ob_start();
?>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ajouter une categorie</title>
        </head>
        <body>
            <header>
                <nav>
                    <a href="/">Accueil</a>
                    <?php echo $this->getHeader() ?>
                </nav>
        </header>
<?php
        return ob_get_clean();
    }
}