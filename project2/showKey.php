<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showKeys</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<?php
include('conction.php');

$selectKey = "SELECT `keyvalue` FROM `upload`";
$rezultOfSelect = mysqli_query($con, $selectKey);
$keys = mysqli_fetch_all($rezultOfSelect, MYSQLI_ASSOC);

?>
<body>
<section class="show" style="background-image: url(./images/you.jfif);
    height: 100vh;
    width: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;">
<div class="container">
    
    <div class="contant1" style="width: 300px;
    position: absolute;
    top: 50px;
    right: 300px;">
    <h2 style="text-align: center; color: azure;">KEYS LIST</h2>
    <table class="table table-dark table-striped">
    <thead style="text-align: center;
    padding: 30px;
    color:azure;">
    <tr>
            <th>Key</th>
        </tr>
        <tbody style="text-align: center;
    color:azure;">
        <?php foreach ($keys as $key) { ?>
            <tr>
                <td><?php echo $key['keyvalue'] ?></td>
            </tr>
        <?php }; ?>
        </tbody>
    </thead>
    </table>
    </div>
</div>

</section>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
