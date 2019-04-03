//入口文件
//=============CSS全局样式=======================
import './css/main.scss'
//=============引入框架包=======================
import Vue from 'vue';
//-----------------------------------Vue-resource  ajax请求
import VueResource from 'vue-resource';//安装ajax请求组件
Vue.use(VueResource);//安装ajax请求组件
Vue.http.options.root = 'http://my.com:8000/vue/';//ajax设置根目录
//-----------------------------------Vue-preview 图片预览插件
import VuePreview from 'vue-preview';//安装图片预览插件
// Vue.use(VuePreview);//安装图片预览插件
Vue.use(VuePreview, {
    mainClass: 'pswp--minimal--dark',
    barsSize: {top: 0, bottom: 0},
    captionEl: true,
    fullscreenEl: true,
    shareEl: false,
    bgOpacity: 0.85,
    tapToClose: true,
    tapToToggleControls: false
});
//=============按需导入Mint UI组件=======================
// import { Header, Swipe, SwipeItem, Button, Lazyload } from 'mint-ui';
//
// Vue.component(Header.name, Header);//Header组件
// Vue.component(Swipe.name, Swipe);//轮播图组件
// Vue.component(SwipeItem.name, SwipeItem);//轮播图组件
// Vue.component(Button.name, Button);// 按钮组件
// Vue.use(Lazyload);//懒加载组件

import MintUI from 'mint-ui';
Vue.use(MintUI);
import 'mint-ui/lib/style.min.css';

//================导入MUI扩展=======================
import './lib/mui/dist/css/mui.min.css';
import './lib/mui/dist/css/icons-extra.css';
//=============引入自定义组件=======================
import app from './app.vue'
//=============引入路由router=======================
import VueRouter from 'vue-router';//导入路由包
Vue.use(VueRouter);//vue使用路由
//导入 router.js 模块
import router from './router.js'
//=============全局过滤器=======================
import moment from 'moment'
//时间过滤器:
Vue.filter('dateFormat',function(dateStr,pattern="YYYY-MM-DD HH:mm:ss"){
    return moment(dateStr).format(pattern);
});
//=============Vuex:全局变量存储空间：Vuex 数据状态管理插件=======================
import Vuex from 'vuex';//安装Vuex
Vue.use(Vuex);//使用Vuex
//Vuex状态管理对象：

//读取本地存储的购物车信息:如果没有就返回空数组[]
var car = JSON.parse(localStorage.getItem('car') || '[]');
//将本地存储的car储存到store上
var store = new Vuex.Store({
    state:{// this.$store.state.***
        car:car ,//将购物车数据用数组存储。存储商品数组对象
        //car中商品对象:{ id: 商品id,  count:要购买的数量,price:商品单价,selected:是否被选中(true/false)}
    },
    mutations:{//this.$store.commit('方法名称','按需唯一参数')
        addToCar(state,goodsinfo ){
            //点击加入购物车，将商品信息保存到store中的car上。
            //1，如果购物车以前就有对应商品，只需要更新数量。
            //2,如果没有就将商品数据push或unshift到car中去
            var flag = false;
            state.car.some(item=>{
                if (item.id == goodsinfo.id) {
                    item.count += parseInt(goodsinfo.count);//如果已经有商品，数量相加
                    flag = true;//如果购物车有商品就将标识符设置为有
                    return true;//如果找到就停止遍历
                }
            });
            //如果购物车没有商品，添加商品进购物车
            if (flag === false){
                state.car.unshift(goodsinfo);//将商品添加到购物车
            }
            //将购物车信息存储到本地localStorage
            localStorage.setItem('car',JSON.stringify(state.car));
        },//向购物车添加商品
        updateGoodsInfo(state,goodsinfo){
            //修改购物车中商品的数量
            state.car.some(item=>{
                if (item.id === goodsinfo.id){
                    item.count = parseInt(goodsinfo.count);
                    return true
                }
            });
            //将最新的购物车信息保存到本地
            localStorage.setItem('car',JSON.stringify(state.car));
        },//在购物车中修改商品数量
        removeFormCar(state,id){
            //根据id 删除 store购物车中删除商品数据
            state.car.some((item,i)=>{
                if (item.id === id){
                    state.car.splice(i,1);
                    return true
                }
            });
            //删除完毕后更新到本地
            localStorage.setItem('car',JSON.stringify(state.car));
        },//在购物车中删除商品
        updateGoodsSelected(state,info){
            state.car.some(item=>{
                if (item.id === info.id){
                    item.selected = info.selected;
                }
            });
            //完毕后更新到本地
            localStorage.setItem('car',JSON.stringify(state.car));
        },//购物车是否选中保存到本地服务器

    },
    getters:{//this.$store.getters.***
        getAllCount(state){//获取购物车中所有商品数量
            var num = 0;
            state.car.forEach(item=>{
                num += item.count;
            });
            return num;
        },//获取购物车中所有商品数量
        getGoodsCount(state){
          var o = {};
          state.car.forEach(item => {
              o[item.id] = item.count;
          });
          return o;
        },//获取购物车中所有商品数量
        getGoodsSelected(state){
            var o = {};//容器
            state.car.forEach(item => {
                o[item.id] = item.selected;//商品id为键，商品选中为值
            });
            return o;//将数组返回
        },//获取购物车中所有商品是否被选中
        getGoodsCountAndAmount(state){
            var o = {
                count:0,//勾选的数量
                amount:0,//勾选的总价
            };
            state.car.forEach(item=>{
                if (item.selected){
                    o.count += item.count;
                    o.amount += (item.price * item.count);
                }
            });
            return o
        },//勾选商品数量和金额计算
    }
});
//=============Vue根实例=======================
var vm = new Vue({
    el:'#app',
    render: c => c(app),
    router, //挂在 路由对象 到 VM实例
    store,//挂载 store 状态管理对象
});





