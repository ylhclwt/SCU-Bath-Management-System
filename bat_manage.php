<?php
   $con = new mysqli("localhost","root","nana1013","bath");
   $con->query("SET NAMES utf8");
   $sql = "select * from `bathroom`";
   $result = $con -> query($sql);
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            管理浴位
        </h3>
    </div>
    <div class="panel-body">
        <blockquote><p>您可以在此设置浴位是否对外开放、增加浴位等。</p>
          <button type="button" class="btn btn-info" onclick="ajax('r','bat_add_a.php')">增加浴位</button>
          <button type="button" class="btn btn-danger" onclick="ajax('r','bat_clear_a.php')">清空浴位</button></blockquote>
            </div>

            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            浴位
                        </th>
                        <th>
                            可用
                        </th>
                    </tr>
                </thead>
                <tbody>
                  <?
                  while($row = mysqli_fetch_array($result))
                  {
                    switch($row['state'])
                    {
                    case "true":echo '<tr><td>'.($row['id']<10?'0'.$row['id']:$row['id']).'</td>
                    <td><button type="button" class="btn btn-danger" onclick="ajax(\'r\',\'bat_manage_disable.php?id='.$row['id'].'\')">禁用</button></td></tr>';break;
                    case "false":echo '<tr><td>'.($row['id']<10?'0'.$row['id']:$row['id']).'</td>
                    <td><button type="button" class="btn btn-success" onclick="ajax(\'r\',\'bat_manage_enable.php?id='.$row['id'].'\')">启用</button></td></tr>';break;
                    }
                  }
                  ?>
                </tbody>
            </table>
</div>