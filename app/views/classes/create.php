<?php

echo <<<HTML
        <form method='post' action='/classes'>
            <fieldset>
                <label for="name">Osztály</label>
                <input type="text" name="code" id="code">
                <input type="text" name="year" id="year">
                <hr>
                <button type="submit" name="btn-save">
                     <i class="fa fa-save"></i>
                     &nbsp;Mentés
                </button>
                <a href="/subjects">
                    <i class="fa fa-cancel"></i>
                    &nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;