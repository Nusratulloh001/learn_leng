<?php

namespace App\Classes\Databases;

use PDO;
use App\Classes\Databases\Connection;

class Database {
    private PDO $connection;
    private $statement;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public static function instance ()
    {
        return new self(new Connection);
    }

    public function query(string $query, array $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function select(string $table)
    {
        return $this->query("SELECT * FROM {$table}")->fetchAll();
    }

    public function insert(string $table, array $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $query = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->connection->prepare($query);

        foreach ($data as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(string $table, int $id, array $data)
    {
        $placeholders = array_map(fn($key) => "{$key} = :{$key}", array_keys($data));
        $columnsInString = implode(", ", $placeholders);
        $query = "UPDATE {$table} SET {$columnsInString} WHERE id = :id";
        $data['id'] = $id;
        $this->query($query, $data);
    }

    public function delete (string $table, int $id)
    {
        $isExist = $this -> query("SELECT id FROM {$table} WHERE posts.id = {$id}") -> fetch();
        
        if (is_array($isExist)){
            if (array_key_exists('id', $isExist)){
                $query = "DELETE FROM {$table} WHERE {$table}.id = {$id}";
                $this -> query($query);
                return true;
            }
        } else {
            return false;
        }
    }

    public function fetch(int $mode = PDO::FETCH_ASSOC)
    {
        return $this->statement->fetch($mode);
    }

    public function fetchAll(int $mode = PDO::FETCH_ASSOC)
    {
        return $this->statement->fetchAll($mode);
    }

    public function where(string $table, int $id)
    {
        return $this->query("SELECT * FROM {$table} WHERE id = :id", ['id' => $id])->fetch();
    }

    public function join(string $table1, string $table2, string $condition, string $type = 'INNER')
    {
        $query = "{$type} JOIN {$table2} ON {$condition}";
        return $this->query("SELECT * FROM {$table1} {$query}")->fetchAll();
    }

    public function beginTransaction()
    {
        $this->connection->beginTransaction();
    }

    public function commit()
    {
        $this->connection->commit();
    }

    public function rollBack()
    {
        $this->connection->rollBack();
    }

    public function createIndex(string $table, string $indexName, array $columns)
    {
        $columnsInString = implode(", ", $columns);
        $query = "CREATE INDEX {$indexName} ON {$table} ({$columnsInString})";
        return $this->query($query);
    }

    public function createView(string $viewName, string $selectQuery)
    {
        $query = "CREATE VIEW {$viewName} AS {$selectQuery}";
        return $this->query($query);
    }

    public function dropView(string $viewName)
    {
        $query = "DROP VIEW IF EXISTS {$viewName}";
        return $this->query($query);
    }

    public function callProcedure(string $procedureName, array $params = [])
    {
        $placeholders = implode(", ", array_map(fn($param) => ":$param", array_keys($params)));
        $query = "CALL {$procedureName}({$placeholders})";
        return $this->query($query, $params)->fetchAll();
    }

    public function createTrigger(string $triggerName, string $timing, string $event, string $table, string $statement)
    {
        $query = "CREATE TRIGGER {$triggerName} {$timing} {$event} ON {$table} FOR EACH ROW {$statement}";
        return $this->query($query);
    }

    public function dropTrigger(string $triggerName)
    {
        $query = "DROP TRIGGER IF EXISTS {$triggerName}";
        return $this->query($query);
    }

    public function addForeignKey(string $table, string $column, string $referencedTable, string $referencedColumn)
    {
        $query = "ALTER TABLE {$table} ADD CONSTRAINT fk_{$column} FOREIGN KEY ({$column}) REFERENCES {$referencedTable}({$referencedColumn})";
        return $this->query($query);
    }
    public function addColumn (string $table, string $new_column, string $column_type, int | string $type_symbols = 255, string $after = '') : bool | string
    {
        $check = $this -> query("DESC {$table}") -> fetchAll();
        foreach ($check as $items => $item){
            if ($item['Field'] === $new_column){
                return "Column already exists";
            }
        }
        
        $query = "ALTER TABLE {$table} ADD {$new_column} {$column_type}($type_symbols) ";
        if (!empty($after)){
            $query .= " AFTER {$after}";
            $this -> query($query);
            return true;
        }
        $this -> query(trim($query));
        return true;
    }

    public function fullTextSearch(string $table, string $column, string $searchTerm)
    {
        $query = "SELECT * FROM {$table} WHERE MATCH({$column}) AGAINST(:searchTerm)";
        return $this->query($query, ['searchTerm' => $searchTerm])->fetchAll();
    }

    public function startReplication()
    {
        $query = "START SLAVE";
        return $this->query($query);
    }

    public function stopReplication()
    {
        $query = "STOP SLAVE";
        return $this->query($query);
    }

    public function createPartition(string $table, string $partitionDefinition)
    {
        $query = "ALTER TABLE {$table} PARTITION BY {$partitionDefinition}";
        return $this->query($query);
    }
}