<?php
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
      $id = $_GET['id'];
      $arr = array();
      switch($id){
         case 11:$arr = array(
                  "status"=> 0,
                  "message"=> array(
                      array(
                            "id" => 11,
                            "title" => "Shinco/新科 S2300 无线麦克风 无",
                            "add_time" => "2015-04-19T19:34:55.000Z",
                            "goods_no" => "SD3973042344",
                            "stock_quantity" => 20,
                            "market_price" => 269,
                            "sell_price" => 199
                        ),
                ));
                break;
         case 12:$arr = array(
                  "status"=> 0,
                  "message"=> array(
                      array(
                            "id" => 12,
                            "title" => "九阴真经绝学 欲练此功 无需自宫",
                            "add_time" => "2015-04-19T19:34:55.000Z",
                            "goods_no" => "SD3943243344",
                            "stock_quantity" => 60,
                            "market_price" => 1580,
                            "sell_price" => 999
                        ),

                ));
                break;
         default:$arr = array(
                        "status"=> 0,
                        "message"=> array(
                          array(
                                "id" => 99,
                                "title" => "无敌风火轮/神飞必杀道具 杀杀杀",
                                "add_time" => "2015-04-19T19:34:55.000Z",
                                "goods_no" => "SD34657765575",
                                "stock_quantity" => 120,
                                "market_price" => 2369,
                                "sell_price" => 1999
                            ),

                        ));
                          break;
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

