<?php

class Database {
    private $server = 'mysql:host=localhost;dbname=crud_operation';
    private $user = 'root';
    private $pass = '';

    private $connect = '';
    private $connection = false;
    private $result = array();

    public function __construct() {
        if ( !$this->connection ) {
            $this->connect = new PDO( $this->server, $this->user, $this->pass );
            if ( $this->connect ) {
                $this->connection = true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function select( $table, $row = [ '*' ], $where = array(), $order = null, $sort = 'ASC', $limit = null ) {
        $column = implode( ', ', $row );
        $SQL = "SELECT {$column} FROM {$table}";
        if ( count( $where ) > 0 ) {
            $condition = array();
            foreach ( $where as $key => &$value ) {
                $SQL .= ' WHERE ';
                $condition[] = "{$key} = :{$key}";
            }

            $SQL .= implode( ' AND ', $condition );
        }
        if ( $order != null ) {
            $SQL .= " ORDER BY {$order} {$sort}";
        }
        if ( $limit != null ) {
            $SQL .= " LIMIT {$limit}";
        }
        $query = $this->connect->prepare( $SQL );

        if ( count( $where ) > 0 ) {
            foreach ( $where as $key => &$value ) {
                $query->bindParam( ':'.$key, $value );
            }
        }
        $query->execute();
        $GetResult = $query->fetchAll( PDO::FETCH_ASSOC );
        if ( count( $GetResult ) > 0 ) {
            array_push( $this->result, $GetResult );
        } else {
            array_push( $this->result, 'No data found' );
        }

    }

    public function insert( $table, $data = array() ) {
        $column = implode( ', ', array_keys( $data ) );
        $placeholder = ':'.implode( ', :', array_keys( $data ) );
        $SQL = "INSERT INTO {$table} ({$column}) VALUES ({$placeholder})";
        $query = $this->connect->prepare( $SQL );
        foreach ( $data as $key => &$value ) {
            $query->bindParam( ':'.$key, $value );
        }
        $query->execute();
    }

    public function update($table, $data=array(), $where=array()){
        $arg = array();
        if(count($data) > 0){
            foreach ($data as $key => $value) {
                $arg[] = "{$key} = :{$key}";
            }
        }

        $param = implode(", ", $arg);

        $SQL = "UPDATE {$table} SET {$param}";
        
        if(count($where) > 0){
            $SQL .= " WHERE ";
            $condition = array();
            foreach ($where as $key => $value) {
                $condition[] = "{$key} = :where{$key}";
            }
            $str_condition = implode(" AND ", $condition);
            $SQL .= $str_condition;
        }

        $query = $this->connect->prepare($SQL);
        if(count($data) > 0){
            foreach ($data as $key => &$value) {
                $query->bindParam(":".$key, $value);
            }
        }
        if(count($where) > 0){ 
            foreach ($where as $key => &$value) {
                $query->bindParam(":where".$key, $value);
            }
        }
        $query->execute();
    }

    public function delete($table, $id = array()){
        $SQL = "DELETE FROM {$table} WHERE ";
        if(count($id) > 0){
            $condition = array();
            foreach ($id as $key => $value) {
                $condition[] = "{$key} = :{$key}";
            }
            $str_id = implode(", ", $condition);
            $SQL .= $str_id;
        }
        $query = $this->connect->prepare($SQL);
        if(count($id) > 0){
            foreach($id as $key => &$value){
                $query->bindParam(":".$key, $value);
            }
        }
        $query->execute();
    }

    public function getResult() {
        $result = $this->result;
        return $result;
    }

    public function __destruct() {
        if ( $this->connection ) {
            $this->connect = null;
        } else {
            return false;
        }
    }

}

$obj = new Database();

// $obj->select( 'student' );
// $obj->insert( 'student', [ 'name' => 'Sojib', 'age'=> 22, 'subject' => 'ARTs' ] );
// $obj->update( 'student', [ 'name' => 'Amir Khan', 'subject' => 'Arobic' ], ['id'=>25] );
// $obj->delete('student', ['id'=>28]);

echo '<pre>';
print_r( $obj->getResult() );
echo '</pre>';

?>