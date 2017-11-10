<?php

?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">ARCHIE</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" rel="home" href="#" title="logo">
                <img style="max-width:40px; max-height: 100px; margin-top: -7px;"
                     src="archieStyle/ArchieLogo.png">
            </a>
            <?php
            if ($_SESSION['role']=="Archive Employee"||$_SESSION['role']=="Manager"||$_SESSION['role']=="Researcher"){
            ?>
                <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
            <?php }
            ?>
            <a href="#" class="navbar-brand">ARCHIE</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php
                if ($_SESSION['role']=="Archive Employee"||$_SESSION['role']=="Manager"||$_SESSION['role']=="Researcher"){
                ?>
                <li><a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                <?php }
                ?>
                <li><a href="about.php"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if ($_SESSION['role']=="Archive Employee"||$_SESSION['role']=="Manager"||$_SESSION['role']=="Researcher"){
                ?>
                    <form action="" method="post" STYLE="display: none">
                        <input type="submit" id="logoutBtn" name="logoutBtn" value="logout" />
                    </form>
                <li><a  id ="logout" onclick="document.getElementById('logoutBtn').click();"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
                <?php }
                else{
                ?>
                <li><a  href="help.php" id ="help" ><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Help</a></li>
                <?php }
                ?>
            </ul>
        </div>
    </div>
</nav>
