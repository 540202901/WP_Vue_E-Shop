<?php
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
      $id = $_GET['pageindex'];
      $arr = array();
      $item1 = array(
                    "id" => 1,
                    "title" => "佳能(Canon) EOS 700D 单反套机",
                    "add_time" => "2015-04-16T03:50:28.000Z",
                    "zhaiyao" => "DFS打发第三方第三方第三方的说法是否第三方",
                    "click" => 123,
                    "img_url" => "https://img11.360buyimg.com/n1/s450x450_jfs/t2656/295/34058120/362134/d92995e5/56fc835dNe349b797.jpg",
                    "sell_price" => 2195,
                    "market_price" => 2499,
                    "stock_quantity" => 60
                );
      $item2 = array(
                    "id" => 100,
                    "title" => "【扛把子牌】 无敌平底锅 吃鸡必备 挡子弹必备 吃鸡神奇 挡子弹 拍人头 多用吃鸡工具 刺激战场",
                    "add_time" => "2015-04-16T03:50:28.000Z",
                    "zhaiyao" => "【扛把子牌】 无敌平底锅 吃鸡必备 挡子弹必备 吃鸡神奇 挡子弹 拍人头 多用吃鸡工具 刺激战场",
                    "click" => 123,
                    "img_url" => "http://img004.hc360.cn/y3/M04/45/93/wKhQh1ThIk-EUtPXAAAAAG9clgU860.jpg",
                    "sell_price" => 159,
                    "market_price" => 299,
                    "stock_quantity" => 250
                );

        global $index;
        $index = 0 + $id*10;

       function itemIdUp($item)
      {
           $GLOBALS['index'] ++;
           $item["id"] = $GLOBALS['index'] ;
           return $item;
      }



      switch($id){
         case 1:$arr = array(
                  "status"=> 0,
                  "message"=> array(
                      itemIdUp($item2),itemIdUp($item1),itemIdUp($item2),itemIdUp($item2),itemIdUp($item1),
                      itemIdUp($item1),itemIdUp($item2),itemIdUp($item2),itemIdUp($item1),itemIdUp($item2),
                ));
                break;
         case 2:$arr = array(
                  "status"=> 0,
                  "message"=> array(
                      itemIdUp($item2),itemIdUp($item2),itemIdUp($item2),itemIdUp($item2),itemIdUp($item2),
                      itemIdUp($item2),itemIdUp($item2),itemIdUp($item1),itemIdUp($item1),itemIdUp($item1),
                ));
                break;
         case 3:$arr = array(
                  "status"=> 0,
                  "message"=> array(
                        itemIdUp($item2),itemIdUp($item1),itemIdUp($item2),itemIdUp($item2),itemIdUp($item1),
                ));
                break;
         default:$arr = array(
                        "status"=> -1,
                        "message"=> array()
                    );
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

