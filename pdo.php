<?php

function conexion(){
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=mvc", "root", "avior_db");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exeption $e){
        echo $e->getMessage();
    }
    return $pdo;
}

function select(){
    $query = conexion()->prepare("SELECT * FROM employee");
    $query->execute();
    return $employees = $query->fetchAll(PDO::FETCH_ASSOC);
}

function insert($cedula, $name, $salary){
    $sql = "INSERT INTO employee(id_employee, cedula, 
                                name, salary)VALUES
                                (NULL, :cedula, :name, :salary)";
    $query = conexion()->prepare($sql);
    $query->execute([
        'cedula'=>$cedula,
        'name'=>$name,
        'salary'=>$salary
    ]);
}

function delete($cedula){
    $sql = "DELETE FROM employee WHERE cedula=:cedula";
    $query = conexion()->prepare($sql);
    $query->execute([
        'cedula'=>$cedula
    ]);
}

function update($id_employee, $cedula, $name, $salary){
    $sql = "UPDATE employee SET cedula =:cedula, name=:name, 
                                salary=:salary 
                                WHERE id_employee=:id_employee"; 
    $query = conexion()->prepare($sql);
    $query->execute([
        'id_employee'=>$id_employee,
        'cedula'=>$cedula,
        'name'=>$name,
        'salary'=>$salary
    ]);
}

var_dump(select());
//insert(29937746, "Auro", "$556");
//delete(29937746);
//update(33, 4433445, "Karla", "$7788");