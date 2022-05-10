<?php
    include_once '../models/Conexao.php';
    include_once '../models/Manager.php';

    $manager = new Manager();

    $id = $_GET['id'];

    if(isset($id) && !empty($id)){
        $manager->delete('tbcotacao', 'IdCotacao', $id);
        header("Location: ../views/FormListaCotacao.php");
    }
?>