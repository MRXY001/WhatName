<?php
require 'public_module.php';

session_start();

if (!isset($_SESSION['user_id'])) {
	header("Location: index.php"); // 重定向到登录页面
	exit; // 确保后续的代码不会被执行
}
?>
<HTML>
<head>
	<title>发布兼职信息</title>
	<link rel="stylesheet" href="css/mdui.min.css">
	<script src="js/mdui.min.js"></script>
    <script src="js/jquery.min.js" type="text/javascript"></script>
</head>
<body>  <!-- style="width:450px;margin:0 auto;margin-top: 100px;" -->
	<div class="mdui-card" style="margin: 10px;">
		<!-- 卡片头部，包含头像、标题、副标题 -->
		<div class="mdui-card-header">
			<img class="mdui-card-header-avatar" src="img/avatar.jpg"/>
			<div class="mdui-card-header-title"><?php echo $_SESSION['username']; ?></div>
			<div class="mdui-card-header-subtitle"><?php
				$row = row("SELECT * from users where user_id = '{$_SESSION['user_id']}'");
				$create = $row['create_time'];
			 echo time2Readability($create); ?></div>
		</div>

		<form action="publish_insert.php" method="post" enctype="multipart/form-data" onsubmit="return onSubmit()">
			<!-- 类型 -->
			<div style="margin-left: 20px;">
				<div class="mdui-chip">
				    <span class="mdui-chip-title">兼职类型</span>
				</div>
			    <label class="mdui-radio" style="margin-left: 20px;">
			        <input type="radio" name="type" value="1" checked /><i class="mdui-radio-icon"></i>默认
			    </label>
			</div>

			<!-- 标题 -->
			<div class="mdui-card-content" style="margin-bottom: -25px;">
			    <div class="mdui-textfield mdui-textfield-floating-label" >
			        <label class="mdui-textfield-label" style="margin-top:-20px;">标题</label>
			        <input class="mdui-textfield-input" type="text" name="title" id="title" />
			    </div>
			</div>

			<!-- 简介 -->
			<div class="mdui-card-content" style="margin-bottom: -25px;">
			    <div class="mdui-textfield mdui-textfield-floating-label">
			        <label class="mdui-textfield-label" style="margin-top:-20px;">简介</label>
			        <input class="mdui-textfield-input" type="text" name="brief" id="brief" />
			    </div>
			</div>

			<!-- 时薪 -->
			<div class="mdui-card-content" style="margin-bottom: -25px;">
			    <div class="mdui-textfield mdui-textfield-floating-label">
			        <label class="mdui-textfield-label" style="margin-top:-20px;">时薪</label>
			        <input class="mdui-textfield-input" type="number" name="wage" id="wage" />
			    </div>
			</div>

			<!-- 要求 -->
			<div class="mdui-card-content" style="margin-bottom: -25px;">
			    <div class="mdui-textfield mdui-textfield-floating-label">
			        <label class="mdui-textfield-label" style="margin-top:-20px;">要求</label>
			        <input class="mdui-textfield-input" type="number" name="require" id="require" />
			    </div>
			</div>

			<!-- 时薪 -->
			<div class="mdui-card-content" style="margin-bottom: -25px;">
			    <div class="mdui-chip">
				    <span class="mdui-chip-title">照片</span>
				</div>
				<input type="file" name="photo1" id="phpto1" accept="image/*">
			</div>

			<!-- 联系方式 -->
			<div class="mdui-card-content" style="margin-bottom: -25px;">
			    <div class="mdui-textfield mdui-textfield-floating-label">
			        <label class="mdui-textfield-label" style="margin-top:-20px;">联系方式</label>
			        <input class="mdui-textfield-input" type="number" name="contact" id="contact" />
			    </div>
			</div>

			<!-- 联系人 -->
			<div class="mdui-card-content" style="margin-bottom: -25px;">
			    <div class="mdui-textfield mdui-textfield-floating-label">
			        <label class="mdui-textfield-label" style="margin-top:-20px;">所属单位</label>
			        <input class="mdui-textfield-input" type="number" name="linkman" id="linkman" />
			    </div>
			</div>

			<!-- 卡片的按钮 -->
			<div class="mdui-card-actions">
			    <button class="mdui-btn mdui-ripple mdui-float-right" type="submit" onclick="onSubmit">发布</button>
			</div>

		</form>

	</div>

	

	<script type="text/javascript">

		function onSubmit()
		{
			var title = $("#title").val();
			if (title == "") {
				mdui.alert("请输入标题");
				return false;
			}

			var brief = $("#brief").val();
			if (brief == "") {
				mdui.alert("请输入简介");
				return false;
			}

			var wage = $("#wage").val();
			if (wage == "" || wage < 0 || wage > 1000) {
				mdui.alert("时薪格式错误");
				return false;
			}

			return true;
		}
	</script>
</body>
</HTML>

<?php
/**
* 时间转换易读的文字
* @author   technofiend<2281551151@qq.com>
* https://blog.csdn.net/technofiend/article/details/78627161
*/
function time2Readability($time, $contrastTime = 0)
{
    if ($contrastTime <= 0) {
        $contrastTime = time();
    }

    if ($time <= 0) {
        return '未知';
    }

    // 非今年发布的时间
    if (date('Y', $time) != date('Y', $contrastTime)) {
        return date('Y-m-d H:i:s', $time);
    }

    // 发布时间的零点
    $dateTime1  = new \DateTime();
    $dateTime1->setTimestamp($time);
    $dateTime1->setTime(0, 0, 0);
    $time1      = $dateTime1->getTimestamp();

    // 今天的零点
    $todayObj   = new \DateTime();
    $todayObj->setTimestamp($contrastTime);
    $todayObj->setTime(0, 0, 0);
    $today      = $todayObj->getTimestamp();

    // 距离发表时间的秒数
    $elapseTime = $contrastTime - $time;

    // 发表时间等于今天
    if ($time1 == $today) {
        // 今天发表的
        if ($elapseTime <= 5 * 60) {
            // 5分钟内
            return '刚刚';
        } else if ($elapseTime <= 60 * 60) {
            // 一个钟头内
            return floor($elapseTime / 60) . ' 分钟前';
        } else {
            return floor($elapseTime / (60 * 60)) . ' 小时前';
        }
    }

    $dateTime3 = new \DateTime();
    $dateTime3->setTimestamp($contrastTime);
    $dateTime3->modify('-1 day');
    $dateTime3->setTime(0, 0, 0);
    $yesterday = $dateTime3->getTimestamp();

    // 发表时间等于昨天
    if ($time1 == $yesterday) {
        if (($contrastTime - 6 * 60 * 60) < $today) {
            // 如果当前时间是凌晨
            $hourBefore = floor($elapseTime / (60 * 60));
            if ($hourBefore <= 9) {
                return $hourBefore . ' 小时前';
            } else {
                return '昨天：' . date('H:i', $time);
            }
        } else {
            return '昨天：' . date('H:i', $time);
        }
    }

    return date('m-d H:i:s', $time);
}

?>