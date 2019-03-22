var path = require('path');//node语法，用来解析路径之用
//在内存中，根据指定模板页面，生成一份内存首页，把打包好的bundle自动注入页面底部
var htmlWebpackPlugin = require('html-webpack-plugin');
var VueLoaderPlugin = require('vue-loader/lib/plugin');

//webpack的配置对象：使用webpack 或 webpack-dev-server 使用到的配置文件
module.exports = {
    mode:'development',//设置模式
    performance: {
        hints: 'dev' ? false : 'warning'
    },
    entry:path.join(__dirname,'./src/main.js'),//设置入口文件,这个文件是要转译的主文件
    output:{//输出选项
        path:path.join(__dirname,'./dist'),// 转以后的输出的路径
        filename:'bundle.js' //转以后的文件名称
    },
    plugins:[
        new htmlWebpackPlugin({
            template:path.join(__dirname,'./src/index.html'),//指定模板文件路径
            filename:'index.html'//设置生成的内存页面的名词
        }),
        // . Vue-loader在15.*之后的版本都是 vue-loader的使用都是需要伴生 VueLoaderPlugin的,
        new VueLoaderPlugin()
    ],
    module:{//配置第三方模块loader
        rules:[//第三方模块匹配规则
            { test:/\.css$/,use:['style-loader','css-loader'] },//处理css文件的loader
            { test:/\.less$/,use:['style-loader','css-loader','less-loader'] },
            { test:/\.scss$/,use:['style-loader','css-loader','sass-loader'] },
            //处理图片路径的loader ?后面的是参数：limit 设置的值小于图片字节，会编码，否则不编码。
            //&name= 后面的是命名规则，如果不设置，图片名称会随机生成。
            //[hash:8]- 哈希值前8位加-   [name]  图片的原名称  .[ext]  图片的原扩展名
            //如果不设置 hash:8]- 哈希值前8位加-  如果不同图片文件夹有重名的图片，后编译的图片会覆盖先编译的图片
            { test:/\.(jpg|png|gif|bmp|jpeg)$/,use:'url-loader?limit=1000&name=[hash:8]-[name].[ext]' },
            { test:/\.(ttf|eot|svg|woff|woff2)$/,use:'url-loader'},//处理字体
            //配置babel 来解析高级ES6和ES7语法，
            // exclude:中设置不需要解析的目录，必须将nodemod剔除，否则非常卡还无法运行。
            { test:/\.js$/,use:'babel-loader', exclude:/node_modules/ },
            { test:/\.vue$/,use:'vue-loader' },//处理 .vue 文件的loader
        ]
    },
    // resolve:{
    //     alias:{//修改Vue被导入时候的包的路径
    //         "vue$":"vue/dist/vue.js"
    //     }
    // }
};