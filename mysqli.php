<?php

class Db{
    public static function conexion(){
        $conexion = new mysqli('localhost', 'root', 'avior_db', 'mvc', '3306');
        $conexion->query("SEY NAMES 'utf8'");
        return $conexion;
    }
}

class Funciones{
    private $db;
    private $employee;

    public function __construct()
    {
        $this->db=db::conexion();
        $this->employee=array();
    }

    public function insert($cedula, $name, $salary){
        $sql = "INSERT INTO employee(id_employee, cedula, name, salary)VALUES(
            NULL, '{$cedula}', '{$name}', '{$salary}')";
            return $this->db->query($sql);
    }
    public function select(){
        $sql = $this->db->query("SELECT * FROM employee");
        while($filas = $sql->fetch_assoc()){
            $this->employee[] = $filas;
        }
        return $this->employee;
    }

    public function selectId($id_employee){
        $sql = $this->db->query("SELECT * FROM employee WHERE id_employee='{$id_employee}'");
        while($filas = $sql->fetch_assoc()){
            $this->employee[] = $filas;
        }
        return $this->employee;
    } 

    public function update($id_employee ,$cedula, $name, $salary, $created){
        $sql = "UPDATE employee SET cedula='{$cedula}', name='{$name}', 
                  salary='{$salary}', created='{$created}'
                  WHERE id_employee='{$id_employee}'";
        return $this->db->query($sql);
    }
    public function delete($id_employee){
        $sql = "DELETE FROM employee WHERE id_employee={$id_employee}";
        return $this->db->query($sql);
    }
}

$employee = new Funciones();
var_dump($employee->select());