<?php
    session_start();

    require "libs/Uri.php";
    require "libs/Controller.php";
    require "libs/View.php";
    require "libs/Database.php";
    require "libs/Model.php";
    require "libs/Pagination.php";
    require "libs/File.php";

    require "config/path.php";
    require "config/database.php";

    $uri = new Uri();
    
?>