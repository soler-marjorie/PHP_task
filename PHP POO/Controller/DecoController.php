<?php

class DecoController extends AbstractController {

    private ?string $viewDeco;


    /**
     * Get the value of viewDeco
     */
    public function getViewDeco(): ?string
    {
        return $this->viewDeco;
    }

    /**
     * Set the value of viewDeco
     */

    public function setViewDeco(?string $viewDeco): self
    {
        $this->viewDeco = $viewDeco;

        return $this;
    }

    
    public function render(): void {
        $this->renderdeco();
    }
    
    public function renderDeco(){
        $deco = $this->getListView();
        echo $deco['deco']->displayView();
    }
}



