<html>
<head>
    <title></title>
    <script src="https://cdn.bootcss.com/jquery/1.8.0/jquery-1.8.0.min.js"></script>
    <script>
        $(function () {
            $('#content').hide();
            $('#url').show();
            $('[name=type]').change(function () {
                if ($(this).val() == 'show') {
                    $('#content').show();
                    $('#url').hide();
                } else {
                    $('#content').hide();
                    $('#url').show();
                }
            });
        });
    </script>
</head>
<body>
<form method="post">
    <label>
        密码:
        <input type="text" name="password">
    </label><br>
    <label>短网址:
        <input type="text" name="code" value="{{"/".uniqid()}}">
    </label><br>
    <label>类型:
        <select name="type">
            <option value="show">show</option>
            <option value="redirect" selected>redirect</option>
        </select>
    </label><br>
    <label>
        <div id="url">
            网址:
            <input type="text" name="url">
    </label><br>
    </div>
    <div id="content">
        内容:<br>
        <textarea style="width: 100%;height: 80%" name="content"></textarea><br>
    </div>

    <input type="submit">

</form>
</body>
</html>