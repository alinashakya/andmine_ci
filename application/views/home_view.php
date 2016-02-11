<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Simple Login with CodeIgniter - Private Area</title>
    </head>
    <body>
        <h1>Home</h1>
        <h2>Welcome <?php echo $username; ?>!</h2>
        <form class="navbar-form" role="search" action="/andmine_ci/index.php/home/search_keyword" method = "post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name = "keyword"size="15px; ">
                    <div class="input-group-btn">
                        <button class="btn btn-default " type="submit" value = "Search"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
            </div>
        </form>
        <div class="menu">
            <ul>
                <li><a href="home/create_user">Create User</a></li>
                 <li><a href="home/send_mail">EMail</a></li>
            </ul>
        </div>
        <form action="<?php echo base_url('index.php/home/send_mail'); ?>" method="post">
Please, enter e-mail: <input type="text" name="e-mail"><input type="submit" name="submit" value="Submit">
</form>
        <a href="home/logout">Logout</a>
    </body>
</html>