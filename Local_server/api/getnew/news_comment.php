<?php
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
      $pageIndex = $_GET['pageIndex'];
      $arr = array();
      if($pageIndex==1){
             $arr = array(
                "status"=> 0,
                "message"=> array(
                  array(
                      "user_name"=> "匿名用户",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"我来评论一下啦",
                     ),
                  array(
                      "user_name"=> "匿名用户",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"巴拉巴拉",
                     ),
                  array(
                      "user_name"=> "匿名用户",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"这辈子别想买房",
                     ),
                  array(
                      "user_name"=> "匿名用户",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"我是第四个",
                     ),
                  array(
                      "user_name"=> "草帽超人",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"欧力哇哪路",
                     ),
                  array(
                      "user_name"=> "六爷",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"第六个",
                     ),
                  array(
                      "user_name"=> "飞黄腾达",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"楼上自称六爷的出来给我跪下。",
                     ),
                  array(
                      "user_name"=> "八哥",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=> "undefined",
                     ),
                  array(
                      "user_name"=> "九纹龙",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"社会你九哥，人狠话不多",
                     ),
                  array(
                      "user_name"=> "匿名用户",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"全倒闭了我们就买得起房子了",
                     ),
                )
             );
        }else if($pageIndex==2){
             $arr = array(
                "status"=> 0,
                "message"=> array(
                  array(
                      "user_name"=> "匿名用户",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"房价暴跌更待何时",
                     ),
                  array(
                      "user_name"=> "马竟成",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"绿了绿了绿了",
                     ),
                  array(
                      "user_name"=> "邓艳",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"这日子没发过",
                     ),
                  array(
                      "user_name"=> "玉涵",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"好多大叔牌种子，谁要我家多的是。",
                     ),
                  array(
                      "user_name"=> "逸宁",
                      "add_time"=>"2015-04-16T03:50:28.000Z",
                      "content"=>"鸡蛋鸭蛋，一舔就爆，稀里哗啦下一窝。",
                     )
                )
             );





        }


    function decodeUnicode($str)
    {
        return preg_replace_callback('/\\\\u([0-9a-f]{4})/i',
            create_function(
                '$matches',
                'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'
            ),
            $str);
    }

    echo decodeUnicode(json_encode($arr));






  ?>

