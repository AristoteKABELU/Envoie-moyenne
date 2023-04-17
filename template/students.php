<?php 
    require('../src/Query.php');
    $students = new Query();
    $students = $students->getStudent('20kk090');
    //echo '<pre>'; var_dump($students); exit
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p> bonjour <?php ?></p>
    <?php foreach($students as $student) : ?>
        <table border="1px">
            <?php foreach($student as $key => $element): ?>
            <tr>
                <td><?=$key?></td>
                <td><?= $element?></td>
            </tr>
            <?php endforeach;?>
        </table>
    <?php endforeach; ?>       
</body>
</html>