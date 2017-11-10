<?php

?>
<div id="wrapper" class="toggled">
    <div class="container-fluid">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <br>
                </li>
                <li class="sidebar-brand">
                    <a href="#" class="navbar-brand" >
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span id="insertUsername"><?php echo $_SESSION["username"] ?> </span>
                    </a>
                </li>
                <li>
                    <a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</a>
                </li>
                <li>
                    <?php
                    if ($_SESSION['role']=="Archive Employee"){
                    ?>
                    <a href="addArticle.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Article</a>
                    <?php }
                    if ($_SESSION['role']=="Manager"){
                    ?>
                    <a href="manageUsers.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Mange Users</a>
                    <?php }
                    ?>
                </li>

            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
