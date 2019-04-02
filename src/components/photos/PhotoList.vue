<template>
    <div>
        <!--滑动代码模块-->
        <div  id="slider" class="mui-slider">
            <div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
                <div class="mui-scroll">
                    <!--:class=" item.id === 0 ? 'mui-control-item  mui-active ' : 'mui-control-item'"-->
                    <a
                       :class="['mui-control-item',item.id === 0 ? 'mui-active' : '']"
                       v-for="item in cates"
                       :key="item.id"
                       @click="getPhotoListByCateId(item.id)"
                    >
                        {{ item.title }}
                    </a>

                </div>
            </div>
        </div>

        <!--图片列表区域-->
        <ul class="photo-list">
            <router-link :to="'/home/photoinfo/'+item.id" v-for="item in photolist" :key="item.id" tag="li">
                <img v-lazy="item.img_url">
                <div class="info">
                    <h1 class="info-title">{{ item.title }}</h1>
                    <div class="info-body">{{ item.zhaiyao }}</div>
                </div>
            </router-link>
        </ul>


    </div>
</template>

<script>
    import mui from '../../lib/mui/dist/js/mui.min.js';//引入js包
    mui('.mui-scroll-wrapper').scroll({
        deceleration:0.0005//flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
    });


    export default {
        name: "PhotoList",
        data(){
            return {
                cates:[],//所有分类的列表数组
                photolist:[],//图片列表数组
            }
        },created(){
            this.getAllCategory();//创建元素后加载分类列表
            this.getPhotoListByCateId(0);//创建元素后加载图片列表
        },
        mounted(){
            mui('.mui-scroll-wrapper').scroll({
                deceleration:0.0005//flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
            });
        },methods:{
            getAllCategory(){
                //获取所有的图片分类
                this.$http.get("api/photos/cates.php").then(result =>{
                    if (result.body.status === 0){
                        //手动拼接处完整分类列表
                        result.body.message.unshift({title : '全部',id: 0});
                        this.cates = result.body.message;

                    }
                })
            },
            getPhotoListByCateId(cateId){
                //根据分类ID获取图片列表
                this.$http.get('api/photos/photolist.php?cateId=' + cateId).then(result=>{
                    if (result.body.status === 0) {
                        this.photolist = result.body.message;

                    }
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
    *{
        touch-action:pan-y;
    }


    .photo-list{
        margin: 0;
        padding: 10px;
        padding-bottom:0;

        li{
            border-radius: 3px;
            background-color: #ccc;
            text-align:center;
            list-style: none;
            margin-bottom:10px;
            padding: 0;
            box-shadow:0 0 6px #999,0 0 6px #999,0 0 6px #999;
            position: relative;
            /*line-height: 0 !important;*/
            img{
                border-radius: 3px;
                width: 100%;
                height: 100%;
                vertical-align:middle;
            }
            img[lazy=loading] {
                width: 40px;
                height: 300px;
                margin: auto;
            }
            .info{
                position: absolute;
                bottom:0;
                color:white;
                text-align: left;
                width: 100%;
                background-color: rgba(0,0,0,0.4);
                border-radius: 0 0 3px 3px;
                max-height:84px;
                .info-title{
                    text-indent:20px;
                    font-size: 15px;
                }
                .info-body{
                    text-indent:20px;
                    font-size: 13px;
                }
            }
        }


    }


</style>