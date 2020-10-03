<?php 


    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS','');
    define('DB_NAME','project');

    



    

    class DB_con {
        function __construct() {
            $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {

                echo "Failed to connect to MySQL :" . mysqli_connect_error();

            }
        }

        public function usernameavailable($username) { //เช็คว่า user ที่สมัคร ซ้ำกับใน database หรือไม่
            $checkuser = mysqli_query($this->dbcon, "SELECT * FROM tb_user WHERE username = '$username'");
            return $checkuser;
        }
    

        public function registration($username,$password,$firstname,$lastname){ // เพิ่มข้อมูลลงใน database
            $reg = mysqli_query($this->dbcon,"INSERT INTO tb_user(username,password,firstname,lastname)
            VALUES('$username','$password','$firstname','$lastname')");
            return $reg;
        }

        public function login($username,$password) { //เช็ค user pass ว่าตรงกับ database มั้ย
            $loginquery = mysqli_query($this->dbcon,"SELECT id, firstname,lastname,status
            FROM tb_user WHERE username = '$username' AND password = '$password'");
            return $loginquery;
        }

        public function loginadmin($username,$password) { //เช็ค user pass ว่าตรงกับ database มั้ย
            $loginadmin = mysqli_query($this->dbcon,"SELECT id, firstname,lastname,status
            FROM tb_admin WHERE username = '$username' AND password = '$password'");
            return $loginadmin;
        }
    



        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_user");
            return $result;
        }

        public function fetchid() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_user WHERE id = '".$_SESSION["id"]."'");
            return $result;
        }

        public function fetchdocument() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_document");
            return $result;
        }


        public function fetchonerecord($userid){
            $result = mysqli_query($this->dbcon,"SELETE * FROM tb_user WHERE id = '$userid' ");
            return $result;
        }

        public function update($userid){
            $result = mysqli_query($this->dbcon,"UPDATE tb_user SET status = '1' WHERE id = $userid");
            return $result;

        }

        public function delete($userid)
    {
        $deleterecord = mysqli_query($this->dbcon,"DELETE FROM tb_user WHERE id ='$userid'");
        return $deleterecord;
    }

        public function sumuser() {
        $sumuser = mysqli_query($this->dbcon,"SELECT  * from tb_user");
        return $sumuser;
    }

        public function upload($id,$document_no,$topic,$detail,$newname){
            $upload = mysqli_query($this->dbcon,"INSERT INTO tb_document (sender_id,document_no,topic,detail,file) 
            VALUES('$id','$document_no','$topic','$detail','$newname')");
            return $upload;
        }


    }

?>