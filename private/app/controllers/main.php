<?php

class Main extends Controller {

    function __construct() {
        parent::__construct();
    }
    /*
     * http://localhost/
     */
    function Index () {

        $data = Array("title" => "Main Page");
        $this->view("template/header", $data);
        $this->view("main/index");
        $this->view("template/footer");
        
    }

    function List () {

        $data = Array("title" => "List Page");
        $this->view("template/header", $data);
        $this->view("list/index");
        $this->view("template/footer");

    }

}

?>