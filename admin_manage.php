<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>

.edit-btn {
    border: 0;
    background: blue;
    border-radius: 0.25rem;
    cursor: pointer;
    padding: 10px 10px;
    color: #fff;
    
}



</style>

<body>
    
    <div class="admin">

        <header class="admin__header">
            <a href="#" class="logo">
            <h1>Admim</h1>
        </a>
            <div class="toolbar">
                <button class="btn btn--primary">Add New </button>
                <a href="admin_logout.php" class="logout">logout</a>
            </div>
        </header>

        <nav class="admin__nav">

            <ul class="menu">

                <li class="menu__item">
                    <a href="admin_index.php" class="menu__link">สมาชิก</a>
                </li>

                <li class="menu__item">
                    <a href="admin_document.php" class="menu__link">เอกสารทั้งหมด</a>

                </li>

                <li class="menu__item">
                    <a href="admin_manage.php" class="menu__link">จัดการสมาชิก</a>

                </li>

                <li class="menu__item">
                    <a href="" class="menu__link">ตั้งค่า</a>

                </li>
            </ul>
        </nav>

        <main class="admin__main">
            <h2>Dashboard</h2>
            <div class="dashboard">
                <div class="dashboard__item">
                    <div class="card">
                    <?php 

                            include_once('functions.php');

                            $fetchdata = new DB_con();
                            $result = $fetchdata->sumuser();

                            echo  mysqli_num_rows($result). 'สมาชิก' ; 
                    ?>
                    </div>
                </div>

                

                <div class="dashboard__item dashboard__item--full">
                    <table id="customers">
                        <tr>
                          <th>ID</th>
                          <th>Username</th>
                          <th>ชื่อ</th>
                          <th>นามสกุล</th>
                          <th>สถานะ</th>
                          <th>แก้ไข</th>
                          <th>ลบข้อมูล</th>
                          
                         
                        </tr>

                        <tbody>
                          <?php 
      
                          include_once('functions.php');
                          $fetchdata = new DB_con();
                          $result = $fetchdata->fetchdata();
                          while($row = mysqli_fetch_array($result)) {
                      ?>
      
                              <tr>
                                  <td><?php echo $row['id']; ?></td>
                                  <td><?php echo $row['username']; ?></td>
                                  <td><?php echo $row['firstname']; ?></td>
                                  <td><?php echo $row['lastname']; ?></td>
                                  <td><?php echo $row['status']; ?></td>
                                  
                                  <td><a href="update_user.php?id=<?php echo $row['id'];?>" class="edit-btn">1</a><a href="update_user2.php?id=<?php echo $row['id'];?>" class="edit-btn">0</a></td>
                                  
                                  <td><a href="delete.php?del=<?php echo $row['id'];?>" class="delete-btn">Delete</a></td>
                            
                              </tr>
      
                      <?php
      
                           }
      
                      ?>
      
                      </tbody>
                       
                      </table>
                </div>

              
            </div>
        </main>

        <footer class="admin__footer">
            © Copyright 2020. All right

        </footer>



    </div>

   


</body>
</html>