### 一个webpack 构建 Vue.js 的 项目练习

#### 一，创建项目。
#### 二，添加Header和Tabbar
#### 三，为Tabbar构建路由
> 1，改造Tabbar中的a标签为路由标签router-link来绑定路由。<br>
> 2，设置路由点击高亮显示类 linkActiveClass: 'mui-active'<br>
> 3，创建路由界面，且设置路由连接展示对应路由界面

#### 四，为home首页添加轮播图
> 1，利用 vue-resource 来获取单机服务器上的 php写的JSON数据字符串 this.$http.get 获取数据<br>
> 2，将获取的数据绑定到 HOME 组件的 data 上。<br>
> 3，使用 v-for 循环渲染 data上的获取的数据，组件中必须加上 :key="任意唯一数据"<br>
> 4，在.mint-swipe-item{} 中 添加 img{} 为其设置 宽高 100%<br>

#### 五，添加首页的九宫格标签

#### 六，切换路由添加动画

#### 七，上传单机服务器测试所需数据：Local_server文件夹中的内容

#### 八，添加新闻资讯路由

> 1，添加新闻资讯组件、路由点击、路由配置。<br>
> 2，编辑新闻组件：使用Mui的media-list.html中的图文列表。<br>
> 3，为新闻组件添加列表数据和vue-resource获取新闻列表数据：this.$http.get('getNewsList.php')<br>
> 4，添加评论组件，并作为子组件挂在到NewsInfo上一份。<br>
> 5，为评论组件挂在vue-resource获取的数据(测试php静态数据，无数据库)。<br>

#### 九，添加图片分享组件：
> 1，添加组件和链接<br>
> 2，用mui的tab-top-webview-main.html模块来做导航滑动头。<br>
> 3，解决mui问题1:webpack默认打包是严格模式，而mui.js中有非严格模式代码。<br>
> 4，解决mui问题2:初始化滑动模块的代码需要写到mounted(){}钩子函数中，只有元素挂载完成初始化滑动才有效果。<br>
> 5，解决mui问题3:mui.js会与类mui-tab-item发生冲突而无法切换路由，赋值mui-tab-item样式，并将样式改名，解决问题。<br>
> 6，获取顶部导航条列表，并绑定到组件上。<br>
> 7，获取图片列表，绑定到组件上，设置组件懒加载，并为图片设置文字标题和描述。<br>
> 8，设置点击图片进入图片详情页面,设置标题和描述,评论组件及缩略图样式,以及打开大图片<br>

####  [百度链接](https://www.baidu.com/)