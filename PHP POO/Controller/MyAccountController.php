<?php

class MyAccountController extends AbstractController {

    private ?string $viewMyAccount;

    

    /**
     * Get the value of viewMyAccount
     */
    public function getViewMyAccount(): ?string
    {
        return $this->viewMyAccount;
    }

    /**
     * Set the value of viewMyAccount
     */
    public function setViewMyAccount(?string $viewMyAccount): self
    {
        $this->viewMyAccount = $viewMyAccount;

        return $this;
    }

    public function render(): void {
        $this->renderMyAccount();
    }
    
    public function renderMyAccount(){
        $myAccount = $this->getListView();
        echo $myAccount['myAccount']->displayView();
    }
}

