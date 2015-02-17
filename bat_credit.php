<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            信用积分重置
        </h3>
    </div>
    <div class="panel-body">
        <blockquote>
            <p>
                您可以在此重置学生的信用积分。
            </p>
        </blockquote>
        <div id="w"></div>
        <form class="form-inline" role="form" action="javascript:ajax('r','bat_credit_a.php?id='
        + document.getElementById('id').value, '1')">
            <input id="id" type="text" class="form-control" placeholder="输入学号" required autofocus>
            <button type="submit" class="btn btn-info">
                重置
            </button>
    </div>
    </form>
</div>