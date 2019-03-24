<template>

    <div>
        <mt-swipe :auto="3000">
            <mt-swipe-item v-for="item in swipeList" :key="item.url">
                <img :src="item.img" alt="">
            </mt-swipe-item>
        </mt-swipe>
        <ul class="mui-table-view mui-grid-view mui-grid-9">
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4"><a href="#">
                <img src="../../images/menu1.png">
                <div class="mui-media-body">新闻资讯</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4"><a href="#">
                <img src="../../images/menu2.png">
                <div class="mui-media-body">图片分享</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4"><a href="#">
                <img src="../../images/menu3.png">
                <div class="mui-media-body">商品购买</div></a></li>
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
        }


    }
</script>

<style lang="scss" scoped>
    .mint-swipe{
        height: 200px;
    }

    .mint-swipe-item{
        img{
            width: 100%;
            height: 100%;
        }
    }

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