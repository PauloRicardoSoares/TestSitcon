<?php
    class Manager extends Conexao{

        public function insert($table, $data){
                $pdo = parent::getIntance();
                $fields = implode(", ", array_keys($data));
                $values = ":".implode(", :", array_keys($data));
                $sql = "INSERT INTO $table ($fields) VALUES ($values)";         
                $statement = $pdo->prepare($sql);
                foreach ($data as $key => $value)
                {
                    $statement->bindValue(":$key", $value, PDO::PARAM_STR);
                }
                $statement->execute();
        }


        public function listar($table, $table2 = Null, $key = NULL){
            $pdo = parent::getIntance();

            if(!$table2 == NULL && !$key == NULL){
                $sql = "SELECT * FROM $table INNER JOIN $table2 ON $table.$key = $table2.$key";
            }else{
                $sql = "SELECT * FROM $table "; 
            }

            $statement = $pdo->query($sql);
            $statement->execute();

            return $statement->fetchAll();
        }

        public function getDados($table, $campo = NULL, $id){
            $pdo = parent::getIntance();
            $sql = "SELECT * FROM $table WHERE $campo = :id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();

            return $statement->fetch();
        }

        public function update($table, $data){
            $id = $data['Id'];
            $pdo = parent::getIntance();
            $newValues = "";

            unset($data['Id']);

            foreach ($data as $key => $value){
                $newValues .= "$key=:$key, ";
            }

            $newValues = substr($newValues, 0, -2); 

            $sql = "UPDATE $table SET $newValues WHERE $id = :id";
            $statement = $pdo->prepare($sql);

            foreach($data as $key => $value){
                $statement->bindValue(":$key", $value);
            }
            
            print($sql);
            $statement->bindValue(":id", $data[$id]);
            $statement->execute();
            
        }

        public function delete($table, $campo, $id){
            $pdo = parent::getIntance();
            $sql = "DELETE FROM $table WHERE $campo = :id";
            $statement = $pdo->prepare($sql);   
            $statement->bindValue(":id", $id);
            $statement->execute();
        }
    }
?>