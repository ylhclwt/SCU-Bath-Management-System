<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            添加用户
        </h3>
    </div>
    <div class="panel-body">
        <blockquote>
            <p>
                您可以在此添加一名用户。
            </p>
        </blockquote>
        <form role="form" action="javascript:add_user()">
            <div class="dropdown form-group">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                data-toggle="dropdown">
                    请选择用户类型
                    <span class="caret">
                    </span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="javascript:drop(3)">
                            学生
                        </a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="javascript:drop(2)">
                            浴室管理员
                        </a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="javascript:drop(1)">
                            系统管理员
                        </a>
                    </li>
                </ul>
            </div>
            <div class="form-group">
                <div>
                    <input id="id" type="text" class="form-control" size="16" placeholder="请输入学号"
                    required autofocus>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <input id="name" type="text" class="form-control" size="16" placeholder="请输入姓名"
                    required>
                </div>
            </div>
            <button class="btn btn-success btn-lg" type="submit">
                提交
            </button>
            <div class="form-group"><div id="w"></div></div>
        </form></div></div>