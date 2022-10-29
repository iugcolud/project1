<?php
$con = new PDO("mysql:host=localhost;dbname=image", 'root', '');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>search</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <section class="search">
        <div class="container">
            <div class="searchKey">
                <form method="POST">

                    <div class="serach-input">
                        <input type="text" name="search" placeholder="Search" id="live_search">
                    </div>
                    <div class="search-btn">
                        <input type="submit" name="submit" class="btn btn-light">

                    </div>
                    <div style="margin-top: 15px;text-align:center">
                        <?php

                        
                            if (isset($_POST["submit"])) {
                                $str = $_POST["search"];

                                $sth = $con->prepare("SELECT * FROM upload WHERE keyvalue='$str'");
                                $sth->setFetchMode(PDO::FETCH_OBJ);
                                $sth->execute();

                                if ($row = $sth->fetch()) {
                                    
                            ?>

                            <img src ="<?=$row->image?>" height='200' width='200'/>
                            <?php
                                } else {
                                    echo "image does not exist";
                                }
                            }
                            ?>
                    </div>

            </div>
        </div>
    </section>

    </form>





    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    
</body>



</html>