<?php
require_once 'header.php';
?>
<div class="container">
    <br>
    <br>
    <br>
    <h2>What is <b>ARCHIE</b>?</h2>
    <ul>
        <b>ARCHIE</b> is a computerized archive management system which allows you to easily browse archive articles from anywhere at anytime.
    </ul>

    <br /><h2>Why is <b>ARCHIE</b> so good for you?</h2>
    <ul>
        <li>
            It is very simple: You just have to search an article, preview and download.
        </li>
        <li>
            <b>ARCHIE</b> is an online service which means you don't have to install any software on your computer and run the risk of computer viruses, malware and adware.
        </li>
        <li>
            It allows you to download the textual versions of typewriter written articles
        </li>
        <li>
            It is really fast
        </li>
        <li>
            It's Free!
        </li>
    </ul>
    <br />
    <br />
    <br />
</div>



    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

<?php require_once 'footer.php'; ?>