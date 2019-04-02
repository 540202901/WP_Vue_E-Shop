<template>
    <!--<div class="goods-list">-->
         <!--<router-link-->
                 <!--class="goods-item"-->
                 <!--v-for="item in goodsList"-->
                 <!--:key="item.id"-->
                 <!--:to="'/home/goodsinfo/' + item.id"-->
                 <!--tag="div"-->
         <!--&gt;-->
                 <!--<img :src="item.img_url"  alt="" >-->
                 <!--<h1 class="title">{{ item.title }}</h1>-->
                 <!--<div class="info">-->
                     <!--<p class="price">-->
                         <!--<span class="now">￥{{ item.sell_price }}</span>-->
                         <!--<span class="old">￥{{ item.market_price }}</span>-->
                     <!--</p>-->
                     <!--<p class="sell">-->
                         <!--<span>热卖中</span>-->
                         <!--<span>剩{{ item.stock_quantity }}件</span>-->
                     <!--</p>-->
                 <!--</div>-->
         <!--</router-link>-->

        <!--<mt-button type="danger" size="large" @click="addGoods">加载更多</mt-button>-->

    <!--</div>-->


    <div class="goods-list">
        <div class="goods-item" v-for="item in goodsList" :key="item.id" @click="goDetail(item.id)" >
            <img :src="item.img_url"  alt="" >
            <h1 class="title">{{ item.title }}</h1>
            <div class="info">
                <p class="price">
                    <span class="now">￥{{ item.sell_price }}</span>
                    <span class="old">￥{{ item.market_price }}</span>
                </p>
                <p class="sell">
                    <span>热卖中</span>
                    <span>剩{{ item.stock_quantity }}件</span>
                </p>
            </div>
        </div>

        <mt-button type="danger" size="large" @click="addGoods">加载更多</mt-button>

    </div>








</template>

<script>
    import { Toast } from 'mint-ui';

    export default {
        name: "GoodsList",
        data(){
            return {
                pageIndex:1,
                goodsList:[],
            }
        },
        created(){
            this.getGoods();

        },
        methods:{
            getGoods(){//获取商品列表
                this.$http.get('api/goods/getgoods.php?pageindex=' + this.pageIndex).then(result =>{
                    if (result.body.status === 0){
                        this.goodsList = this.goodsList.concat(result.body.message);
                    }else{
                        Toast("没有更多");
                    }
                })
            },
            addGoods(){//加载更多商品列表
                this.pageIndex ++;
                this.getGoods();
            },
            goDetail(id){//编程式跳转路由
                this.$router.push('/home/goodsinfo/' + id);
            }
        }

    }
</script>

<style lang="scss" scoped>
    .goods-list{
        display:flex;
        flex-wrap:wrap;
        padding: 7px;
        justify-content:space-between;
        .goods-item{
            border:1px solid #ccc;
            width: 49%;
            box-shadow: 0 0 8px #ccc;
            margin-bottom: 7px;
            padding: 2px;
            display:flex;
            flex-direction:column;
            justify-content: space-between;
            min-height: 250px;
            img{
                width: 100%;
            }
            .title{
                font-size: 13px;
            }

            .info{
                background-color: #eee;
                p{
                    margin: 0;
                    padding: 5px;
                }
                .price{
                    .now{
                        color: red;
                        font-weight: bold;
                        font-size: 16px;
                    }
                    .old{
                        text-decoration:line-through;
                        font-size: 12px;
                        margin-left: 10px;
                    }
                }
                .sell{
                    display: flex;
                    justify-content: space-between;
                    font-size: 12px;
                }
            }
        }
    }



</style>