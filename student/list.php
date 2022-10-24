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
    
</body>
</html>
<?php
include_once './../db.php';

$sql = "SELECT * FROM `student` ";
// echo $sql; die();

//truyen cau truy van vao
$stmt = $conn->query($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_OBJ);//array => object

//fetchALL se tra ve du lieu nhieu hon 1 ket qua
$rows = $stmt->fetchAll();

// echo '<pre>';
// print_r($rows);
// die();
?>
<h1>DANH SÁCH SINH VIÊN</h1>
<a class="btn btn-primary" href="add.php">Thêm mới</a>
<?php if( isset( $_GET['msg'] )  && $_GET['msg'] == 'OK' ):?>
<p>Thêm thành công</p>
<?php endif;?>
<table class="table" border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>class</th>
            <th>birthday</th>
            <th>gender</th>
            <th>info</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $rows as $key => $row ): ?>
        <tr>
            <td><?= $key+1 ?></td>
            <td><?= $row->name; ?></td>
            <td><?= $row->class; ?></td>
            <td><?= $row->birthday; ?></td>
            <td><?= $row->gender; ?></td>
            <td><?= $row->info; ?></td>
            <td>
                <a class="btn btn-info" href="show.php?id=<?= $row->id; ?>">Xem</a> |
                <a class="btn btn-warning" href="edit.php?id=<?= $row->id; ?>">Sửa</a> |
                <a class="btn btn-danger" href="delete.php?id=<?= $row->id; ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
