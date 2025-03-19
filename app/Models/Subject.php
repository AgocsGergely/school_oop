<?php
namespace App\Models;

class Subject extends Model
{
    public string|null $name = null; //subject tábla oszlopa

    protected static $table = 'subjects'; // Eltérhet

    public function __construct(?string $name = null)
    {
        parent::__construct();
        if($name){
            $this->name = $name;
        }
    }
}
?>