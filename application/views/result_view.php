<html>
    <head></head>
    <body>
        <table>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Password</td>
            </tr>
            <?php foreach ($results as $r): ?>
                <tr>

                    <td> <?php echo $r->id; ?></td>
                    <td> <?php echo $r->username; ?></td>
                    <td> <?php echo $r->password; ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </body>
</html>
