<?php
include_once './../db.php';

$id = $_GET['id'];
// Debug gia tri lay xuong
// var_dump($id);
$sql = "SELECT * FROM `student` WHERE id = $id ";
// Debug cau SQL
// var_dump($sql);

//truyen cau truy van vao
$stmt = $conn->query($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_OBJ);//array => object
//fetch se tra ve duy nhất 1 ket qua
$row = $stmt->fetch();
// Debug dữ liệu trả về

// Kiem tra nguoi dung da gui du lieu di
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    // Debug du lieu dc gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();

    // Lấy dữ liệu gửi lên
    // $id    = $_REQUEST['id'];
    $name   = $_REQUEST['name'];
    $class   = $_REQUEST['class'];
    $birthday   = $_REQUEST['birthday'];
    $gender   = $_REQUEST['gender'];
    $info   = $_REQUEST['info'];

    $sql = "UPDATE `student` 
        SET 
            -- `id` = '$id', 
            `name` = '$name',
            `class` = '$class',
            `birthday` = '$birthday',
            `gender` = '$gender',
            `info` = '$info'
        WHERE `student`.`id` = $id";
    // Debug sql
    // var_dump($sql);
    // die();

    // THuc hien truy van
    try {
        $conn->exec($sql);
        // CHuyển hướng về danh sách
        header("Location: list.php?msg=OK");
    } catch (Exception $e) {
        // CHuyển hướng về danh sách
        header("Location: list.php?msg=FAIL");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <h1 style="text-align: center;">Quản lý học sinh</h1>
</head>
<body>
<h1>Thay đổi</h1>
<form action="" method="post">
    Name<input class="form-control" type="text" name="name" value="<?= $row->name;?>" > <br>
    Class<input class="form-control" type="text" name="class" value="<?= $row->class;?>"> <br>
    Gender<input class="form-control" type="text" name="gender" value="<?= $row->gender;?>"> <br>
    Birthday<input class="form-control" type="text" name="birthday" value="<?= $row->birthday;?>"> <br>
    Info<input class="form-control" type="text" name="info" value="<?= $row->info;?>"> <br>
    <button class="btn btn-info" type="submit">Lưu</button>
    <button class="btn btn-danger" type="submit">Quay Lại</button>
</form>
