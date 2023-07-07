<?php
session_start(); 
?>
<?php

    if (isset($_POST['atc']))
    {
            if(isset($_SESSION['cart']))
            {
                $tours =array_column($_SESSION['cart'],'place');
                if(in_array($_POST['place'], $tours))
                {
                    echo"<script>
                        alert('Tour already added');
                        window.location.href='list.php';
                    </script>";
                }
                else{
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count]=array('tid'=>$_POST['tid'], 'place'=>$_POST['place'], 'cost'=>$_POST['cost'], 'tickets'=>$_POST['tickets']);
                    echo"<script>
                            alert('Tour added');
                            window.location.href='list.php';
                        </script>";
                }
            }
            else
            {
                $_SESSION['cart'][0] = array('tid'=>$_POST['tid'], 'place'=>$_POST['place'], 'cost'=>$_POST['cost'], 'tickets'=>$_POST['tickets']);
                echo"<script>
                        alert('Tour added');
                        window.location.href='list.php';
                    </script>";
            }

    }
    if(isset($_POST['remove']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['place']==$_POST['place'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']= array_values($_SESSION['cart']);
                echo "<script>
                    alert('item removed');
                    window.location.href='mycart.php';
                </script>

                ";
            }
        }
    }


?>






