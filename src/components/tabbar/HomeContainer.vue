<template>

    <div>
        <!--轮播图区域-->
        <swiper :swipeList="swipeList" :is-full="true"></swiper>


        <!--选择区域-->
        <ul class="mui-table-view mui-grid-view mui-grid-9">
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4"><router-link to="/home/newslist">
                <img src="../../images/menu1.png">
                <div class="mui-media-body">新闻资讯</div></router-link></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4"><router-link to="/home/photolist">
                <img src="../../images/menu2.png">
                <div class="mui-media-body">图片分享</div></router-link></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4"><router-link to="/home/goodslist">
                <img src="../../images/menu3.png">
                <div class="mui-media-body">商品购买</div></router-link></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4"><a href="#">
                <img src="../../images/menu4.png">
                <div class="mui-media-body">留言反馈</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4"><a href="#">
                <img src="../../images/menu5.png">
                <div class="mui-media-body">视频专区</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4"><a href="#">
                <img src="../../images/menu6.png">
                <div class="mui-media-body">联系我们</div></a></li>



        </ul>

    </div>
</template>

<script>
    //引入Toast弹框模块
    import { Toast } from 'mint-ui';
    import swiper from '../subcomponents/swiper.vue';//导入轮播图组件
    export default{
        name: "HomeContainer",
        data(){
            return {
                swipeList:[],//保存轮播图的数组
            }
        },
        created(){
          this.getSwipe();
        },
        methods:{
            getSwipe(){//获取轮播图数据的方法
                this.$http.get("getSwipe.php").then(result =>{
                    // console.log(result.body);
                    if (result.body.status === 0){
                        //成功了就绑定数据
                        this.swipeList = result.body.message;
                    } else {
                        //获取数据失败就弹框
                        Toast("加载轮播图失败");
                    }
                });
            }
        },
        components:{
            swiper
        }


    }
</script>

<style lang="scss" scoped>




    /*设置九宫图背景色、标签大小、边框线、字体大小*/
    .mui-table-view.mui-grid-view.mui-grid-9{
        background-color: white;
        border: none;

        .mui-table-view-cell.mui-media{
            border:none;
        }

        img{
            width: 60px;
            height: 60px;
        }
        .mui-media-body{
            font-size: 14px;
        }
    }


</style>