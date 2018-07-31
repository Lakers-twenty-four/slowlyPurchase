<?php
    $brandTitleId = $_GET["id"];
    $brandTitleId = $_GET["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>慢慢买比价网</title>
    <link rel="shortcut icon" href="./favicon.ico">
    <!-- 引入初始化的CSS -->
    <link rel="stylesheet" href="./css/base.css">
    <!-- 引入当前页面的css -->
    <link rel="stylesheet" href="./css/get10Top.css">
</head>
<body>
    <div class="view">
        <!-- 头部部分开始 -->
        <div class="header"></div>
        <!-- 头部部分结束 -->

        <!-- 内容部分开始 -->
        <div class="content">
            <!-- 导航部分开始 -->
            <div class="nav">
                首页
                <i class="iconfont">&#xe772;</i> 品牌大全
                <i class="iconfont">&#xe772;</i> <p></p>
            </div>
            <!-- 导航部分结束 -->
            <!-- 标题部分开始 -->
            <h3></h3>
            <!-- 标题部分结束 -->

            <!-- 哪个牌子好部分开始 -->
            <div class="whichBrandNice">
                <ul>
                    <script type="text/x-art-template" id="tmpl">
                        {{each comments}}
                        <li>
                        <a href="javascript:;">
                            <em>{{$index+1}}</em>
                            <div class="secCon">
                                <h4>{{$value.brandName}}</h4>
                                <p>{{$value.brandInfo}}</p>
                            </div>

                            <i class="iconfont">&#xe775;</i>
                        </a>
                        </li>
                        {{/each}}
                    </script>
                </ul>
            </div>
            <!-- 哪个牌子好部分结束 -->

            <!-- 产品销量排行部分开始 -->
            <div class="sellRanking">
                <h3></h3>
            </div>
            <!-- 产品销量排行部分结束 -->
        </div>

        <!-- footer部分开始 -->
        <div class="footer"></div>
        <!-- footer部分结束 -->

    </div>
    <script src="./js/jquery-1.12.2.min.js"></script>
    <script src="./js/plugin/art-template/template-web.js"></script>
    <script>
        $(document).ready(function () {
        var brandTitle = "<?php echo $brandTitleId?>";
        var title = brandTitle.replace("十大品牌","");
        //console.log(title);//三门冰箱
        $(".nav p").text(title+"哪个牌子好");
        $(".content>h3").text(title+"哪个牌子好");
        $(".sellRanking>h3").text(title+"产品销量排行");

        $.ajax({
            dataType: "json",
            type: "get",
            data:{
                brandtitleid:<?php echo $_GET["id"]; ?>
            },
            url: "http://193.112.55.79:9090/api/getbrand",
            success: function (res) {
                
                var data = res.result;
                //调用模板引擎渲染数据
                var context = {comments: data}
                //借助模板引擎的api
                var html = template('tmpl', context);
                //将渲染结果的html设置到默认元素的innerHTML中
                $("ul").html(html);
            },
            error: function () {
                console.log("请求数据失败");
            }
        });


    });
    </script>
    <script src="./js/get10top.js"></script>
</body>
</html>