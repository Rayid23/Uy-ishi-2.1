<?php

namespace App\Models;

use App\Databases\Database;

use PDO;

class Model extends Database
{
    public static $limit = 10;

    public static function Create($data)
    {
        $column = implode(",", array_keys($data));
        $values = implode("','", array_values($data));
        $values = "'" . $values . "'";

        $sql = "INSERT INTO " . static::$table . "(" . $column . ")" . " VALUES ($values)";
        self::NewConnect()->query($sql);
    }

    public static function Update(int $id, array $data)
    {

        $set = "";

        foreach ($data as $key => $value) {
            $set .= $key . "='" . $value . "',";
        }

        $set = substr($set, 0, -1);

        $sql = "UPDATE " . static::$table . " SET {$set} WHERE id={$id}";
        self::NewConnect()->exec($sql);
    }

    public static function SelectAll(int $start)
    {


        $sql = "SELECT * FROM " . static::$table . " LIMIT $start, " . self::$limit;
        $statement = self::NewConnect()->query($sql);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public static function DeleteAll()
    {
        $sql = "DELETE FROM " . static::$table;
        self::NewConnect()->exec($sql);
    }

    public static function Delete(int $id)
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id={$id}";
        self::NewConnect()->exec($sql);
    }

    public static function Show(int $id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id={$id}";
        $Result = self::NewConnect()->query($sql);

        return $Result->fetch(PDO::FETCH_OBJ);
    }

    public static function WhereCol($col, $opt, $data)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE {$col}{$opt}'{$data}'";
        echo $sql;
        $Result = self::NewConnect()->query($sql);
        echo $col.$opt.$data;
        return $Result->fetchAll(PDO::FETCH_OBJ);
    }

    public static function DeleteWhere($col, $opt, $data){
        $sql = "DELETE FROM " . static::$table . " WHERE {$col}{$opt}{$data}";
        self::NewConnect()->exec($sql);
    }

    public static function WhereCol2($col, $opt, $data, $col2, $opt2, $data2)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE {$col}{$opt}'{$data}' AND {$col2}{$opt2}'{$data2}'";
        echo $sql;
        $Result = self::NewConnect()->query($sql);
        
        return $Result->fetchAll(PDO::FETCH_OBJ);
    }

    public static function Pagenet()
    {

        $sqlCountUser = "SELECT * FROM " . static::$table;
        $sqlCountUserRes = self::NewConnect()->query($sqlCountUser);
        $sqlCountUserRow = $sqlCountUserRes->fetchAll(PDO::FETCH_ASSOC);

        return ceil(count($sqlCountUserRow) / self::$limit);
    }

    public static function WhereLike($column, $word)
    {

        $sql = "SELECT * FROM " . static::$table . " WHERE {$column} LIKE '%{$word}%'";
        $Result = self::NewConnect()->query($sql);
        return $Result->fetchAll(PDO::FETCH_OBJ);
    }
}
