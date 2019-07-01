<style scoped>

</style>


<template>
    <div>
    <span>
        <a href="" @click.stop.prevent="showDivision(rowData,index)" style="color:green">排期</a>&nbsp;
        <a href="" @click.stop.prevent="update(rowData,index)" style="color:green">编辑</a>&nbsp;
        <a href="" @click.stop.prevent="deleteRow(rowData,index)">删除</a>
    </span>
    <el-button type="text" @click="dialogTableVisible = true">打开嵌套表格的 Dialog</el-button>

    <el-dialog title="收货地址" :visible.sync="dialogTableVisible">
        <el-table :data="gridData">
            <el-table-column property="date" label="日期" width="150"></el-table-column>
            <el-table-column property="name" label="姓名" width="200"></el-table-column>
            <el-table-column property="address" label="地址"></el-table-column>
        </el-table>
    </el-dialog>
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
        data() {
            return {
                gridData: [{
                    date: '2016-05-02',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }, {
                    date: '2016-05-04',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }, {
                    date: '2016-05-01',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }, {
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }],
                dialogTableVisible: false,
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
            },
            showDivision(){
                let params = {type:'showDivision', index: this.index};
                this.$emit('on-custom-comp', params)
            }
        }
    }
</script>