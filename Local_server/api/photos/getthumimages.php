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
                          "src"  =>  'https://farm6.staticflickr.com/5591/15008867125_68a8ed88cc_b.jpg',
                          "msrc" => 'https://farm6.staticflickr.com/5591/15008867125_68a8ed88cc_m.jpg',
                      ),
                      array(
                          "src"  =>  'https://farm4.staticflickr.com/3902/14985871946_86abb8c56f_b.jpg',
                          "msrc" =>  'https://farm4.staticflickr.com/3902/14985871946_86abb8c56f_m.jpg',
                      ),
                      array(
                          "src"  =>  'http://bj2.xszhlv.net/bj/1_files/001.jpg',
                          "msrc" =>  'http://bj2.xszhlv.net/bj/1_files/001.jpg',
                      ),
                ));
                break;
         case 2:$arr = array(
                  "status"=> 0,
                  "message"=> array(
                      array(
                          "src"  =>  'http://img8.zol.com.cn/bbs/upload/23407/23406028.jpg',
                          "msrc" => 'http://img8.zol.com.cn/bbs/upload/23407/23406028.jpg',
                      ),
                      array(
                          "src"  =>  'http://img17.3lian.com/d/file/201702/23/dc458f76475470db9a5791848cb67801.jpg',
                          "msrc" =>  'http://img17.3lian.com/d/file/201702/23/dc458f76475470db9a5791848cb67801.jpg',
                      ),
                      array(
                          "src"  =>  'http://img1.ph.126.net/Z-FYjDfFBsd6e8QJYO5BnQ==/1872934495132926616.jpg',
                          "msrc" =>  'http://img1.ph.126.net/Z-FYjDfFBsd6e8QJYO5BnQ==/1872934495132926616.jpg',
                      ),
                ));
                break;
         case 3:$arr = array(
                  "status"=> 0,
                  "message"=> array(
                      array(
                          "src"  =>  'http://img1.3lian.com/2015/a1/136/d/203.jpg',
                          "msrc" => 'http://img1.3lian.com/2015/a1/136/d/203.jpg',
                      ),
                      array(
                          "src"  =>  'http://img1.3lian.com/2015/a1/136/d/205.jpg',
                          "msrc" =>  'http://img1.3lian.com/2015/a1/136/d/205.jpg',
                      ),
                      array(
                          "src"  =>  'http://img17.3lian.com/d/file/201702/16/e442ae6a1ab65033db1c0f2bbe3116d5.jpg',
                          "msrc" =>  'http://img17.3lian.com/d/file/201702/16/e442ae6a1ab65033db1c0f2bbe3116d5.jpg',
                      ),
                ));
                break;
         default: $arr = array(
                    "status"=> 0,
                    "message"=> array(
                      array(
                          "src"  =>  'http://img15.3lian.com/2015/f2/57/d/93.jpg',
                          "msrc" => 'http://img15.3lian.com/2015/f2/57/d/93.jpg',
                      ),
                      array(
                          "src"  =>  'http://222.186.12.239:10010/zhiwul_141217/006.jpg',
                          "msrc" =>  'http://222.186.12.239:10010/zhiwul_141217/006.jpg',
                      ),
                      array(
                          "src"  =>  'https://img2.ydniu.com/news/2B3E6F41455DD3793EECB7CF8AB9D98E.jpg',
                          "msrc" =>  'https://img2.ydniu.com/news/2B3E6F41455DD3793EECB7CF8AB9D98E.jpg',
                      ),
                      array(
                          "src"  =>  'http://img1.3lian.com/2015/a1/136/d/203.jpg',
                          "msrc" =>  'http://img1.3lian.com/2015/a1/136/d/203.jpg',
                      ),
                      array(
                          "src"  =>  'http://pic43.photophoto.cn/20170615/0011034472272627_b.jpg',
                          "msrc" =>  'http://pic43.photophoto.cn/20170615/0011034472272627_b.jpg',
                      ),
                      array(
                          "src"  =>  'http://static.9d19.com/uploads/allimg/181222/2-1Q222000JbE.jpg',
                          "msrc" =>  'http://static.9d19.com/uploads/allimg/181222/2-1Q222000JbE.jpg',
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

