//入口文件
//=============CSS全局样式=======================
import './css/main.scss'
//=============引入框架包=======================
import Vue from 'vue';
import VueResource from 'vue-resource';//安装ajax请求组件
Vue.use(VueResource);//安装ajax请求组件
Vue.http.options.root = 'http://localhost:8000/vue/';//ajax设置根目录
//=============按需导入Mint UI组件=======================
import { Header, Swipe, SwipeItem, Button } from 'mint-ui';

Vue.component(Header.name, Header);//Header组件
Vue.component(Swipe.name, Swipe);//轮播图组件
Vue.component(SwipeItem.name, SwipeItem);//轮播图组件
Vue.component(Button.name, Button);// 按钮组件
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



//=============Vue根实例=======================
var vm = new Vue({
    el:'#app',
    render: c => c(app),
    router //挂在 路由对象 到 VM实例
});





