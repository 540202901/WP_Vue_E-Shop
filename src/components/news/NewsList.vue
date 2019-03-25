<template>
    <div>
        <ul class="mui-table-view">
            <li class="mui-table-view-cell mui-media" v-for="item in newslist" :key="item.id">
                <a href="javascript:;">
                    <img class="mui-media-object mui-pull-left" :src="item.img_url">
                    <div class="mui-media-body">
                         <h1>{{item.title}}</h1>
                        <p class='mui-ellipsis'>
                            <span>发表时间:{{ item.add_time | dateFormat}}</span>
                            <span>点击:{{ item.click }}次</span>
                        </p>
                    </div>
                </a>
            </li>



        </ul>

    </div>
</template>

<script>
    import { Toast } from 'mint-ui';

    export default{
        data(){
            return {
                newslist:[],
            }
        },
        created(){
            this.getNewsList();
        },
        methods:{
            getNewsList(){
                this.$http.get('getNewsList.php').then(result => {
                    if (result.body.status === 0){
                        this.newslist = result.body.message;
                    } else{
                        Toast('获取新闻列表失败!');
                    }
                })
            }
        }
    }


</script>

<style lang="scss" scoped>
    .mui-table-view{
        li{
            img{
                width: 45px;
            }
            h1{
                font-size: 14px;
                font-weight: 500;
            }
            .mui-ellipsis{
                font-size: 12px;
                color:#0269c2;
                display:flex;
                justify-content:space-between;
            }
        }
    }
</style>