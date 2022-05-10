<?php
    include_once '../models/Conexao.php';
    include_once '../models/Manager.php';

    $manager = new Manager();

    $data =$_POST;
    
    if(isset($data) && !empty($data)){
        $manager->insert('tbprocedimento', $data);
        header("Location: ../index.php");
    }
?>