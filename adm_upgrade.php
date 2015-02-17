<?php
   $con = new mysqli("localhost","root","nana1013","bath");
   $con->query("SET NAMES utf8");
   $sql = "select * from `user` order by `role` asc";
   $result = $con -> query($sql);
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            管理用户
        </h3>
    </div>
    <div class="panel-body">
        <blockquote><p>您可以在此对系统用户进行管理。</p></blockquote>
                       </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            编号
                        </th>
                        <th>
                            姓名
                        </th>
                        <th>
                            角色
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody>
                  <?
                  while($row = mysqli_fetch_array($result))
                  {
                    switch($row['role'])
                    {
                      //stu
                      case 3:echo '<tr><td>'.$row['id'].'</td><td>'.$row['username'].'</td><td>学生</td><td>
                      <button type="button" class="btn btn-warning" 
                      onclick="ajax(\'r\',\'adm_upgrade_a.php?id='.$row['id'].'&op=2\')">升级</button>
                      <button type="button" class="btn btn-info" disabled="disabled">降级</button></td></tr>';break;
                      //bat
                      case 2:echo '<tr class="warning"><td>'.$row['id'].'</td><td>'.$row['username'].'</td><td>浴室管理员</td><td>
                      <button type="button" class="btn btn-warning" 
                      onclick="ajax(\'r\',\'adm_upgrade_a.php?id='.$row['id'].'&op=1\')">升级</button>
                      <button type="button" class="btn btn-info" 
                      onclick="ajax(\'r\',\'adm_upgrade_a.php?id='.$row['id'].'&op=3\')">降级</button></td></tr>';break;
                      //adm
                      case 1:echo '<tr class="info"><td>'.$row['id'].'</td><td>'.$row['username'].'</td><td>系统管理员</td><td>
                      <button type="button" class="btn btn-warning" disabled="disabled">升级</button>
                      <button type="button" class="btn btn-info" 
                      onclick="ajax(\'r\',\'adm_upgrade_a.php?id='.$row['id'].'&op=2\')">降级</button></td></tr>';break;
                    }
                  }?>
                </tbody>
            </table>
</div>