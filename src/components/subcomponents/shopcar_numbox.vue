<template>
    <div class="mui-numbox" data-numbox-min='1' style="height:25px">
        <button class="mui-btn mui-btn-numbox-minus" type="button">-</button>
        <input id="test" class="mui-input-numbox" type="number" :value="initcount"
               @change="countChanged"  ref="numbox" readonly
        />
        <button class="mui-btn mui-btn-numbox-plus" type="button">+</button>
    </div>
</template>

<script>
    import mui from '../../lib/mui/dist/js/mui.min.js';//引入mui.js模块
    export default {
        name: "goodsinfo_numbox",
        mounted(){//Mint-Ui的数字组件需要初始化，要在挂载之后初始化才有效果。
            //mui选择器：类似jquery的选择器
            mui('.mui-numbox').numbox();//初始化数字选择框组件
        },
        methods:{
            countChanged(){//数量改变了
                //修改本地存储中的数量
                this.$store.commit('updateGoodsInfo',{
                    id:this.goodsid,
                    count:this.$refs.numbox.value
                    })
            }
        },
        props:["initcount","goodsid"]

    }
</script>

<style lang="scss" scoped>

</style>