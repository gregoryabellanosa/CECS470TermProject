#!/usr/local/php5/bin/php-cgi
<?php
session_start();

$contactNameErr = $emailErr = $phoneNumberErr = $subjectErr  = $messageTypeErr = $msgErr = $contactName = $email = $phoneNumber = $subject = $messageType = $msg = "";
 

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validation for contact name
    if (empty($_POST["contactName"])) {
        $contactNameErr = "Name is required.";
    } else {
        $contactName = test_input($_POST["contactName"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $contactName)) {
            $contactNameErr = "Only letters and whitespace allowed."; 
            $contactName = "";
        }
    }

    // Validation for email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required.";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format."; 
            $email = "";
        }
    }
    
    // Validation for phone number
    $phoneNumber = test_input($_POST["phoneNumber"]);
    // check if phone number is 9 digits long if entered
    if (!empty($_POST["phoneNumber"])){
        if (!preg_match("/^[0-9]{9}$/", phoneNumber)) {
            $phoneNumberErr = "Phone number must be 9 digits long (including area code)."; 
            $phoneNumber = "";
        }
    }

    // Validation for subject
    if (empty($_POST["subject"])) {
        $subjectErr = "Subject is required.";
    } else {
        $subject = test_input($_POST["subject"]);
    }

    // Validation for message type
    if (empty($_POST["messageType"])) {
        $messageType = "Message type is required.";
    } else {
        $messageType = test_input($_POST["messageType"]);
    }

    // Validation for message
    if (empty($_POST["msg"])) {
        $msgErr = "Message is required.";
    } else {
        $msg = test_input($_POST["msg"]);
    }
    
    if($name !== "" && $email !== "" && gender !== ""){
        $_SESSION['contactName'] = $_POST['contactName'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
        $_SESSION['subject'] = $_POST['subject'];
        $_SESSION['messageType'] = $_POST['messageType'];
        $_SESSION['msg'] = $_POST['msg'];
//        header("Location: results.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Projects | Faith Yap</title>
        <link rel="stylesheet" href="css/project-style.css">
        <link rel="stylesheet" href="css/contact-style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav>
        <a href="index.html"><img class="logo" src="img/faithyaplogo.png"></a>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="projects.html">Projects</a></li>
            <li><a href=""><i class="fa fa-download" aria-hidden="true"></i> Resume</a></li>
            <li><a class="hire" href="contact.html">Hire Me!</a></li>
        </ul>
        </nav>
        
        <div class="bluetitlesection">
            <h1>Contact Me</h1>
        </div>
        
        <div class="profilephoto">
            <img src="img/faithprofile.jpg">
        </div>


        <div class="messageform">
            <form method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>">
                
                <div class="leftformcolumn">
                    <label for="name">Your Name*</label> <br/>
                    <input type="text" id="contactName"/><br/>
                    <span class="errormsg"><?php echo $contactNameErr;?></span><br/>
                    <br/>

                    <label for="email">Your Email*</label><br/>
                    <input type="text" id= "email"/><br/>
                    <span class="errormsg"><?php echo $emailErr;?></span><br/>
                    <br/>
                </div>
                
                <div class="rightformcolumn">
                    <label for="email">Your Phone Number </label><br/>
                    <input type="text" id= "phoneNumber"/><br/>
                    <span class="errormsg"><?php echo $phoneNumberErr;?></span><br/>
                    <br/>

                    <label for="email">Subject*</label><br/>
                    <input type="text" id= "subject"/><br/>
                    <span class="errormsg"><?php echo $subjectErr;?></span><br/>
                    <br/>
                </div>
                
                
                <div class="selectionsrowform">
                    <label for="contactType1" class="choice"><input type="radio" id="contactType1" value="Job Inquiry" name="contactType">Job Inquiry</label>
                    <label for="contactType2" class="choice"><input type="radio" id="contactType2" value="Project Commission" name="contactType">Project Commission</label><br/>
                </div><br/>
                
                <div class="messagerowform">
                    <label for="message">Your Message*</label><br/>
                    <textarea rows="4" cols="60" id="message"></textarea><br/>
                    <span class="errormsg"><?php echo $msgErr;?></span><br/>
                    <br/>
                    <input type="submit" value="CONTACT ME">
                </div>
            </form> <br/><br/>
        </div>

        <div class="contactad">
            <h2>Download my resume!</h2>
            See more about my past work experiences and projects.

            <button type="button">DOWNLOAD</button><br/><br/>
        </div>
    </body>
</html>
