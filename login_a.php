<?php 
if(isset($_GET['u'])&&isset($_GET['p']))
{
    $con = new mysqli("localhost","root","nana1013","bath");
    $con->query("SET NAMES utf8");
    $sql = "select * from `user` where `id`='".$_GET['u']."'";
    $result = $con -> query($sql);
    $row = mysqli_fetch_array($result);
    if($row['password'] == md5($_GET['p']))
    {
        setcookie("id", $_GET['u'], time()+86400);
        switch($row['role'])
        {
            case '1':header("Location: admin_a.php"); exit;
            case '2':header("Location: bather_a.php"); exit;
            case '3':header("Location: student_a.php"); exit;
        }
    }
    else
       echo "false";
}
else if(isset($_COOKIE["id"]))
{
    $con = new mysqli("localhost","root","nana1013","bath");
    $con->query("SET NAMES utf8");
    $sql = "select * from `user` where `id`='".$_COOKIE["id"]."'";
    $result = $con -> query($sql);
    $row = mysqli_fetch_array($result);
    switch($row['role'])
    {
            case '1':header("Location: admin_a.php"); exit;
            case '2':header("Location: bather_a.php"); exit;
            case '3':header("Location: student_a.php"); exit;
     }
}
else 
{
    echo "<div class='col-md-4'></div><form action=\"javascript:login(true)\" class='form-signin col-md-4' role='form'>
        <h4 class='form-signin-heading'>用 户 登 录</h4>
        <input id=\"u\" type='text' class='form-control' placeholder='请输入校园卡号' required autofocus>
        <div style='height:10px;clear:both;display:block'></div>
        <input id=\"p\" type='password' class='form-control' placeholder='请输入密码' required>
        <div class='checkbox'>
          <label>
            <input type='checkbox' value='remember-me'> 记住登录状态
          </label>
        </div><div id=\"w\"></div>
        <button id='lb' class='btn btn-lg btn-success btn-block col-md-2' type=\"submit\">登录</button>
    </form><div class='col-md-4'></div>";
}
?>