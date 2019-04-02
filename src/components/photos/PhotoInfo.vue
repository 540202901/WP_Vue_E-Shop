<template>
    <div class="photoinfo-container">
        <h3>{{ photoInfo.title }}</h3>
        <p class="subtitle">
            <span>发表时间:{{ photoInfo.add_time | dateFormat }}</span>
            <span>点击:{{ photoInfo.click }}次</span>
        </p>
        <hr>

        <!-- 缩略图区域 -->
        <div class="photoinfo-thumbs">
             <vue-preview  :slides="slide1" @close="handleClose"></vue-preview>
        </div>
        <!--描述内容区域-->
        <div class="content" v-html="photoInfo.content"></div>

        <!--放置现成的评论子组件-->
        <cmt-box :id="this.id"></cmt-box>


    </div>
</template>

<script>
    import comment from '../subcomponents/comment.vue'

    export default{
        data(){
            return {
                id:this.$route.params.id,//从路由中获取的图片id
                photoInfo:{},//图片详情
                slide1: [],//图片缩略图插件容器
            }
        },created(){
            this.getPhotoInfo();
            this.getThumbs();
        },
        methods:{
            getPhotoInfo(){//获取信息描述
                this.$http.get("api/photos/photoInfo.php?id=" + this.id).then(result =>{
                    if (result.body.status === 0){
                        this.photoInfo = result.body.message[0];
                    }
                })
            },
            getThumbs(){//获取缩略图
                this.$http.get("api/photos/getthumimages.php?id=" + this.id).then(result =>{
                    if (result.body.status === 0){
                        result.body.message.forEach(item=>{
                            item.w=1200;
                            item.h=800;
                        });
                        this.slide1 = result.body.message;
                    }
                })
            },
            handleClose () {//关闭图片预览
                // console.log('close event')
            }
        },
        components:{//注册子组件
            'cmt-box':comment
        }
    }
</script>

<style lang="scss">

    //页面标题描述样式
    .photoinfo-container{
        padding: 3px;

        h3{
            color:#26A2ff;
            font-size: 15px;
            text-align:center;
            margin: 15px 0;
        }
        .subtitle{
            font-size: 13px;
            display: flex;
            justify-content:space-between;
        }
        .content{
            font-size: 13px;
            line-height: 28px;
        }
    }
    .photoinfo-thumbs{
        width: 100%;
        .my-gallery{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content:flex-start;
            figure{
                width: 30%;
                margin: 5px !important;
                box-shadow: 0 0 5px #999,0 0 5px #999,0 0 5px #999;
                img{
                    width: 100% ;
                    height: 100%;
                    vertical-align:middle;
                }
            }
        }
    }

</style>