<?php


// check item
function checkItems($table, $select, $value){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table WHERE $select = '$value'");
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count;
}

// Get Categories
function showCat(){
    global $con;
    $stmt = $con->prepare("SELECT * FROM categories ORDER BY ID");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
}

// Get Items
function showItem($tabel, $id){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $tabel WHERE Cat_ID = $id ORDER BY ItemID DESC");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
}
?>