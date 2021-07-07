<?php
    //Define default color-Check if cookie found
    $bgdefaultColor='#ffffff';  
    if(isset($_COOKIE['bgColorPage'])){
        $bgPage=$_COOKIE['bgColorPage'];
    }else{
        $bgPage=$bgdefaultColor;
    }
    //When press 'OK',set the new color and update the cookie
    if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['ok']) ){
        $bgPage = $_POST['myColor'];
        setcookie('bgColorPage',$bgPage,time()+3600,'/');
    }
    //Delete the cookie 'by set time in minus'-Reset by default color
    if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['delCookie']) ){
        $bgPage = $_POST['myColor'];
        setcookie('bgColorPage',$bgPage,time()-3600,'/');
        $bgPage=$bgdefaultColor;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:<?php echo $bgPage; ?>">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="color" name="myColor" value="<?php echo $bgPage; ?>">
        <input type="submit" name="ok" value="OK">
        <input type="submit" name="delCookie" value="Delete Cookie">
    </form>
</body>
</html>