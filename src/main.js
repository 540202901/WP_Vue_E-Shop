//入口文件
//=============引入框架包=======================
import Vue from 'vue';
import './lib/mui/dist/css/mui.min.css'
//=============按需导入Mint UI组件=======================
import { Header } from 'mint-ui';

Vue.component(Header.name, Header);//Header组件

//=============引入自定义组件=======================
import app from './app.vue'


//=============Vue根实例=======================
var vm = new Vue({
    el:'#app',
    render: c => c(app)
});