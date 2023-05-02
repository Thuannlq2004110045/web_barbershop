<?php
    include("lib.php");
?>

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

        //load du lieu len web 
        while($row = mysqli_fetch_assoc($retval))
        {
            $taikhoandb="{$row["taikhoan"]}";
            $matkhaudb="{$row["matkhau"]}";
            $check = false;
            // lay danh sach tai khoan
            if($taikhoan==$taikhoandb && $matkhau==$matkhaudb)
            {
                //echo "dang nhap thanh cong <br/>";
                //Lưu tên đăng nhập
                $_SESSION['taikhoan'] = $taikhoan;
                $_SESSION["da_dang_nhap"] = "ok";
                $check = true;
                // header("Location: /barbershop/smbarber/index.html");
                include("index.html");
                break;
            }
        }
        if($check==false)
            {

                include("login_fail.html");
                
            }

            mysqli_close($connect);
?>
