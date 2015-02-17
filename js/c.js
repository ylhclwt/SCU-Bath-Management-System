login(false);
function login(d) {
    if(d){document.getElementById("lb").innerHTML = "登录中";}
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (xmlhttp.responseText != "false") {
                document.getElementById("c").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("lb").innerHTML = "登录";
                document.getElementById("w").innerHTML = "<div class=\"alert alert-danger\">用户名或密码错误</div>";
            }
        }
    }
    xmlhttp.open("GET", (d ? "login_a.php?u=" + document.getElementById("u").value + "&p=" + document.getElementById("p").value: "login_a.php"), true);
    xmlhttp.send();
}
function ajax(c, u, p, a) {
    //c:替换的元素
    //u:请求的url
    //p：回调处理(可选)
    //a:回调处理参数（可选）
    this.p = p || 0;
    this.a = a || 0;
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            switch(p)
            {
                case '1':credit_reset_callback(xmlhttp.responseText);break;
                case '2':document.getElementById(c).innerHTML = xmlhttp.responseText;
                        datetimepick_callback();break;
                case '3':add_user_callback(xmlhttp.responseText);break;
                case '4':reserve_callback(xmlhttp.responseText);break;
				case '5':password_modify_callback(xmlhttp.responseText);break;
                case '6':shower_callback(xmlhttp.responseText,a);break;
                default:document.getElementById(c).innerHTML = xmlhttp.responseText;
            }
        }
    }
    xmlhttp.open("GET", u, true);
    xmlhttp.send();
}
function datetimepick_callback() {
    var sd = new Date();
    $('.form_datetime').datetimepicker({
        startDate:sd,
        endDate: new Date(sd.getTime()+86400000),
        weekStart: 1,
        todayBtn: 0,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        forceParse: 0,
        showMeridian: 1
    });
}

function credit_reset_callback(s) {
    document.getElementById("w").innerHTML = (s=="true" ? 
        "<div class=\"alert alert-success\">重置成功</div>":
        "<div class=\"alert alert-danger\">无此用户</div>");
}

function add_user_callback(s) {
    document.getElementById("w").innerHTML = (s=="true" ? 
        "<div class=\"alert alert-success\">添加成功</div>":
        "<div class=\"alert alert-danger\">此用户已存在</div>");
}

function password_modify_callback(s) {
    document.getElementById("w").innerHTML = (s=="true" ? 
        "<div class=\"alert alert-success\">修改成功</div>":
        "<div class=\"alert alert-danger\">密码错误</div>");
}

function shower_callback(r, s) {
    if (r == "true") {
        if (s == "start") {
            document.getElementById("start").style.display = "none";
            document.getElementById("stop").style.display = "";
        } else {
            document.getElementById("stop").style.display = "none";
            document.getElementById("start").style.display = "";
        }
    } else {
        document.getElementById("w").innerHTML = "<div class=\"alert alert-danger\">请先预约</div>";
    }
}

function reserve() {
    var time=document.getElementById('time').value;
    if(time=='')
        document.getElementById("w").innerHTML = "<div class=\"alert alert-warning\">请选择预约时间</div>";
    else
        ajax('r','stu_reserve_a.php?time='+time,'4')
}

function reserve_callback(s) {
    document.getElementById("w").innerHTML = (s=='1' ? 
        "<div class=\"alert alert-danger\">预约失败：已经预约过了</div>":
        s=='2'?"<div class=\"alert alert-success\">预约成功</div>":
        "<div class=\"alert alert-danger\">预约失败：当前无可用浴位</div>");
}

var type=0;
var del=null;

function add_user() {
    var id=document.getElementById('id').value;
    var name=document.getElementById('name').value;
    if(type==0)
        document.getElementById("w").innerHTML = "<div class=\"alert alert-warning\">请选择用户类型</div>";
    else
        ajax('r','adm_add_a.php?name='+name+'&id='+id+'&role='+type,'3')
}

function drop(s) {
    type=s;
    document.getElementById("dropdownMenu1").innerHTML = (s==1 ? 
        "系统管理员":s==2?"浴室管理员":"学生")+'<span class="caret"></span>';
}

