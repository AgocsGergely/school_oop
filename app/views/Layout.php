<?php
namespace App\Views;

class Layout{
    public static function header($title = 'Iskola'){
        echo <<<HTML
            <!DOCTYPE html>
            <html lang="hu">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>$title</title>


                <!-- Scripts -->
                <!-- -->
                <link href="/css/school.css" rel="stylesheet" type="text/css">
                <link href="/fontawesome/css/all.css" rel="stylesheet" type="text/css">
            </head>
            <body>
                
            
        HTML;
        self::navbar();
        self::handleMessages();
        echo '<div class="container">'; 
    }
    private static function handleMessages(): void{
        $messages = [];
    }
    public static function navbar(){
        echo <<<HTML
        <nav class="navbar">
            <ul class="nav-list">
                <li class="nav-button"><a href="/"><button style=""button title="Kezdőlap">Kezdőlap</button></a></li>
                <li class="nav-button"><a href="/subjects"><button style=""button title="Tantárgyak">Tantárgyak</button></a></li>
                <li class="nav-button"><a href="/classes"><button style=""button title="Osztályok">Osztályok</button></a></li>
        HTML;
    }

    /*public static function sidebar(){
        echo <<<HTML 
        <aside>
        <h3>Sidebar</h3>
        <!-- ul li href# cucc -->
    HTML;
    }*/
    public static function sidebar(){

    }
    public static function footer(){
        echo <<<HTML
        </div>
        <footer>
            <hr>
            <p>2025 &copy; Agócs Gergely
            </footer>
            <body>
        </html>
        HTML;
    }
}
?>