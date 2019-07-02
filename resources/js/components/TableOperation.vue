<style scoped>

</style>


<template>
    <div>
    <span>
        <a href="" @click.stop.prevent="showDivision(rowData,index)" style="color:green">排期</a>&nbsp;
        <a href="" @click.stop.prevent="deleteRow(rowData,index)">删除</a>
    </span>


    </div>
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
            deleteRow(){
                // 参数根据业务场景随意构造
                let params = {type:'delete',index:this.index,rowData:this.rowData};
                this.$emit('on-custom-comp',params);
            },
            showDivision(){
                let params = {type:'showDivision', index:this.index,rowData:this.rowData};
                this.$emit('on-custom-comp', params)
            }
        }
    }
</script>