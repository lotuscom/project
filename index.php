<?php

            session_start();


            if ($_SESSION['id'] == "") {
                header("location: login.php");
            } else {


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/index.css">
</head>

<body>


    <header>
        <nav>
            <div class="container">
                <div class="nav-grid">
                    <div class="logo">
                        <img src="https://eng.rmutp.ac.th/web2558/wp-content/uploads/2018/08/eng-logo.png" alt="">
                    </div>
                    <button class="hamburger" id="hamburger">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="menu" id="menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="document_2.php">Document</a></li>
                        <li><a href="upload.php">Upload</a></li>
                        <div class="btn">
                        <a href="logout.php" class="button">Logout</a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <section id="hero">
        <div class="hero-container">
            <h3>Welcome to <strong>DCPE</strong></h3>
            <h1>Document storage web applications</h1>
            <h2>We are team designers websites with CSS</h2>

        </div>
    </section><!-- End Hero -->

   


    
    <footer class="admin__footer">
       <p>© Copyright 2020. All right</p> 

    </footer>



    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

</body>

</html>


<?php

}

?>