<?php 
    if(isset($_GET['id']))
    {
        if(isset($_SESSION['id_them_vao_gio']))
        {
            $so=count($_SESSION['id_them_vao_gio']);
            $trung_lap="khong";
            for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
            {
                if($_SESSION['id_them_vao_gio'][$i]==$_GET['id'])
                {
                    $trung_lap="co";
                    $vi_tri_trung_lap=$i;
                    break;
                }
            }
            if($trung_lap=="khong")
            {
                $_SESSION['id_them_vao_gio'][$so]=$_GET['id'];
                $_SESSION['sl_them_vao_gio'][$so]=$_GET['so_luong'];
            }
            if($trung_lap=="co")
            {
                $_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]=$_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]+$_GET['so_luong'];
            }
        }
        else
        {
            $_SESSION['id_them_vao_gio'][0]=$_GET['id'];
            $_SESSION['sl_them_vao_gio'][0]=$_GET['so_luong'];
        }
    }
?>
