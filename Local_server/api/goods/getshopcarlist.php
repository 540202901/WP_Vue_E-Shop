<?php
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
      $ids = $_GET['ids'];
      $idArr = explode(',', $ids);
      $arr  = array(
              "status"=> 0,
              "message"=> array(

            ));

      foreach ($idArr as $id) {
          $a = array(
               "id" => $id,
               "title" => "小米(MI) 小米Note 16G双网通版,不管是啥只有ID:".$id,
               "sell_price" => 1980,
               "thumb_path" => "http://img0.imgtn.bdimg.com/it/u=1330842723,353357313&fm=11&gp=0.jpg",
           );
           array_push($arr["message"],$a);
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

