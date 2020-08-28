<?php

    class App {

        private $config = [];

        public $db;

        function __construct () {

            define("URI", $_SERVER['REQUEST_URI']);
            define("ROOT", $_SERVER['DOCUMENT_ROOT']);

        }

        function configure() {
            // require(ROOT . "/mvc-blog/private/core/config/database.php");

            // if (isset($this->config["databse"])) {
            //     try {
            //         $this->db = new PDO($this->config["database"]["driver"] .
            //             ":host=" . $this->config["database"]["dbhost"] .
            //             ";dbname=" . $this->config["database"]["dbname"]
            //             , $this->config["database"]["username"]
            //             , $this->config["database"]["passord"]);
            //     } catch(PDOException $ex) {
            //         echo($ex->getMessage);
            //     }
            // }
        }

        function load () {
            require_once(ROOT . "/mvc-blog/private/core/classes/controller.php");
            require_once(ROOT . "/mvc-blog/private/core/classes/model.php");
        }

        function require ($path) {

            require (dirname(__DIR__) . $path);

        }

        function start () {

            $this->require("/app/controllers/main.php");
            $main = new Main();

        }
        
    }

?>