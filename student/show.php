<?php
include_once './../db.php';

// echo '<pre>';
// print_r( $_GET );
// die();

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

?>
<table border="1">
    <tr>
    <td> id </td>
        <td> <?php echo $row->id;?> </td>
    </tr>
    <tr>
        <td> name </td>
        <td>  <?php echo $row->name;?> </td>
    </tr>
    <tr>
        <td> class </td>
        <td> <?php echo $row->class;?> </td>
    </tr>
    <tr>
        <td> birthday </td>
        <td> <?php echo $row->birthday;?> </td>
    </tr>
    <tr>
        <td> gender </td>
        <td> <?php echo $row->gender;?> </td>
    </tr>
    <tr>
        <td> info </td>
        <td> <?php echo $row->info;?> </td>
    </tr>
</table>
