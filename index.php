<?php
require 'public_module.php';
session_start();

if (!isset($_SESSION['user_id'])) {
	initUser();
} else { // 没有设置用户ID

}

function initUser($user_id = 1)
{
	$row = row("SELECT * from users ");
	if (!$row) die('无法找到用户信息') ;
	$_SESSION['user_id'] = $user_id;
	$_SESSION['username'] = $row['username'];
}

?>
<!DOCTYPE html>
<!-- saved from url=(0097)http://pyq001.1y0g.com/view3?uid=oJ642szr4G-SKgO5KFnUdr_NfWIU&from=singlemessage&isappinstalled=0 -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>兼职信息列表</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="css/wxg.css">
    <script src="js/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.1/css/mdui.min.css">
	<script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.1/js/mdui.min.js"></script>
    <style type="text/css">
        * {cursor: pointer;}
        .weui_mask_transition {
            display: none;
            position: fixed;
            z-index: 1;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0);
            -webkit-transition: background .3s;
            transition: background .3s;
        }
        .weui_fade_toggle {
            background: rgba(0, 0, 0, 0.6);
        }
        .weui_actionsheet {
            position: fixed;
            left: 0;
            bottom: 0;
            -webkit-transform: translate(0, 100%);
            -ms-transform: translate(0, 100%);
            transform: translate(0, 100%);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            z-index: 2;
            width: 100%;
            background-color: #EFEFF4;
            -webkit-transition: -webkit-transform .3s;
            transition: transform .3s;
        }
        .weui_actionsheet_toggle {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            transform: translate(0, 0);
        }
        .weui_actionsheet_menu {
            background-color: #FFFFFF;
        }
        .weui_actionsheet_cell:before {
            content: " ";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 1px;
            border-top: 1px solid #D9D9D9;
            -webkit-transform-origin: 0 0;
            -ms-transform-origin: 0 0;
            transform-origin: 0 0;
            -webkit-transform: scaleY(0.5);
            -ms-transform: scaleY(0.5);
            transform: scaleY(0.5);
        }
        .weui_actionsheet_cell:first-child:before {
            display: none;
        }
        .weui_actionsheet_cell {
            position: relative;
            padding: 10px 0;
            text-align: center;
            font-size: 18px;
        }
        .weui_actionsheet_cell.title {
            color: #999;
        }
        .weui_actionsheet_action {
            margin-top: 6px;
            background-color: #FFFFFF;
        }

    </style>
</head>
<body>

<div style="margin:0 auto;display:none;">
    <img class="data-avt" src="wx_img/0.jpg">
</div>
<!-- 整个朋友圈的头像（用户信息） -->
<header>
    <img id="bg" src="wx_img/bg.jpg">
    <p id="user-name" class="data-name">万虎科技~贾素杰</p>
    <img id="avt" class="data-avt" src="wx_img/0.jpg">
</header>
<div id="main">
    <div id="list">
        <ul>
            <li>
                <!-- 头像部分 -->
                <div class="po-avt-wrap">
                    <img class="po-avt data-avt" src="wx_img/0.jpg">
                </div>
                <div class="po-cmt">
                    <!-- 朋友圈内容 -->
                    <div class="po-hd">
                        <!-- 发朋友圈的用户名字 -->
                        <p class="po-name"><span class="data-name">万虎科技~贾素杰</span></p>
                        <!-- 发布内容 -->
                        <div class="post">
                            <p>大家好，听说国内冻成狗🐶？我这边还挺热～</p>
                            <p>
                                <img class="list-img" src="wx_img/jt1.jpg" style="height: 80px;">
                                <img class="list-img" src="wx_img/yt3.jpg" style="height: 80px;">
                                <img class="list-img data-avt" src="wx_img/0.jpg" style="height: 80px;">
                            </p>
                        </div>
                        <!-- 发布时间 -->
                        <p class="time">刚刚</p><img class="c-icon" src="wx_img/c.png">
                    </div>
                    <!-- 用户评论 -->
                    <div class="cmt-wrap">
                        <!-- 点赞列表 -->
                        <div class="like"><img src="wx_img/l.png">苍井空，陈冠希，杨幂，王思聪，陈赫，刘德华，马云...</div>
                        <!-- 评论列表 -->
                        <div class="cmt-list">
                            <p><span>王思聪：</span>去哪玩啊？那么爽</p>
                            <p>
                                <span class="data-name">万虎科技~贾素杰</span> 回复 <span> 王思聪 </span> <span> ： </span>
                                澳洲大堡礁，这边刚好是夏季，挺适合避寒的。
                            </p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</div>
<script>
</script>


<script>
    function safetostring(str) {
        return String(str).replace(/&amp;/g, '&').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&quot;/g, '"').replace(/&#39;/g, "'");
    }

    //$("#list").html($("#scene").html());

    setTimeout(function () {
        // $(".data-name").text(safetostring(nickname));
        //$(".data-avt").attr("src", headimgurl);
        var cw = $('.list-img').width();
        $('.list-img').css({'height': cw + 'px'});
    }, 0);

    $(window).resize(function () {
        var cw = $('.list-img').width();
        $('.list-img').css({'height': cw + 'px'});
    });


    $(document.body).show();

</script>



</body>
</html>