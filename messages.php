#!/usr/local/php5/bin/php-cgi
<?php
session_start();

$servername = "cecs-db01.coe.csulb.edu";
$username = "cecs470o14";
$password = "di7a3a";
$database = "cecs470sec01og04";

// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	$error = mysqli_connect_error();
	
	// If there is a connection error
	if ($error != null) {
		$output = "<p>Unable to connect to database<p>" . $error;
        // Outputs a message and terminates the current script
        exit($output);
    }

    // Creates the sql statements
    $jobsql = "SELECT message_contactName, message_subject, message_body FROM message WHERE message_type = 'Job Inquiry'";
    $jobresult = mysqli_query($conn, $jobsql);

    $projectsql = "SELECT message_contactName, message_subject, message_body FROM message WHERE message_type = 'Project Commission'";
    $projectresult = mysqli_query($conn, $projectsql);

    $commentsql = "SELECT message_contactName, message_subject, message_body FROM message WHERE message_type = 'Comment'";
    $commentresult = mysqli_query($conn, $commentsql);

echo "<div class=\"topbanner\">This website is a student project and not a commercial site.</div>";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Contact Me | Faith Yap</title>
        <link rel="stylesheet" href="css/project-style.css">
        <link rel="stylesheet" href="css/contact-style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav>
        <a href="index.php"><img class="logo" src="img/faithyaplogo.png" alt="Faith Yap logo"></a>
        <ul>
            <li><a href="index.php">Home</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="FaithYap_Resume.pdf" download="FaithYap_Resume.pdf"><i class="fa fa-download" aria-hidden="true"></i> Resume</a></li>
                <li><a class="hire" href="contact.php">Hire Me!</a></li>
        </ul>
        </nav>
        
        <div class="bluetitlesection">
            <h1>Messages</h1>
        </div>
        
        <div class="messages">
            <h2>Job Inquiries</h2>
            <?php
					$x = 0;
					//loop through the result set
					if ($jobresult=mysqli_query($conn,$jobsql))
					{
					// Fetch one and one row
						while ($row=mysqli_fetch_assoc($jobresult))
						{
							echo "<div class=\"messagerow\">";
							echo "<h3>" . $row["message_contactName"] . "</h3>";
                            
                            echo "<strong>" . $row["message_subject"] . "</strong><br/>";
							
							echo $row["message_body"] . "<br/>";
                            echo "</div><br/>";
						}

	   					// Free result set
	    				mysqli_free_result($jobresult);
					}
				?>
        </div>
        <br/>
        
        <div class="messages">
            <h2>Project Commissions</h2>
            <?php
					$x = 0;
					//loop through the result set
					if ($projectresult=mysqli_query($conn,$projectsql))
					{
					// Fetch one and one row
						while ($row=mysqli_fetch_assoc($projectresult))
						{
                            echo "<div class=\"messagerow\">";
							echo "<h3>" . $row["message_contactName"] . "</h3>";
                            
                            echo "<strong>" . $row["message_subject"] . "</strong><br/>";
							
							echo $row["message_body"] . "<br/>";
                            echo "</div><br/>";
						}

	   					// Free result set
	    				mysqli_free_result($projectresult);
					}
				?>
        </div>
        <br/>
        <div class="messages">
            <h2>Comments</h2>
            <?php
					$x = 0;
					//loop through the result set
					if ($commentresult=mysqli_query($conn,$commentsql))
					{
					// Fetch one and one row
						while ($row=mysqli_fetch_assoc($commentresult))
						{
							echo "<div class=\"messagerow\">";
							echo "<h3>" . $row["message_contactName"] . "</h3>";
                            
                            echo "<strong>" . $row["message_subject"] . "</strong><br/>";
							
							echo $row["message_body"] . "<br/>";
                            echo "</div><br/>";
						}

	   					// Free result set
	    				mysqli_free_result($commentresult);
						
					}
				?>
        </div>
        
        <!--Closes connection after done writing info to page-->
        <?php
            mysqli_close($conn);
        ?>
        
        
        <br/><br/>
        <footer>
          <div class="footerinfo">
            <img class="logo" src="img/faithyaplogoinverted.png" alt="Faith Yap Logo">
            <div class="createdby">
              <h4>Website Created By:</h4>
              <p><i class="fa fa-male"></i> &nbsp;Gregory Abellanosa [ <a href="mailto:gregoryabellanosa@gmail.com">gregoryabellanosa@gmail.com</a> ]</p>
              <p><i class="fa fa-female"></i> &nbsp;Caren Briones [ <a href="mailto:carenpbriones@gmail.com">carenpbriones@gmail.com</a> ]</p>
              <p><i class="fa fa-male"></i> &nbsp;Marco Tran [ <a href="mailto:mtran0132@gmail.com">mtran0132@gmail.com</a> ]</p>
              <hr>
              <?php echo "<p>Last modified: " . date ("F d Y H:i:s.", getlastmod()) . "</p>"; ?>
            </div>
            <p><a href="index.php">Home</a> | <a class="currentpage" href="projects.php">Projects</a> | <a href="FaithYap_Resume.pdf" download="FaithYap_Resume.pdf"><i class="fa fa-download" aria-hidden="true"></i> Download Resume</a> | <a href="contact.php">Contact</a> </p>
          </div>
        </footer>
    </body>
</html>
