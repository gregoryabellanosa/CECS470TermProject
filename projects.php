#!/usr/local/php5/bin/php-cgi
<?php
$servername = "cecs-db01.coe.csulb.edu";
$username = "cecs470o11";
$password = "suxoh4";
$database = 'cecs470sec01og04';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM project";
$retval = mysqli_query($conn, $sql);

if(! $retval ) {
      die('Could not get data: ' . mysql_error());
}

echo "<div class=\"topbanner\"><marquee>This website is a student project and not a commercial site.</marquee></div>";
// echo "<div class=\"topbanner\"><p>This website is a student project and not a commercial site.</p></div>";

// mysql_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Projects | Faith Yap</title>
        <link rel="stylesheet" href="css/project-style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/project.js"></script>
        <script src="js/data.js"></script>
    </head>
    <body>
        <!-- <div class="topbanner">
          <p>This website is a student project and not a commercial site.</p>
        </div> -->
        <nav>
            <a href="index.php"><img class="logo" src="img/faithyaplogo.png"></a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a class="currentpage" href="projects.php">Projects</a></li>
                <li><a href="FaithYap_Resume.pdf" download="FaithYap_Resume.pdf"><i class="fa fa-download" aria-hidden="true"></i> Resume</a></li>
                <li><a class="hire" href="contact.php">Hire Me!</a></li>
            </ul>
        </nav>
        <div class="bluetitlesection">
            <h1>My Projects</h1>
        </div>
        <?php
        $i = 0;
        while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
        {
          echo "<div id=\"project$i\" class=\"project--container\">".
               "<div class=\"project--photo\">".
               "<img src=\"img/{$row['project_img']}\">".
               "</div>".
               "<div class=\"project--text\">".
               "<h2>{$row['project_name']}</h2>".
               "<h4>{$row['project_tagline']}</h4>".
               "<br />".
               "<p>{$row['project_desc']}</p>".
               "<br />".
               "<a class=\"githublink\" href=\"{$row['project_link']}\"><i class=\"fa fa-github\" aria-hidden=\"true\"></i>&nbsp;&nbsp;GitHub Repository</a>".
               "</div>".
               "</div>".
               "<div class=\"separator\">".
               "</div>";
               $i++;
        }
        ?>
        <!-- <script>createProjectModules();</script> -->
        <br /><br /><br />
        <div class="bluetitlesection">
            <h1>Notable Experiences</h1>
        </div>
        <?php
        $sql = "SELECT * FROM experience";
        $retval = mysqli_query($conn, $sql);

        if(! $retval ) {
              die('Could not get data: ' . mysql_error());
        }

        while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
        {
          echo "<div class=\"project--container\">".
               "<div class=\"project--photo\">".
               "<img src=\"img/{$row['experience_img']}\">".
               "</div>".
               "<div class=\"project--text\">".
               "<h2>{$row['experience_name']}</h2>".
               "<h4>{$row['experience_tagline']}</h4>".
               "<br />".
               "<p>{$row['experience_desc']}</p>".
               "<br />".
               "</div>".
               "</div>".
               "<div class=\"separator\">".
               "</div>";
        }
        ?>
        <!-- <script>createExperienceModules();</script> -->
        <div class="contactad">
            <div class="contactadright">
              <a class="contactadbutton" href="contact.php">Contact Me!</a>
            </div>
            <h3>Questions about my work?</h3>
            <p>
                Reach out to me to learn more about my projects and what I learned from each one!
            </p>
        </div>
        <footer>
          <div class="footerinfo">
            <img class="logo" src="img/faithyaplogoinverted.png">
            <div class="createdby">
              <h4>Website Created By:</h4>
              <p><i class="fa fa-male"></i> &nbsp;Gregory Abellanosa [ <a href="mailto:gregoryabellanosa@gmail.com">gregoryabellanosa@gmail.com</a> ]</p>
              <p><i class="fa fa-female"></i> &nbsp;Caren Briones [ <a href="mailto:carenpbriones@gmail.com">carenpbriones@gmail.com</a> ]</p>
              <p><i class="fa fa-male"></i> &nbsp;Marco Tran [ <a href="mailto:mtran0132@gmail.com">mtran0132@gmail.com</a> ]</p>
              <hr>
              <p>Latest Update: <!--#echo var="LAST_MODIFIED"--> </p>
            </div>
            <p><a href="index.php">Home</a> | <a class="currentpage" href="projects.php">Projects</a> | <a href="FaithYap_Resume.pdf" download="FaithYap_Resume.pdf"><i class="fa fa-download" aria-hidden="true"></i> Download Resume</a> | <a href="contact.php">Contact</a> </p>
          </div>
        </footer>
    </body>
</html>
