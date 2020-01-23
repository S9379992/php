<?php
      $error = ""; 
      $successMessage = ""; 
      if($_POST){
          
        //   checks that email field not empty 
                if(!$_POST['email']){  
                    $error.="An email address is required!.<br>";
                }
                if(!$_POST['subject']){  
                    $error.="A subject is required!.<br>";
                }
                if(!$_POST['content']){  
                    $error.="A content is required!.<br>";
                }

                if ($_POST["email"] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false) {
                    $error.="An email address is not valid!.<br>";
                  }
            
                if ($error!=""){
                    $error='<div class="alert alert-danger" role="alert"><p><strong>There were errors:</strong></p>'.$error.'</div>'; 
                }
                else {
                    $emailTo = "svetlanazagorulko95@gmail.com"; 
                    $subject = $_POST['subject']; 
                    $content = $_POST['content']; 
                    $headers = "From:". $_POST['email']; 

                    if (mail($emailTo,$subject,$content,$headers)){
                        $successMessage = '<div class="alert alert-success" role="alert"><p><strong>Your message was sent, I will get up to you...Thank you!</strong></p></div>'; 
                    }else{
                        $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message could not be sent... please, try again later...</strong></p></div>'; 
                    }

                }

      }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h1 class="text-center">Get in touch!</h1>
    <p class="font-weight-normal, text-center">Hello, my dear friend!</p>
    <p class="font-weight-normal, text-center">This page was created with Bootstrap and php. Through this form you can send me any message and I will try to respond you ASAP!</p>
    <div id="error"><?php echo $error.$successMessage;   ?></div> 
    <form id="form" method="post">
    <!-- email  -->
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your address here">
            </div>
            <label class="text-secondary">We'll never share your email with anyone else</label>
            
    <!-- subject -->
            <div class="form-group">
                <label for="exampleFormControlInput1">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" >
            </div>
    <!-- what would you like to ask?  -->
            <div class="form-group">
                <label for="exampleFormControlInput1">What would you like to ask? </label>
                <br>
                <textarea class="form-control" id="content" name="content" ></textarea>
            </div>
    <!-- submit button  -->
    <div class="text-center">
    <button class="btn btn-primary " type="submit">Submit</button>
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

            <script  type="text/javascript">
                $("form").submit(function (e){
                   
                    var error = ""; 
                
                if ($("#email").val() == ""){
                    error+="<p>The email field is required!</p>";
                }
                
                if ($("#subject").val() == ""){
                    error+="<p>The subject field is required!</p>";
                }

                if ($("#content").val() == ""){
                    error+="<p>The content field is required!</p>";
                }

                if (error!=""){
                    $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were errors:</strong></p>'+error+'</div>'); 
                    return false; 
                }else{
                    return true; 
                }
                   

                    }); 

            </script>
            
            
            
<?php
    
?>

</body>
</html>

