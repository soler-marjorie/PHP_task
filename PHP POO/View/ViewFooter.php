<?php

class Footer Implements InterfaceView{
    public function displayView(): string{
        ob_start();
?>
        <footer>
            <p>Mentions Légales</p>
        </footer>

        </body>
        </html>
<?php
        return ob_get_clean();
    }
}