<?php
            include("lib.php");

            # Kiem tra co quyen dang nhap
            if($_SESSION["da_dang_nhap"] == "ok")
            {
                include("about.html");
            }
            else
?>