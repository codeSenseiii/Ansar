<?php

require_once('includes/init.php');
require_once('includes/mail2.php');


?>
<?php
if(isset($_POST['submit'])) {

    $name =$_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $content = $_POST['message'];
   
	if(empty($name) or empty($email) or empty($subject) or empty($content)){
		
		$message->messg("all fields required");
		redirect_back();
	}


$sql = "INSERT INTO `contactus` (`name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$content')";
	//echo $sql;
	$mysqli->query($sql);
	if($mysqli->affected_rows==1){
		$message->messg("Message sent");
		$mail->sendmail($email,"Your Message was recieved, We will contact you soon.","Al-Ansar Contact");
		redirect_back();
	}else{
		$message->messg("Try again");
		redirect_back();
	}
}

include('layouts/links.php');
include('layouts/top-navbar.php');
?>


<!-- Page breadcrumb -->
<section id="mu-page-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-page-breadcrumb-area">
                    <h2>Contact</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb -->

<!-- Start contact  -->
<section id="mu-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-contact-area">
                    <!-- start title -->
                    <div class="mu-titlef">
                        <h2>Get in Touch</h2>
                        <p>_____________________________________________________________________________________</p>
                    </div>
                    <!-- end title -->
                    <!-- start contact content -->
                    <div class="mu-contact-content">
                        <div class="row">
                            <div class="col-md-6">
								<?php
								$message->messg();
								?>
                                <div class="mu-contact-left">
                                    <form class="contactform" action="" method="post">
                                        <p class="comment-form-author">
                                            <label for="author">Name <span class="required">*</span></label>
                                            <input type="text" required="required" size="30" value="" name="name">
                                        </p>
                                        <p class="comment-form-email">
                                            <label for="email">Email <span class="required">*</span></label>
                                            <input type="email" required="required" aria-required="true" value="" name="email">
                                        </p>
                                        <p class="comment-form-url">
                                            <label for="subject">Subject</label>
                                            <input type="text" name="subject">
                                        </p>
                                        <p class="comment-form-comment">
                                            <label for="comment">Message</label>
                                            <textarea required="required" aria-required="true" rows="8" cols="45" name="message"></textarea>
                                        </p>
                                        <p class="form-submit">
                                            <input type="submit" value="Send Message" class="mu-post-btn" name="submit">
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mu-contact-right">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d6249.345033302234!2d-80.02791918555701!3d40.45935344513505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x8834f411a7b748bd%3A0xaec8197db3de9a9e!2sCalifornia-Kirkbride%2C+Pittsburgh%2C+PA%2C+USA!3m2!1d40.4600435!2d-80.0213538!5e0!3m2!1sen!2sbd!4v1464270878470" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end contact content -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End contact  -->




<?php


include('layouts/footer.php');
include('layouts/scripts.php');

?>