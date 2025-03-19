<?php

namespace App\Models;

use App\Database\Database;
use App\Interfaces\ModelInterface;
use Exception;
use PDOException;

abstract class Model implements ModelInterface
{
    public int $id;
    protected $db;
    protected static $table;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    function mapToModel(array $data): Model{
        $model = new static();
        foreach($data as $key => $value){
            if (property_exists($model,$key)){
                $model->$key = $value;
            }
        }
        
        return $model;
    }

    static function select(): string
    {
        return "SELECT * FROM `". static::$table ."`";
    }
    static function orderBy($orderBy = []): string
    {
        if(empty($orderBy)){
            return "";
        }

        $orderByClauses = [];

        $fields = $orderBy['order_by'] ?? [];
        $directions = $orderBy['direction'] ?? [];

        foreach ($fields as $index => $field){
            $direction = $directins[$index] ?? 'ASC';
            $orderByClauses[] = "$field $direction";
        }

        if(empty($orderByClauses)){
            return "";
        }
        return " ORDER BY ". implode(', ', $orderByClauses). ";";
    }

    function find(int $id): ?static
    {
        $sql = self::select() . " WHERE id = :id";

        $qryResult = $this->db->execSql($sql, ['id' => $id]);
        if(empty($qryResult)){
            return null;
        }
        return $this->mapToModel($qryResult[0]);
    }

    function all($orderBy = []):array{

            $sql = self::select();
            $sql .= self::orderBy($orderBy);
            $qryResult = $this->db->execSql($sql);

            if(empty($qryResult)){
                return [];
            }

            $results = [];
            foreach($qryResult as $row){
                $results[] = $this->mapToModel($row);
            }
            return $results;
    }
    function delete(){
        
        $sql = "DELETE FROM ".self::$table."WHERE id = :id";
        
        return $this->db->execSql($sql,['id' => $this->id]);
        
    }
}
?>