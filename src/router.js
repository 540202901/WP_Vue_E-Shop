import VueRouter from 'vue-router'
//===========导入路由组件================
import HomeContainer from './components/tabbar/HomeContainer.vue'
import MemberContainer from './components/tabbar/MemberContainer.vue'
import ShopcarContainer from './components/tabbar/ShopcarContainer.vue'
import SearchContainer from './components/tabbar/SearchContainer.vue'
import NewsList from './components/news/NewsList.vue'

//创建路由对象
var router = new VueRouter({
    routes:[
        { path:'/home',component: HomeContainer },
        { path:'/',redirect: '/home' },
        { path:'/member',component: MemberContainer },
        { path:'/shopcar',component: ShopcarContainer },
        { path:'/search',component: SearchContainer },
        { path:'/home/newslist',component:NewsList },

    ],
    linkActiveClass: 'mui-active'
});

//把路由对象暴露出去
export default router