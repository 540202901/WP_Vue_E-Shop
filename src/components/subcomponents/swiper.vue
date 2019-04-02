<template>
    <div>
        <mt-swipe :auto="3000">
            <!--谁使用此轮播图组件  ，谁 传swipeList数组给它-->
            <!--这就涉及到父组件向子组件传值。-->
            <mt-swipe-item v-for="item in swipeList" :key="item.url">
                <!--如果传入的数组没有img属性，有src属性，就取src属性的值-->
                <img :class="{full:isFull}" :src="item.img || item.src" alt="">

            </mt-swipe-item>
        </mt-swipe>
    </div>
</template>

<script>
    export default {
        name: "swiper",
        props:["swipeList" , "isFull"],
    }
</script>

<style lang="scss" scoped>
    /*轮播图样式*/
    .mint-swipe{
        /*轮播图高度*/
        height: 200px;

        /*轮播图图片大小*/
        .mint-swipe-item{
            text-align:center;
            img{
                /*width: 100%;*/
                height: 100%;
            }
        }
    }
    .full{
        width: 100%;
    }
</style>