<?php
class viewCategory implements InterfaceView{
    //ATTRIBUT
    private ?string $message = '';

    //GETTE ET SETTER
    public function getMessage(){ return $this->message; }
    public function setMessage($message): self { $this->message = $message; return $this; }

    //METHOD
    public function displayView():string{
        ob_start();
?>
        <h1>Accueil</h1>
        <h1>Ajouter une catégorie</h1>
        <form action="" method="post">
            <label for="name">Saisir le nom de la catégorie</label>
            <input type="text" name="name">
            <input type="submit" value="ajouter" name="submit">
        </form>
        <?php echo $this->getMessage() ?>
<?php
        return ob_get_clean();
    }
}