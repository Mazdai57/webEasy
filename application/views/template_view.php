<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <!-- добавляем js и jquery -->
    <script src="js/jquery-1.6.2.min.js" ></script>
    <script src="js/jquery.scrollTo-min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        function _open( url, width, height ) {
            window.open( url, '', 'width=' + width + ',height=' + height + ',left=' + ((window.innerWidth - width)/2) + ',top=' + ((window.innerHeight - height)/2) );
        }
    </script>

    
    <!-- Добавляем css -->
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <title>21 век</title>
</head>
<body>
    <?php include 'application/views/'.$content_view; ?>
</body>
</html>

