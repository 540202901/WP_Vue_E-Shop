//入口文件
//=============引入框架包=======================
import Vue from 'vue';
//=============按需导入Mint UI组件=======================
import { Header } from 'mint-ui';

Vue.component(Header.name, Header);//Header组件
//================导入MUI扩展=======================
import './lib/mui/dist/css/mui.min.css'
import './lib/mui/dist/css/icons-extra.css';
//=============引入自定义组件=======================
import app from './app.vue'
//=============引入路由router=======================
import VueRouter from 'vue-router';//导入路由包
Vue.use(VueRouter);//vue使用路由
//导入 router.js 模块
import router from './router.js'


//=============Vue根实例=======================
var vm = new Vue({
    el:'#app',
    render: c => c(app),
    router //挂在 路由对象 到 VM实例
});