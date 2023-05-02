
<html>

<?php
    //khai báo biến host
    $hostName = 'localhost';

    // khai báo biến username
    $userName = 'root';

    //khai báo biến password
    $passWord = '';

    // khai báo biến databaseName
    $databaseName = 'baitapcuoiky';

    // khởi tạo kết nối
    $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
    //Kiểm tra kết nối

    // if (!$connect) {
    //     exit('Kết nối database không thành công!');
    // }

    // thành công
    // echo 'Kết nối database thành công! <br />';

    $sql = 'SELECT id, taikhoan, matkhau FROM dangnhap';

    $retval = mysqli_query($connect,$sql);

    if(!$retval)
    {
        exit('Không thể lấy dữ liệu ');
    }

        $taikhoan = $_POST["taikhoan"];
        $matkhau = $_POST["matkhau"];
        $matkhaunhaplai = $_POST["matkhau_nhaplai"];

        //load du lieu len web 
        while($row = mysqli_fetch_assoc($retval))
        {
            // lay danh sach tai khoan
            $taikhoandb="{$row["taikhoan"]}";
            $iddb="{$row["id"]}";
            $check = true;
            if($taikhoan==$taikhoandb )
            {
                
                $check = false;
                header("Location: /barbershop/smbarber/register_fail.html");
                break;
            }
        }
        $idASC=$iddb+1;
        if($check==true && $matkhau == $matkhaunhaplai)
            {
                $sql = "INSERT INTO dangnhap(id,taikhoan,matkhau) values('{$idASC}','{$taikhoan}','{$matkhau}')";
                $retval = mysqli_query($connect,$sql);
                header("Location: /barbershop/smbarber/register_success.html");
            
            }else{
                header("Location: /barbershop/smbarber/register_fail.html");
            }

            mysqli_close($connect);
?>

</html>  