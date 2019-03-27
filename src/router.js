import VueRouter from 'vue-router'
//===========导入路由组件================
import HomeContainer from './components/tabbar/HomeContainer.vue'
import MemberContainer from './components/tabbar/MemberContainer.vue'
import ShopcarContainer from './components/tabbar/ShopcarContainer.vue'
import SearchContainer from './components/tabbar/SearchContainer.vue'
import NewsList from './components/news/NewsList.vue'
import NewsInfo from './components/news/NewsInfo.vue'
import PhotoList from './components/photos/PhotoList.vue'

//创建路由对象
var router = new VueRouter({
    routes:[
        { path:'/home',component: HomeContainer },//首页组件
        { path:'/',redirect: '/home' },//默认首页链接
        { path:'/member',component: MemberContainer },//会员组件
        { path:'/shopcar',component: ShopcarContainer },//购物车组件
        { path:'/search',component: SearchContainer },//搜索组件
        { path:'/home/newslist',component:NewsList },//新闻列表组件
        { path:'/home/newsinfo/:id',component:NewsInfo },//新闻详情组件
        { path:'/home/photolist',component:PhotoList},//图片分享列表组件
    ],
    linkActiveClass: 'mui-active'
});

//把路由对象暴露出去
export default router