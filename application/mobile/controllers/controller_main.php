<?php

class Controller_Main extends Controller {
    function action_index() {	
        $this->view->generate_mobile('main_view.php', 'template_view.php');
    }
}

