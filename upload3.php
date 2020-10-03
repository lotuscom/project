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

    <link rel="stylesheet" href="css/upload.css">
</head>


<style>
    
    .btn-confirm {
    border: 0;
    border-radius: 0.4rem;
    background: green;
    padding: 10px 10px;
    transition: .3s ease-in-out;
    
    cursor: pointer;
    
    }

    .btn-cancel {
    border: 0;
    border-radius: 0.4rem;
    background: red;
    padding: 10px 10px;
    transition: .3s ease-in-out;
    
    cursor: pointer;
    
    }

    .btn-confirm a , .btn-cancel a {
        text-decoration: none;
        color: white;
    }

    .btn--doc{
        display: grid;
        grid-template-columns: 60px 60px;
        margin: 0px 10px;
        list-style: none;
        
    }
</style>

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
                        <li><a href="document.php">Document</a></li>
                        <li><a href="upload.php">Upload</a></li>
                        <div class="btn">
                        <a href="logout.php" class="button">Logout</a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-form">

        <form action="upload2.php" id="form-upload" method="post" enctype="multipart/form-data">
            <h1>รายละเอียดของ เอกสาร</h1>


            <div class="item-form">
                <label for="">เลขที่เอกสาร</label>
                <input type="text" placeholder="เลขที่เอกสาร" name="docid" required>
                <span class="fa-stack">
                    <span class="fa fa-square-o fa-stack-2x"></span>
                    <strong class="fa-stack-1x">
                        123    
                    </strong>
                </span> 
            </div>

            <div class="item-form">
                <label for="">เรื่อง</label>
                <input type="text" placeholder="เรื่อง" name="topic" required>
                <i class="fa fa-file" aria-hidden="true"></i>
            </div>
           
            <div class="item-form">
                <label for="">ผู้เกี่ยวข้องในเอกสาร <?php echo $_SESSION['id'];?></label>
                <textarea id="story" name="detail" rows="5" cols="33" >
                      
                    </textarea>
            </div>

            <div class="file-upload">
                <label for="">เลือกไฟล์</label>
                <input class="file-upload__input" type="file" name="fileupload" id="myFile" accept=".pdf" required>
                <button class="file-upload__button" type="button">Choose File(s)</button>
                <span class="file-upload__label"></span> 
              </div> 

            
            <div class="btn--doc">
                <div>
                    <button class="btn-confirm" name="btn_insert">ตกลง</button>
                </div>

                <div>
                    <button class="btn-cancel"><a href="document.html">ยกเลิก</a></button>
                </div>
            </div>









        </form>
    </div>








    <footer class="admin__footer">
        <p>© Copyright 2020. All right</p> 

    </footer>






    <script src="js/jquery.js"></script>
    <script src="js/upload.js"></script>


</body>

</html>


<?php

}

?>