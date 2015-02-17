<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            修改密码
        </h3>
    </div>
    <div class="panel-body">
        <blockquote>
            <p>
                您可以在此修改密码。
            </p>
        </blockquote>
         <form role="form" action="javascript:ajax('r','all_password_modify_a.php?used_pass='+
         document.getElementById('used_pass').value + '&new_pass=' + document.getElementById('new_pass').value,'5')">
                <div class="form-group">
                <div>
                    <input id="used_pass" type="password" class="form-control" size="16" placeholder="请输入原密码"
                    required autofocus>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <input id="new_pass" type="text" class="form-control" size="16" placeholder="请输入新密码"
                    required>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-lg" >
                提交
            </button>
            <div class="form-group"><div id="w"></div></div>
            </form>
       </div>
 </div>