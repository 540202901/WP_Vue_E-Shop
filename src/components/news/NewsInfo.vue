<template>
    <div class="newsinfo-container">
        <router-link to="/home/newslist" class="back mui-action-back mui-icon mui-icon-left-nav mui-pull-left"><span>返回</span></router-link>

        <h3 class="title">{{ newsinfo.title }}</h3>
        <p class="subtitle">
            <span>发表时间:{{ newsinfo.add_time | dateFormat  }}</span>
            <span>点击:{{ newsinfo.click }}次</span>
        </p>

        <hr>

        <div class="content" v-html="newsinfo.content"></div>
        <!--将id传给子组件-->
        <comment-box :id="this.id"></comment-box>
    </div>
</template>

<script>
    import comment from "../subcomponents/comment.vue"

    export default {
        name: "NewsInfo",
        data(){
            return {
                // id:this.$route.params.id,//获取URL地址传递过来的ID挂在data上方便调用
                id:this.$route.params.id === 1? 1:1,//暂时没有其他数据 只能全1
                newsinfo:{},//新闻对象
            }
        },
        created(){
            this.getNewsInfo();
        },
        methods:{
            getNewsInfo(){
                this.$http.get("api/getnew/" + this.id +".php").then(result =>{
                    if (result.body.status === 0){
                        this.newsinfo = result.body.message[0];
                    } else {

                    }
                })
            }
        },
        components:{
            "comment-box":comment
        }

    }
</script>

<style lang="scss" >
    .newsinfo-container{
        padding: 0 4px;
        .title{
            font-size: 16px;
            text-align:center;
            margin: 15px 0;
            color: red;
        }
        .subtitle{
            font-size: 13px;
            color: #226aff;
            display:flex;
            justify-content:space-between;
        }
        .content{
            img{
                display:block;
                margin: 0 auto;
                width: 100%;
            }
        }
    }


</style>