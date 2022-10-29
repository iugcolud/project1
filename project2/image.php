<?php
include('conction.php');
if (isset($_POST['upload'])) {
    $keyvalue = $_POST['keyvalue'];
    $file = $_FILES['image']['name'];


    $query1 = "SELECT * FROM upload WHERE keyvalue=$keyvalue";
    $res1 = mysqli_query($con, $query1);
    if (mysqli_num_rows($res1) >= 1) {
        $error = 'Key is already exist';
    }else{
        $query = "INSERT INTO upload(image,`keyvalue`) VALUES('$file','$keyvalue')";
        $res = mysqli_query($con, $query);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.min.css">

</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">

        <div class="container-fluid">
            <a class="navbar-brand" href="#">Web Development</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <!-- <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5> -->
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="search.php" target="_blank">search</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="showKey.php" target="_blank">showKeys</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section class="min" style="background-image: url('./images/3075838.jpg');">
        <div class="container">
            <div class="content">
                <div>
                    <h3> Select a file to upload </h3>
                    <form calss="my-5" action="" method="post" enctype="multipart/form-data">
                        <div class="key">
                            <input type="text" name="keyvalue" placeholder="Enter the  Key-Value">
                        </div>
                        <input type="file" name="image" calss="form-control">
                        <input type="submit" name="upload" value="UPLOAD" class="btn btn-dark">
                    </form>
                </div>
                <div calss="col-md-6">
                    <h4 calss="text-center">Display IMAGE</h4>
                    <?php if (isset($res) and $res == true) { ?>
                        <?php move_uploaded_file($_FILES['image']['tmp_name'], "$file"); ?>
                        <?php echo "<img src ='$file' height='150' width='150'/>"; ?>
                    <?php }; ?>
                    <?php
                    $sel = "SELECT * FROM upload";
                    $que = mysqli_query($con, $sel);

                    $output = "";
                    if (mysqli_num_rows($que) < 1) {
                        $output .= "<h3 class='text-center'>No image uploaded</h3>";
                    }
                    ?>

                    <?php 
                        if(isset($error) and $error != ''){
                            echo '<h3 class="text-center text-danger">'.$error.'</h3>';
                        }
                    ?>

                </div>
            </div>
        </div>
    </section>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>

</html>