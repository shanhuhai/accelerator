<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
</head>
<body>

<div id="app" style="text-align: center">
    <h1 style="margin: 10px">需求管理</h1>
    <div>
        <div style="margin: 0 auto;width: 1000px;">
            <v-table
                    :columns="columns"
                    :table-data="tableData"
                    :show-vertical-border="true"
                    :row-click="rowClick"
                    style="width:100%"
                    row-hover-color="#eee"
                    row-click-color="#edf7ff"

                    :cell-edit-done="cellEditDone"
                    is-horizontal-resize
                    column-width-drag
                    @on-custom-comp="customCompFunc"
            ></v-table>
        </div>
        <template>
            <v-pagination :total="totalMissions" :page-size="pageSize" @page-change="pageChange1" @page-size-change="pageSizeChange1"></v-pagination>
        </template>

        <el-dialog title="工作排期" :visible.sync="dialogTableVisible"   width="75%">
            <v-table
                    :width="1000"
                    :columns="divisionDataColumns"
                    :table-data="divisionData"
                    :show-vertical-border="false"
            ></v-table>
        </el-dialog>
    </div>
</div>


</body>

<script>
    window.app_url = '{{env('APP_URL')}}';
</script>
<script src="{{ asset('js/app.js') }}"></script>

</html>