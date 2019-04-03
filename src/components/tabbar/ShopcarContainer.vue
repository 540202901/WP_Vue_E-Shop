<template>
    <div class="shopcar-container">
        <!--商品列表项区域-->
        <div class="goods-list">
            <div class="mui-card" v-for="(item,i) in goodslist" :key="item.id">
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                        <mt-switch
                                v-model="$store.getters.getGoodsSelected[item.id]"
                                @change="selectedChanged(item.id,$store.getters.getGoodsSelected[item.id])"
                        ></mt-switch>

                        <img :src="item.thumb_path">
                        <div class="info">
                            <h1>{{ item.title }}</h1>
                            <p>
                                <span class="price">￥{{ item.sell_price }}</span>
                                <numbox :initcount="$store.getters.getGoodsCount[item.id]"
                                        :goodsid="item.id" ></numbox>
                                <a href="#" @click.prevent="remove(item.id,i)">删除</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--结算区域-->
        <div class="mui-card" >
            <div class="mui-card-content">
                <div class="mui-card-content-inner  Settlement">
                    <div class="left">
                        <p>总计(不含运费)</p>
                        <p>已勾选商品 <span>{{ $store.getters.getGoodsCountAndAmount.count }}</span> 件,
                            总价 <span>￥{{ $store.getters.getGoodsCountAndAmount.amount }}</span></p>
                    </div>
                    <mt-button type="danger" >去结算</mt-button>
                </div>
            </div>
        </div>
        {{$store.getters.getGoodsSelected}}
    </div>
</template>

<script>
    import numbox from '../subcomponents/shopcar_numbox.vue';
    export default {
        name: "ShopcarContainer",
        data(){
            return {
                goodslist:[],//购物车中所有商品的数据
            }
        },
        created(){
            this.getGoodsList();
        },
        methods:{
            getGoodsList(){
                //获取购物车商品列表。
                //1,获取store 中定义所有商品id，拼接处一个用逗号分隔的字符串。
                var idArr = [];
                this.$store.state.car.forEach(item=>idArr.push(item.id));
                if (idArr.length <=0) {return;} //如果购物车中没有任何商品，就退出请求
                console.log('api/goods/getshopcarlist.php?ids='+ idArr.join(","));
                this.$http.get('api/goods/getshopcarlist.php?ids='+ idArr.join(",")).then(result=>{
                    this.goodslist = result.body.message;
                })
            },//获取商品购物车信息
            remove(id,index){
                //点击删除
                //删除组件内部数据：
                this.goodslist.splice(index,1);
                //删除本地数据
                this.$store.commit('removeFormCar',id);
            },//在购物车中删除商品
            selectedChanged(id,bool){
                this.$store.commit('updateGoodsSelected',{id,selected:bool});
            },//点击勾选,当勾选值被改变.
        },
        components:{
            numbox,
        },

    }
</script>

<style lang="scss" scoped>
    .shopcar-container{
        background-color: #eee;
        overflow: hidden;
        .goods-list{
            .mui-card-content-inner{
                display: flex;
                align-items:center;
            }

            img{
                width: 60px;
                height: 60px;
            }

            .info{
                display: flex;
                flex-direction:column;
                justify-content: space-between;
                h1{
                    font-size: 13px;
                    margin: 5px;
                    padding: 3px;
                }
                p{margin: 5px;}
                .price{
                    color: red;
                    font-weight: bold;
                }
            }
        }


        .Settlement{
            display:flex;
            justify-content:space-between;
            align-items:center;
            .left{
                span{
                    color: red;
                    font-weight: bold;
                    font-size: 16px;
                }
            }
        }
    }

    
</style>