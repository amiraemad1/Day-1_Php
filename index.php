<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
	<style>
		body {
			background: whitesmoke;
		}
		span.error {
			display: block;
			padding: 5px;
			color: red;
		}
		span.hidden {
			visibility: hidden;
			padding: 0;
			margin: 0;
		}
		span.success {
			display: block;
			padding: 5px;
			color: green;
		}
		span.success.hidden {
			visibility: hidden;
			padding: 0;
			margin: 0;
		}
	</style>
</head>
<body>

	<section id="contact">
 <div>
<div>

	<div>
		<h2>Contacts Us</h2>
			<?php
					// define variables and set to empty values
				$nameErr = $emailErr = $messageErr = "";
				$name = $email =$message = "";
				$submitted = 0;

				if ($_SERVER["REQUEST_METHOD"] == "POST") {
			    if (empty($_POST["name"])) {
			    $nameErr = "**Name is required";
					} else {
						 $name = clean_data($_POST["name"]);
						 $fill["name"] = $name;
							 // check if name only contains letters and whitespace
							 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
							   $nameErr = "**Invalid Name"; 
							 }
                             if (strlen($name) > 100)
                             {
                             echo "**name is too long, maximum is 100 characters";
                             }
						   }
						   
						   if (empty($_POST["email"])) {
							 $emailErr = "**Email is required";
						   } else {
							 $email = clean_data($_POST["email"]);
							 $fill["email"] = $email;
							 // check if e-mail address is true
							 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							   $emailErr = "**Invalid Email Format"; 
							 }
						   }
							 
						   if (empty($_POST["message"])) {
                            $messageErr = "**You Cannot Submit an Empty message";
                          } else {
                            $message = clean_data($_POST["message"]);
                            $fill["message"] = $message;
                          }

                          if (strlen($message) > 255)
                             {
                             echo "**message is too long, maximum is 255 characters";

                             }

						   
						}

						function clean_data($data) {
			
							$data = trim($data);
							$data = stripslashes($data);
							$data = htmlspecialchars($data);
							return $data;
						}
			
			
					?>
			<div>
					<form name="contactus" method="post" action="index.php">
				<div>
				    <span>* Name, Email  are required fields.</span>
				</div>
					<div>
				    	<div>
							<span>Name</span>
					</div>
					<div>
						<input type="text" name="name" placeholder="Name" value="<?php
						if (isset($fill["name"]) && $submitted == 0) {
							echo $fill["name"];
							}?>">
						<span class="<?php
							if (empty($nameErr)) {
						    echo "hidden";
						 } else {
							 echo "error";
							}
							?>"><?php echo $nameErr;?></span>
							</div>
							</div>
						<div>
					<div>
						<span>Email</span>
					</div>

					<div>
						<input type="text" name="email" placeholder="Email Address" value="<?php
						if (isset($fill["email"]) && $submitted == 0) {
						echo $fill["email"];
						}?>">
						<span class="<?php
						if (empty($emailErr)) {
						echo "hidden";
						} else {
						  echo "error";
						}
						?>"><?php echo $emailErr;?></span>
						</div>
							</div>
							
						<div>
							<div>
								<span>message</span>
								</div>
						<div>
							<textarea name="message" placeholder="Enter Your message Here"><?php
								if (isset($fill["message"]) && $submitted == 0) {
									echo $fill["message"];
								}?></textarea>
									<span class="<?php
										if (empty($messageErr)) {
											 echo "hidden";
										   } else {
											 echo "error";
										}
									?>"><?php echo $messageErr;?></span>
									<div>
										<input type="submit" value="Submit" class="small button" />
                                        <input id="clear" name="clear" type="reset" value="clear form" />
									</div>
								</div>
							</div>
						</form>
								
						<!-- Success message -->

<span class="success <?php if ($submitted == 0) { echo "hidden"; } ?>" >message <strong>Successfully sent</strong></span>

<?php    
             // Send email if no errors                           

            if (isset($fill)) {
				if (empty($nameErr) && empty($emailErr)) {
								
								echo "Thank you for contacting Us"	;
                                echo "<br>";
                                echo "<br>";
                                echo $name;
                                echo "<br>";
                                echo $email;
                                echo "<br>";
                                echo $message;
								$submitted = 1;
							}
						}
                     ?>


					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>