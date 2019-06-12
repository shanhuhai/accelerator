<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



<div id="blog-posts-events-demo">
    <ol>
        <li v-for="m in missions">
            @{{m.title}}
        </li>
    </ol>
</div>



<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>



<script>


    new Vue({
        el:'#blog-posts-events-demo',
        data: {
            missions: [],
        },
        created () {
            fetch('http://pms.loc/api/missions')
                .then(response => response.json())
        .then(json => {
                this.missions = json.data
        })}
    })
</script>
</body>
</html>