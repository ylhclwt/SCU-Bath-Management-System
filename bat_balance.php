<?php
   $con = new mysqli("localhost","root","nana1013","bath");
   $con->query("SET NAMES utf8");
   $sql = "select balance.id, balance.balance, user.username from `balance` ,`user` where balance.id = user.id";
   $result = $con -> query($sql);
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            查看用户余额
        </h3>
    </div>
    <div class="panel-body">
        <blockquote><p>您可以在此查看学生用户的余额情况。</p></blockquote>
                       </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="col-md-4">
                            学号
                        </th>
                        <th>
                            姓名
                        </th>
                        <th>
                            余额
                        </th>
                    </tr>
                </thead>
                <tbody>
                  <?
                  while($row = mysqli_fetch_array($result))
                      echo '<tr><td>'.$row['id'].'</td><td>'.$row['username'].'</td><td>'.$row['balance'].'</td></tr>';
                  ?>
                </tbody>
            </table>
</div>