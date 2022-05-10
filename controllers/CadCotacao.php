<?php
    include_once '../models/Conexao.php';
    include_once '../models/Manager.php';

    $manager = new Manager();

    $data =$_POST;

    if($data['Id'] != NULL){
        $manager->update('tbcotacao', $data);
        header("Location: ../views/FormListaCotacao.php");
        return;
    }

    if(isset($data) && !empty($data)){
        $manager->insert('tbcotacao', $data);
        header("Location: ../index.php");
    }
?>