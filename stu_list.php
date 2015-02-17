<?php
   $id = $_COOKIE["id"];
   date_default_timezone_set("Asia/Shanghai");
   $db = new mysqli("localhost","root","nana1013","bath");
   $db -> query("SET NAMES utf8");
   $stmt = $db -> prepare("select stime,etime,charge from `shower` where etime <> ''");
   $stmt -> execute();
   $stmt -> bind_result($stime, $etime,$charge);
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            消费记录
        </h3>
    </div>
    <div class="panel-body">
        <blockquote><p>您可以在此查询历史消费记录。</p></blockquote>
                       </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            学号
                        </th>
                        <th>
                            开始时间
                        </th>
                        <th>
                            结束时间
                        </th>
                        <th>
                            时长
                        </th>
                        <th>
                            费用
                        </th>
                    </tr>
                </thead>
                <tbody>
                  <?
                  while ($stmt->fetch()) {
                    $sapn=floatval($etime)-floatval($stime);
                    echo '<tr><td>'.$id.'</td>
                    <td>'.date('Y-m-d H:i:s',floatval($stime)).'</td>
                    <td>'.date('Y-m-d H:i:s',floatval($etime)).'</td>
                    <td>'.sectospan($sapn).'</td>
                    <td>'.$charge.' 元</td>';
                  }

                  function sectospan($second)
                  {
                      $hours = intval($second / 3600);
                      $minutes = intval(($second - $hours * 3600) / 60);
                      $seconds = $second - $hours * 3600 - $minutes * 60;
                      return $hours.'小时'.$minutes.'分'.$seconds.'秒';
                  }
                  ?>
                </tbody>
            </table>
</div>