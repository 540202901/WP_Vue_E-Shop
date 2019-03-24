<?php
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
      $src = "http://localhost:8000/vue/";

      $arr = array(
          "status"=> 0,
          "message"=> array(
            array("url"=> "1","img"=>$src."images/1.jpeg"),
            array("url"=> "2","img"=>$src."images/2.PNG"),
            array("url"=> "3","img"=>$src."images/3.jpeg"),
            array("url"=> "4","img"=>$src."images/4.jpeg"),
          )
      );

     /****
     * echo '{"status":0,"message": [{ "id": 1, "name":"奔驰", "ctime": "2017-02-07" },{ "id": 2, "name":"宝马", "ctime": "2017-02-07" },{ "id": 3, "name":"奥迪", "ctime": "2017-02-07" }]}';
    **/


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

