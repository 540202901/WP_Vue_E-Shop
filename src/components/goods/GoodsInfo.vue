<template>
    <div class="goodsinfo-container">
        <!--购物车小球-->
        <transition
            @before-enter = "beforeEnter"
            @enter = "enter"
            @after-enter = "afterEnter"
        >
            <div class="ball" v-show="ballFlag" ref="ball"></div>
        </transition>

        <!--商品轮播图区域-->
        <div class="mui-card">
            <div class="mui-card-content">
                <div class="mui-card-content-inner">
                    <swiper :swipe-list="swipeList" :is-full="false"></swiper>
                </div>
            </div>
        </div>

        <!--商品购买区域-->
        <div class="mui-card">
            <div class="mui-card-header">{{ goodsinfo.title }}</div>
            <div class="mui-card-content">
                <div class="mui-card-content-inner">
                    <p class="price">
                        市场价： <del>￥{{ goodsinfo.market_price }}</del>
                        &nbsp;&nbsp;销售价:<span class="now_price">￥{{ goodsinfo.sell_price }}</span>
                    </p>
                    <p>购买数量： <numbox @getcount="getSelectedCount"
                            :max="goodsinfo.stock_quantity"
                    ></numbox></p>
                    <p>
                        <mt-button type="primary" size="small">立即购买</mt-button>
                        <mt-button type="danger" size="small" @click="addToShopCar">加入购物车</mt-button>
                    </p>
                </div>
            </div>

        </div>

        <!--商品参数区域-->
        <div class="mui-card">
            <div class="mui-card-header">商品参数</div>
            <div class="mui-card-content">
                <div class="mui-card-content-inner">
                    <p>商品货号： {{ goodsinfo.goods_no }}</p>
                    <p>库存情况： {{ goodsinfo.stock_quantity }} 件</p>
                    <p>上架时间： {{ goodsinfo.add_time | dateFormat }}</p>
                </div>
            </div>
            <div class="mui-card-footer">
                <mt-button type="primary" size="large" plain @click="goDesc(id)">图文介绍</mt-button>
                <mt-button type="danger" size="large" plain @click="goComment(id)">商品评论</mt-button>
            </div>
        </div>

    </div>
</template>

<script>
    //<!--导入轮播图组件-->
    import swiper from '../subcomponents/swiper.vue';
    //导入数量组件
    import numbox from '../subcomponents/goodsinfo_numbox.vue';

    export default {
        name: "GoodsInfo",
        data(){
            return {
                id:this.$route.params.id,//路由获取id挂载到Vue的id 上
                swipeList:[],//轮播图数据
                goodsinfo:{},//获取商品信息
                ballFlag:false,//小球隐藏和显示的标识符
                selectedCount:1,//保存加入购物车数量的值 默认1
            }
        },
        created(){
            this.getLunBoTu();
            this.getGoodsInfo();
        },
        methods:{
            getLunBoTu(){//获取轮播图图片
                this.$http.get('api/photos/getthumimages.php?id='+this.id).then(result=>{
                    if (result.body.status===0){
                        //方法1：在绑定数据之前，先创建img属性，值等于原本的src属性
                        //方法1：因为轮播图组件只认识img属性，不认识src属性
                            // result.body.message.forEach(item=>{
                            //     item.img=item.src;
                            // });
                        //方法2：<!--如果传入的数组没有img属性，有src属性，就取src属性的值-->
                        //方法2：<img :src="item.img || item.src" alt="">
                        this.swipeList = result.body.message;
                    }
                })
            },//获取轮播图图片
            getGoodsInfo(){
                //获取商品的详细信息
                this.$http.get('api/goods/getinfo.php?id=' + this.id).then(result =>{
                    if (result.body.status === 0){
                        this.goodsinfo = result.body.message[0];
                    }
                })
            },//获取商品的详细信息
            goDesc(id){//跳转图文介绍组件
                this.$router.push({ name:'goodsdesc' , params:id });
            },
            goComment(id){//跳转商品评论组件
                this.$router.push({ name:'goodscomment' , params:id });
            },//跳转商品评论组件
            addToShopCar(){//加入购物车
                this.ballFlag = true;//是否显示小球的标识符
                //car中商品对象:{ id: 商品id,  count:要购买的数量,price:商品单价,selected:是否被选中(true/false)}
                var goodsinfo = {
                    id: this.id,
                    count:this.selectedCount,
                    price:this.goodsinfo.sell_price,
                    selected:false
                };
                //将商品信息goodsinfo提交到购物车方法addToCar中
                this.$store.commit('addToCar', goodsinfo);


            },//加入购物车
            //半场动画钩子函数
            beforeEnter(el){
                //进入动画之前 el：元素
                el.style.transform = "translate(0,0)";//偏移位置默认在原点
            },
            enter(el,done){
                //进入过程el：元素,done：结束钩子函数对象

                //1，获取小球的相对坐标
                const ballPosition = this.$refs.ball.getBoundingClientRect();
                //2,获取购物车相对坐标
                const badgePosition = document.getElementById('badge')
                    .getBoundingClientRect();
                //3,计算差距值：
                const xDist = badgePosition.left - ballPosition.left;
                const yDist = badgePosition.top - ballPosition.top;

                el.offsetWidth;//不加没有动画，所以一定要加上一句类似的
                el.style.transform = `translate(${xDist}px,${yDist}px)`;//偏移位置最终位置
                // el.style.transition = "all 1s ease";//动画配置
                el.style.transition = "all 0.5s cubic-bezier(.53,-0.2,1,.69)";//设置为贝塞尔动画

                done();//调用下一步
            },
            afterEnter(el){
                //进入动画之后，el:元素
                this.ballFlag = false;//将标识符取非隐藏小球
            },
            //数字子组件向父组件传递加入购物车的值
            getSelectedCount(count){
                this.selectedCount = count;
                console.log(this.selectedCount);
            },

        },
        components:{
            swiper,
            numbox
        }//挂载的组件
    }
</script>

<style lang="scss" scoped>
    .goodsinfo-container{
        background-color: #eee;
        overflow:hidden;
        .now_price{
            color:red;
            font-size: 16px;
            font-weight: bold;
        }
        .mui-card-footer{
            display:block;
            button{
                margin: 15px 0;
            }
        }

        .ball{
            width: 15px;
            height:15px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            background-color: red;
            position: absolute;
            z-index: 99;
            top: 390px;
            left: 151px;
        }



    }

</style>