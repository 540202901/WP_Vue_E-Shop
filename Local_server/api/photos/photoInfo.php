<?php
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
      $id = $_GET['id'];
      $arr = array();

      switch($id){
         case 1:$arr = array(
                  "status"=> 0,
                  "message"=> array(
                      array(
                          "id"=> 1,
                          "title"=> "风高气更爽",
                          "add_time"=>"2015-04-16T03:50:28.000Z",
                          "content"=>"<p>尽管询问价稍跌，不过，市场对吉隆坡房产的需求保持强劲，最多人搜寻的地区主要有孟沙、满家乐和蕉赖。</p>
                                      ",
                          "click"=>12,
                      ),
                ));
                break;
         case 2:$arr = array(
                  "status"=> 0,
                  "message"=> array(
                      array(
                          "id"=> 2,
                          "title"=> "囚笼图样破",
                          "add_time"=>"2015-04-16T03:50:28.000Z",
                          "content"=>"<p>与此同时，市场对雪兰莪房产的需求保持强劲，虽然价格稍微下跌，其中八打灵再也、沙亚南和首邦市，是多数人物色产业的首三大地区。</p>
                                      ",
                          "click"=>12,
                      ),
                ));
                break;
         case 3:$arr = array(
                  "status"=> 0,
                  "message"=> array(
                      array(
                          "id"=> 3,
                          "title"=> "风动尔三边",
                          "add_time"=>"2015-04-16T03:50:28.000Z",
                          "content"=>"<p>在这几个地区，最多人搜寻的是共管公寓、然后是公寓和双层排屋，当中许多人把目光转向交通导向发展计划（TOD）的房产。</p>
                                      <p>他说：“市场对策略性地点的产业需求保持强劲，例如在捷运站或轻快铁站附近的房屋。”</p>",
                          "click"=>12,
                      ),
                ));
                break;
         default: $arr = array(
                    "status"=> 0,
                    "message"=> array(
                        array(
                            "id"=> 4,
                            "title"=> "久久不能忘怀",
                          "add_time"=>"2015-04-16T03:50:28.000Z",
                          "content"=>"<p><strong>在上述三个地区最常搜寻的产业类型，主要是共管公寓，接下来是公寓和城市房屋，吉隆坡比较多人选择高耸分层产业，主因是价格比有地房产较容易负担。</strong>至于房屋价格，许多人搜寻的是低于30万令吉的房产，不过，在人们属意的地区并不可行，因为许多地点的屋价已超出可负担水平。</p>",
                          "click"=>33,
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

