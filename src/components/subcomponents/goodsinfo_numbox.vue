<template>
    <div class="mui-numbox" data-numbox-min='1' >
        <button class="mui-btn mui-btn-numbox-minus" type="button">-</button>
        <input id="test" class="mui-input-numbox" type="number" value="1"
               @change="countChanged"  ref="numbox"
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
            countChanged(){//当数字改变，触发调用父组件方法：
                this.$emit("getcount",parseInt(this.$refs.numbox.value));
            }
        },
        props:["max"],
        watch:{
            max:function(newVal, oldVal){
                mui('.mui-numbox').numbox()
                    .setOption('max',newVal);
            }
        }

    }
</script>

<style lang="scss" scoped>

</style>