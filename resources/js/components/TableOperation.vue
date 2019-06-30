<style scoped>

</style>


<template>
    <span>
        <a href="" @click.stop.prevent="update(rowData,index)" style="color:green">编辑</a>&nbsp;
        <a href="" @click.stop.prevent="deleteRow(rowData,index)">删除</a>
    </span>
</template>

<script>

    export default {
        name: 'table-operation',
        props:{
            rowData:{
                type:Object
            },
            field:{
                type:String
            },
            index:{
                type:Number
            }
        },
        methods:{
            update(){

                // 参数根据业务场景随意构造
                let params = {type:'edit',index:this.index,rowData:this.rowData};
                this.$emit('on-custom-comp',params);
            },

            deleteRow(){

                // 参数根据业务场景随意构造
                let params = {type:'delete',index:this.index};
                this.$emit('on-custom-comp',params);

            }
        }
    }
</script>