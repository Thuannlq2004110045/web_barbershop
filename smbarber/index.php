<?php
            include("lib.php");

            # Kiem tra co quyen dang nhap
            if($_SESSION["da_dang_nhap"] == "ok")
            {
                include("index.html");
            }else{
                header("Location: login.html");
            }
?>