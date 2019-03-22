<template>
    <div>
        <mt-swipe :auto="4000">
            <mt-swipe-item v-for="item in swipeList" :key="item.url">
                <img :src="item.img" alt="">
            </mt-swipe-item>
        </mt-swipe>

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
</style>