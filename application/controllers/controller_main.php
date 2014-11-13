<?php

class Controller_Main extends Controller {
    function action_index() {	
        $this->getView()->generate('main_view.php', 'template_view.php');
    }
}

