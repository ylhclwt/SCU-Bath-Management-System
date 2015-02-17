<?php
   $con = new mysqli("localhost","root","nana1013","bath");
   $con->query("SET NAMES utf8");
   $sql = "select * from `user` order by `role` asc";
   $result = $con -> query($sql);
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            删除学生用户
        </h3>
    </div>
    <div class="panel-body">
        <blockquote><p>您可以在此删除一名用户。</p></blockquote>
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
                      case 3:echo '<tr><td>'.$row['id'].'</td><td>'.$row['username'].'</td><td>学生</td>';break;
                      //bat
                      case 2:echo '<tr class="warning"><td>'.$row['id'].'</td><td>'.$row['username'].'</td><td>浴室管理员</td>';break;
                      //adm
                      case 1:echo '<tr class="info"><td>'.$row['id'].'</td><td>'.$row['username'].'</td><td>系统管理员</td>';break;
                    }
                    echo '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm"
                      onclick="del=\''.$row['id'].'\';document.getElementById(\'n\').innerHTML=
                      \'您将要删除ID为 <strong>'.$row['id'].'</strong> 的用户。</br></br>此操作无法撤销，是否继续？\'">删除</button></td></tr>';
                  }
                  ?>
                </tbody>
            </table>
</div>
<!-- Modal -->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <p class="modal-title" id="myModalLabel"><strong>注意！</strong></p>
      </div>
      <div class="modal-body" id="n">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-danger" onclick="ajax('r','adm_delete_a.php?id='+del)">确认</button>
      </div>
    </div>
  </div>
</div>