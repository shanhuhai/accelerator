/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('welcome-component', require('./components/WelcomeComponent.vue').default);
//VUe.component('mytable', require('./components/MytableComponent.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import 'vue-easytable/libs/themes-base/index.css'

import {VTable,VPagination} from 'vue-easytable'
import { Button, Select,Dialog,Table,TableColumn} from 'element-ui';

Vue.component(Button.name, Button);
Vue.component(Select.name, Select);
Vue.component(Dialog.name, Dialog);
Vue.component(Table.name, Table);
Vue.component(Table.name, TableColumn);

Vue.component(VTable.name, VTable)
Vue.component(VPagination.name, VPagination)

import TableOperation  from './components/TableOperation.vue'

Vue.component(TableOperation.name, TableOperation)




const app = new Vue({
    el: '#app',
    data: function() {
        return {
            tableData: [],
            divisionData: [],//弹窗数据
            divisionDataColumns: [
                {field: 'role', title: '角色',width: 100, titleAlign: 'center',columnAlign:'left'},
                {field: 'assigned_to', title: '负责人', width: 100,titleAlign: 'center',columnAlign:'left'},
                {field: 'progress', title: '进度',width: 100, titleAlign: 'center',columnAlign:'left'},
                {field: 'deadline', title: '截止时间',width: 100, titleAlign: 'center',columnAlign:'left'},
                {field: 'actual_time', title: '实际时间',width: 100, titleAlign: 'center',columnAlign:'left'},
                {field: 'delay', title: '延期时间', width: 100,titleAlign: 'center',columnAlign:'left'},
                {field: 'delay_note', title: '延期备注', width: 100,titleAlign: 'center',columnAlign:'left'},
                {field: 'man_day', title:'工时评估', width: 100, titleAlign: 'center',columnAlign:'center'},
                {field: 'score', title: '评分', width: 100, titleAlign: 'center',columnAlign:'center'},
            ],
            dialogTableVisible: false,
            totalMissions: 0,
            page:1,
            pageSize:20,
            columns: [
                {
                  field: 'custome', title: '序号', width:50,titleAlign: 'center', columnAlign: 'center',
                     type: 'selection'
                },
                {field: 'id', title:'id', width: 60, titleAlign: 'center',columnAlign:'center',isEdit:true},
                {field: 'title', title: '任务标题', width:100, titleAlign: 'center',columnAlign:'center',isEdit:true},
                {field: 'description', title: '任务说明', width:100, titleAlign: 'center',columnAlign:'center'},
                {field: 'reviewer_id', title: '需求评审人', width:100, titleAlign: 'center',columnAlign:'left'},
                {field: 'reviewer', title: '需求评审结果', width:100, titleAlign: 'center',columnAlign:'left'},
                {field: 'tech_reviewer_id', title: '技术评审人', width:100, titleAlign: 'center',columnAlign:'left'},
                {field: 'tech_review', title: '技术评审结果', width:100, titleAlign: 'center',columnAlign:'left'},
                {field: 'note', title: '备注', width:200, titleAlign: 'center',columnAlign:'left'},
                {field: 'custome-adv', title: '操作', width:50, titleAlign: 'center',columnAlign:'center', componentName:TableOperation.name, isResize: true}
            ]
        }
    },
    components: {VTable,VPagination, TableOperation, Button, Select, Dialog, Table,TableColumn},
    methods: {
        request() {
            this.isLoading = true;
            fetch(app_url+'/api/missions?page='+this.page+'&pageSize='+this.pageSize).then(response => response.json()).then(
                json => {
                 this.tableData = json.data.data;
                 this.totalMissions = json.data.total
                }
            );
        },
        requestDel(missionId) {
            fetch(app_url+'/api/missions/'+missionId, {
                method: 'DELETE'
            }).then(response => response.json()).then(
                json => {
                    this.tableData = json.data.data;
                    this.totalMissions = json.data.total
                }
            );
        },
        requestMissionDivision(missionId){
            fetch(app_url+'/api/mission/'+missionId+'/divisions').then(response => response.json()).then(
                json => {
                    this.divisionData = json.data;
                    console.log(this.divisionData)
                }
            )
        },
        customCompFunc(params){
            console.log(params);
            if (params.type === 'delete'){ // do delete operation
                this.$delete(this.tableData,params.index);
                this.requestDel(params.rowData['id'])
            }else if (params.type === 'edit'){ // do edit operation
                alert(`行号：${params.index} 任务标题：${params.rowData['title']}`)
            }else if (params.type === 'showDivision') {
                this.dialogTableVisible = true;
                this.requestMissionDivision(params.rowData['id']);
            }
        },
        selectALL(selection) {
            console.log('select-aLL', selection)
        },
        selectChange(selection, rowData) {
            console.log('select-change', selection, rowData);
        },
        rowClick(rowIndex, rowData, column) {
            console.log(rowData.name)
        },
        cellEditDone(newValue, oldValue, rowIndex, rowData, field) {
            this.tableData[rowIndex][field] = newValue;
        },
        pageChange1(pageIndex){
            this.page = pageIndex;
            this.request();
        },

        pageSizeChange1(pageSize){
            this.pageSize = pageSize;
            this.request();
        }
    },
    created(){
        this.request();
    }
});
