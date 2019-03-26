<template>
    <div class="cmt-container">
        <h3>发表评论</h3>
        <hr>
        <textarea placeholder="请输入要BB的内容(最多120字)" maxlength="120"></textarea>
        <mt-button type="primary" size="large">发表评论</mt-button>
        <div class="cmt-list">

            <div class="cmt-item" v-for="(item,i) in cmtList" :key="item.add_item">
                <div class="cmt-title">
                    <span>第{{i+1}}楼</span>
                    <span>用户:{{item.user_name}}</span>
                    <span>发表时间:{{item.add_time | dateFormat}}</span>
                </div>
                <div class="cmt-body">
                    {{item.content === 'undefined' ? '此用户很懒,什么也没说!' : item.content}}
                </div>
            </div>
        </div>
        <mt-button type="danger" size="large" plain @click="getMore">加载更多</mt-button>
    </div>
</template>

<script>
    import { Toast } from  "mint-ui";

    export default {
        name: "comment",
        data(){
            return {
                cmtList:[],
                pageIndex:1,
            }
        },
        created(){
            this.getComments();
        },
        methods:{
            getComments(){
                this.$http.get("api/getnew/news_comment.php?pageIndex=" + this.pageIndex ).then(result =>{
                    if (result.body.status === 0){
                        this.cmtList = this.cmtList.concat(result.body.message);
                    } else{
                        Toast('获取评论失败!');
                    }
                })
            },
            getMore(){
                this.pageIndex++;
                this.getComments();
            }
        },
        props:['id']

    }
</script>

<style lang="scss" scoped>
    .cmt-container{
        //发表评论标题样式
        h3{
            font-size: 18px;
        }
        //评论输入框样式
        textarea{
            font-size: 14px;
            height: 85px;
            margin: 0;
        }

        //评论列表样式
        .cmt-list{
            margin: 5px 0;
            .cmt-item{
                font-size: 13px;
                .cmt-title{
                    border-radius:1px;
                    line-height: 30px;
                    background-color: #ccc;
                    span{
                        margin: 0 5px;
                    }
                }
                .cmt-body{
                    line-height: 25px;
                    text-indent:2em;//第一行文本缩进
                }
            }
        }

    }
</style>