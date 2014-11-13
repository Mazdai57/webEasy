<form action="get_site" method="post" name = "get_site">
    <?php
        if ($data == true) {
        echo('<script type="text/javascript">setTimeout("window.close();", 1500);</script>');
        }
    ?>
    <table border = "0" cellspacing="5" cellpadding="5">
        <caption>Форма отправления письма</caption>
        <tr>
            <td align="right" valign="top">Имя</td>
            <td>
                <input type="text" name="name" size="25">
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">E-mail</td>
            <td>
                <input type="text" name="e-mail" size="25">
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Текст</td>
            <td>
                <input type="text" name="text" size="25">
            </td>
        </tr>
        <tr>
            <td collspan="2" align="right">
                <input type="submit" name="submit" value="Отправить">
                <input type="reset" name="reset" value="Очистить">
            </td>
        </tr>
    </table>
</form>


