<template>
    <div class="app-container">
        <!-- 顶部 Header 区域-->
        <mt-header fixed title="Webpack+Vue商城项目练习"></mt-header>


        <!-- 中间的 路由 router-view 区域-->
        <transition >
          <router-view></router-view>
        </transition>

        <!-- 底部 Tabbar 区域-->
        <nav class="mui-bar mui-bar-tab">
            <router-link class="mui-tab-item-llb " to="/home">
                <span class="mui-icon mui-icon-home"></span>
                <span class="mui-tab-label">首页</span>
            </router-link>
            <router-link class="mui-tab-item-llb" to="/member">
                <span class="mui-icon mui-icon-contact"></span>
                <span class="mui-tab-label">会员</span>
            </router-link>
            <router-link class="mui-tab-item-llb" to="/shopcar">
                <span class="mui-icon mui-icon-extra mui-icon-extra-cart">
                            <span class="mui-badge">0</span>
                </span>
                <span class="mui-tab-label">购物车</span>
            </router-link>
            <router-link class="mui-tab-item-llb" to="/search">
                <span class="mui-icon mui-icon-search"></span>
                <span class="mui-tab-label">搜索</span>
            </router-link>
        </nav>




    </div>
</template>

<script>

</script>

<style lang="scss" scoped>
    .mint-header{
        z-index: 100 !important;
    }
    /*设置App页面上下边距、横轴超出隐藏、路由切换动画*/
    .app-container{
        margin-top:40px;
        margin-bottom:50px;
        overflow-x: hidden;


        /*路由动画：开始位置*/
        .v-enter{
            opacity: 0;
            transform: translateX(100%);
        }
        /*路由动画：结束位置*/
        .v-leave-to {
            opacity: 0;
            transform: translateX(-100%);
            position:absolute;
        }
        /*路由动画：动画运行进入和离开过程*/
        .v-enter-active,
        .v-leave-active{
            transition:all 0.5s;
        }



    }


    /*重写mui-tab-item解决与mui.js冲突问题*/
    .mui-bar-tab .mui-tab-item-llb.mui-active {
        color: #007aff;
    }
    .mui-bar-tab .mui-tab-item-llb {
        display: table-cell;
        overflow: hidden;
        width: 1%;
        height: 50px;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
        text-overflow: ellipsis;
        color: #929292;
    }

    .mui-bar-tab .mui-tab-item-llb .mui-icon {
        top: 3px;
        width: 24px;
        height: 24px;
        padding-top: 0;
        padding-bottom: 0;
    }

    .mui-bar-tab .mui-tab-item-llb .mui-icon ~ .mui-tab-label {
        font-size: 11px;
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>