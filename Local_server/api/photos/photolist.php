<?php
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
      $cateId = $_GET['cateId'];
      $arr = array();
      if($cateId==0 ){
             $arr = array(
                "status"=> 0,
                "message"=> array(
                  array(
                      "id"=> 1,
                      "title"=> "有气质且可爱的美食组图",
                      "img_url"=>"http://fuss10.elemecdn.com/b/18/0678e57cb1b226c04888e7f244c20jpeg.jpeg",
                      "zhaiyao"=>"超级有气质啦，快来美一美，超级有气质啦，快来美一美，超级有气质啦，快来美一美，超级有气质啦，快来美一美，超级有气质啦，快来美一美",
                     ),
                  array(
                      "id"=> 2,
                      "title"=> "有气质且可爱的美食组图",
                      "img_url"=>"http://fuss10.elemecdn.com/3/1e/42634e29812e6594c98a89e922c60jpeg.jpeg",
                      "zhaiyao"=>"超级有气质啦，快来美一美，超级有气质啦，快来美一美",
                     ),
                  array(
                      "id"=> 3,
                      "title"=> "有气质且可爱的美食组图",
                      "img_url"=>"http://fuss10.elemecdn.com/1/c5/95c37272d3e554317dcec1e17a9f5jpeg.jpeg",
                      "zhaiyao"=>"超级有气质啦，快来美一美，超级有气质啦，快来美一美，超级有气质啦，快来美一美",
                     ),
                  array(
                      "id"=> 4,
                      "title"=> "有气质且可爱的美食组图",
                      "img_url"=>"http://fuss10.elemecdn.com/7/85/e478e4b26af74f4539c79f31fde80jpeg.jpeg",
                      "zhaiyao"=>"超级有气质啦，快来美一美，超级有气质啦，快来美一美，超级有气质啦，快来美一美",
                     ),
                  array(
                      "id"=> 5,
                      "title"=> "有气质且可爱的美食组图",
                      "img_url"=>"http://fuss10.elemecdn.com/b/df/b630636b444346e38cef6c59f6457jpeg.jpeg",
                      "zhaiyao"=>"超级有气质啦，快来美一美，超级有气质啦，快来美一美，超级有气质啦，快来美一美，超级有气质啦，快来美一美",
                     ),
                  array(
                      "id"=> 6,
                      "title"=> "有气质且可爱的美食组图",
                      "img_url"=>"http://fuss10.elemecdn.com/7/a5/596ab03934612236f807b92906fd8jpeg.jpeg",
                      "zhaiyao"=>"超级有气质啦，快来美一美，超级有气质啦，快来美一美",
                     ),
                )
             );
        }else if($cateId==1){
             $arr = array(
                "status"=> 0,
                "message"=> array(
                  array(
                      "id"=> 11,
                      "title"=> "最美不过这片海",
                      "img_url"=>"http://img.mp.itc.cn/upload/20170717/209c8df765c8443ea1846948a6a3d59c_th.jpg",
                      "zhaiyao"=>"最美不过这片海，快来美一美最美不过这片海，快来美一美。",
                     ),
                  array(
                      "id"=> 13,
                      "title"=> "最美不过这片海",
                      "img_url"=>"http://www.zhangpuliuao.com/wp-content/uploads/2017/02/431e_640.jpg",
                      "zhaiyao"=>"最美不过这片海，快来美一美最美不过这片海，快来美一美。",
                     ),
                  array(
                      "id"=> 15,
                      "title"=> "最美不过这片海",
                      "img_url"=>"http://image.nationalgeographic.com.cn/2017/0605/20170605042056602.jpg",
                      "zhaiyao"=>"最美不过这片海，快来美一美最美不过这片海，快来美一美。最美不过这片海，快来美一美。",
                     ),
                  array(
                      "id"=> 16,
                      "title"=> "最美不过这片海",
                      "img_url"=>"http://ww1.sinaimg.cn/mw600/8bbf64fbjw1dvqm4ic252j.jpg",
                      "zhaiyao"=>"最美不过这片海，快来美一美。最美不过这片海，快来美一美。最美不过这片海，快来美一美。",
                     ),
                )
             );
        }else if($cateId > 1){
                      $arr = array(
                         "status"=> 0,
                         "message"=> array(
                           array(
                               "id"=> 21,
                               "title"=> "传说中最美的摄影效果",
                               "img_url"=>"https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1553756909039&di=b600aa25130930be28fba0ed850eb210&imgtype=0&src=http%3A%2F%2Fphotocdn.sohu.com%2F20150709%2Fmp21909043_1436394610457_47.jpeg",
                               "zhaiyao"=>"传说中最美的摄影效果，快来美一美。传说中最美的摄影效果，快来美一美。",
                              ),
                           array(
                               "id"=> 22,
                               "title"=> "传说中最美的摄影效果",
                               "img_url"=>"http://dimg08.c-ctrip.com/images/1004050000000qs8hD350_C_671_10000.jpg",
                               "zhaiyao"=>"传说中最美的摄影效果，快来美一美。传说中最美的摄影效果，快来美一美。传说中最美的摄影效果，快来美一美。传说中最美的摄影效果，快来美一美。",
                              ),
                           array(
                               "id"=> 23,
                               "title"=> "传说中最美的摄影效果",
                               "img_url"=>"https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1553756912705&di=072e6d3c1147939121f82bad12d7df90&imgtype=0&src=http%3A%2F%2Fimg.mp.itc.cn%2Fupload%2F20161229%2F5af2062b43f74ebbb3bf9e8dd3c520a4_th.jpg",
                               "zhaiyao"=>"传说中最美的摄影效果，快来美一美。",
                              ),
                           array(
                               "id"=> 24,
                               "title"=> "传说中最美的摄影效果",
                               "img_url"=>"http://dimg02.c-ctrip.com/images/tg/137/245/193/ec6c9218d4f0474aa59bd55546db23d4_C_600_10000.jpg",
                               "zhaiyao"=>"传说中最美的摄影效果，快来美一美。传说中最美的摄影效果，快来美一美。传说中最美的摄影效果，快来美一美。传说中最美的摄影效果，快来美一美。",
                              ),
                           array(
                               "id"=> 25,
                               "title"=> "传说中最美的摄影效果",
                               "img_url"=>"http://5b0988e595225.cdn.sohucs.com/images/20180903/3ed5605c67da4cc3acc15342f1dbb296.jpeg",
                               "zhaiyao"=>"传说中最美的摄影效果，快来美一美。传说中最美的摄影效果，快来美一美。传说中最美的摄影效果，快来美一美。",
                              ),
                           array(
                               "id"=> 26,
                               "title"=> "传说中最美的摄影效果",
                               "img_url"=>"https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1553756916385&di=0a4c2c4500536dc7f2004f375c39095b&imgtype=0&src=http%3A%2F%2F5b0988e595225.cdn.sohucs.com%2Fq_70%2Cc_zoom%2Cw_640%2Fimages%2F20180711%2F86c42ac20d574302856d9b9a4436b717.jpeg",
                               "zhaiyao"=>"传说中最美的摄影效果，快来美一美。传说中最美的摄影效果，快来美一美。传说中最美的摄影效果，快来美一美。传说中最美的摄影效果，快来美一美。传说中最美的摄影效果，快来美一美。",
                              ),
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

