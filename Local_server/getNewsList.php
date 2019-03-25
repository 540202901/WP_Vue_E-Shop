<?php
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
      $src = "http://localhost:8000/vue/";

      $arr = array(
          "status"=> 0,
          "message"=> array(
            array(
                "id"=> 1,
                "title"=>"1季度多家房产业绩下滑50%，促销战打响。",
                "add_time"=>"2015-04-16T03:50:28.000Z",
                "zhaiyao"=>"房企业绩一落千丈，何去何从",
                "click"=>10,
                "img_url"=>$src."images/news/1.jpg"
            ),
            array(
                "id"=> 2,
                "title"=>"幸福",
                "add_time"=>"2012-12-12 12:12:12",
                "zhaiyao"=>"房企业绩一落千丈，何去何从",
                "click"=>123,
                "img_url"=>$src."images/news/2.jpg"
            ),
            array(
                "id"=> 3,
                "title"=>"1季度多家房产业绩下滑50%，促销战打响。",
                "add_time"=>"2015-04-06",
                "zhaiyao"=>"房企业绩一落千丈，何去何从",
                "click"=>231,
                "img_url"=>$src."images/news/1.jpg"
            ),
            array(
                "id"=> 4,
                "title"=>"1季度多家房产业绩下滑50%，促销战打响。",
                "add_time"=>"2015-04-06",
                "zhaiyao"=>"房企业绩一落千丈，何去何从",
                "click"=>67,
                "img_url"=>$src."images/news/1.jpg"
            ),
            array(
                "id"=> 5,
                "title"=>"1季度多家房产业绩下滑50%，促销战打响。",
                "add_time"=>"2015-04-06",
                "zhaiyao"=>"房企业绩一落千丈，何去何从",
                "click"=>45,
                "img_url"=>$src."images/news/1.jpg"
            ),
            array(
                "id"=> 6,
                "title"=>"1季度多家房产业绩下滑50%，促销战打响。",
                "add_time"=>"2015-04-06",
                "zhaiyao"=>"房企业绩一落千丈，何去何从",
                "click"=>33,
                "img_url"=>$src."images/news/1.jpg"
            ),
            array(
                "id"=> 7,
                "title"=>"1季度多家房产业绩下滑50%，促销战打响。",
                "add_time"=>"2015-04-06",
                "zhaiyao"=>"房企业绩一落千丈，何去何从",
                "click"=>50,
                "img_url"=>$src."images/news/1.jpg"
            ),
            array(
                "id"=> 8,
                "title"=>"1季度多家房产业绩下滑50%，促销战打响。",
                "add_time"=>"2015-04-06",
                "zhaiyao"=>"房企业绩一落千丈，何去何从",
                "click"=>40,
                "img_url"=>$src."images/news/1.jpg"
            ),
            array(
                "id"=> 9,
                "title"=>"1季度多家房产业绩下滑50%，促销战打响。",
                "add_time"=>"2015-04-06",
                "zhaiyao"=>"房企业绩一落千丈，何去何从",
                "click"=>30,
                "img_url"=>$src."images/news/1.jpg"
            ),
            array(
                "id"=> 10,
                "title"=>"1季度多家房产业绩下滑50%，促销战打响。",
                "add_time"=>"2015-04-06",
                "zhaiyao"=>"房企业绩一落千丈，何去何从",
                "click"=>255,
                "img_url"=>$src."images/news/1.jpg"
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

