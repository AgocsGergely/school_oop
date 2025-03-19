<?php
namespace App\Models;

class ClassModel extends Model
{
    public int|null $year = null; // subject tábla oszlopai
    public string|null $code = null; // subject tábla oszlopai
    
    protected static $table = 'classes'; // Eltérhet

    public function __construct(?string $code = null, ?int $year = null)
    {
        parent::__construct();
        if($code){
            $this->code = $code;
        }
        if($year){
            $this->year = $year;
        }
    }
}
?>