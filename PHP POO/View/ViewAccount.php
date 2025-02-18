<?php

class Account Implements InterfaceView{
    private ?string $form = '';
    private ?string $listUsers = '';

    /**
     * Get the value of form
     */
    public function getForm(): ?string
    {
        return $this->form;
    }

    /**
     * Set the value of form
     */
    public function setForm(?string $form): self
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get the value of listUsers
     */
    public function getListUsers(): ?string
    {
        return $this->listUsers;
    }

    /**
     * Set the value of listUsers
     */
    public function setListUsers(?string $listUsers): self
    {
        $this->listUsers = $listUsers;

        return $this;
    }

    public function displayView(): string {
        ob_start();
        echo $this->getForm();
?>

        <section>
            <h1>Liste d'Utilisateurs</h1>
            <ul>
                <?php echo $this->getListUsers() ?>
            </ul>
        </section>
<?php
        return ob_get_clean();
         
    }

    
}