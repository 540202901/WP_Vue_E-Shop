<?php
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
      $src = "http://localhost:8000/vue/";

      $arr = array(
          "status"=> 0,
          "message"=> array(
            array(
                "title"=> "家居生活",
                "id"=> 1,
            ),
            array(
                "title"=> "摄影设计",
                "id"=> 2,
            ),
            array(
                "title"=> "明星美女",
                "id"=> 3,
            ),
            array(
                "title"=> "空间设计",
                "id"=> 4,
            ),
            array(
                "title"=> "户型装饰",
                "id"=> 5,
            ),
            array(
                "title"=> "广告摄影",
                "id"=> 6,
            ),
            array(
                "title"=> "摄影学习",
                "id"=> 7,
            ),
            array(
                "title"=> "摄影器材",
                "id"=> 8,
            ),
            array(
                "title"=> "明星写真",
                "id"=> 9,
            ),
            array(
                "title"=> "清纯甜美",
                "id"=> 10,
            ),
            array(
                "title"=> "古典美女",
                "id"=> 11,
            ),

          )
      );

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

