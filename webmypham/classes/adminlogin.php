<?php 
    include '../lib/session.php';
   // Session::checkLogin();
    include '../lib/database.php';
    include '../helpers/format.php';
?>

<?php
class adminlogin 
{
    private $db;
    private $fm;
    function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function login_admin($nvEmail, $nvPassword){
        $nvEmail = $this->fm ->validation($nvEmail);
        $nvPassword = $this->fm ->validation($nvPassword);

        $nvEmail = mysqli_real_escape_string($this->db->link, $nvEmail);
        $nvPassword = mysqli_real_escape_string($this->db->link, $nvPassword);
        if(empty($nvEmail) || empty($nvPassword)){
            $alert = "Tài khoản hoặc mật khẩu không để trống!";
            return $alert;
        }
        else{
            $query ="SELECT  * FROM nhanvien WHERE NV_EMAIL = '$nvEmail' AND NV_MATKHAU ='$nvPassword' LIMIT 1";
            $result = $this ->db->select($query);

            if($result != false){
                $value = $result->fetch_assoc();
                Session::set('login', true);
                Session::set('adminId', $value['NV_MA']);
                Session::set('hoTen', $value['NV_TEN']);
                Session::set('nvEmail', $value['NV_EMAIL']);
                Session::set('nvPassword', $value['NV_MAKHAU']);              
                header('Location:index.php');
            }
            else{
                $alert ="Mật khẩu hoặc tài khoản khônng đúng!";
                return $alert;
            }
        }

    }
}
?>