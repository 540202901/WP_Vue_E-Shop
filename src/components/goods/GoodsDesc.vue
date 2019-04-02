<template>
    <div class="goodsdesc-container">
        <h3>{{ info.title }}</h3>
        <hr>
        <div class="content" v-html="info.content"></div>
    </div>
</template>

<script>
    export default {
        name: "GoodsDesc",
        data(){
            return {
                info:{},//图文介绍
                id:1,
            }
        },
        created(){
            this.getGoodsDesc();
        },
        methods:{
            getGoodsDesc(){
                this.$http.get("api/getnew/" + this.id +".php").then(result =>{
                    if (result.body.status === 0){
                        this.info = result.body.message[0];
                    }
                })
            }
        }
    }
</script>

<style lang="scss" >
    .goodsdesc-container{
        h3{
            font-size: 16px;
            color:#226aff;
            text-align:center;
            margin: 15px 0;
        }
        padding: 5px;
        .content{
            img{
                width: 100%;
            }
        }
    }
</style>