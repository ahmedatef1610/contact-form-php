<?php

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel='shortcut icon' href='https://image.flaticon.com/icons/png/512/528/528261.png' type='image/x-icon'>
    <link rel='stylesheet' href='css/all.min.css'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/style.css'>
    <title>Contact Form</title>
</head>

<body>
    <div class='container'>
        <?php
            if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                // echo $_POST['username'].'<br>';
                // foreach ( $_POST as $key => $value ) {
                //     echo $key. ' => '. $value .'<br>';
                // }

                $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $phone = filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
                $message = filter_var($_POST['message'],FILTER_SANITIZE_STRING);

                $formErrors=[];
                $userError = '';
                $messageError = '';

                if ( strlen( $user )<3 ) {
                    $userError = 'username must be larger than 3 characters';
                }
                if ( strlen( $message )<10 ) {
                    $messageError = 'message can\'t be less than 10 characters';
                }
                
                if ( strlen( $user )<3 ) {
                    $formErrors[] = 'username must be larger than <strong>3</strong> characters';
                }
                if ( strlen( $message )<10 ) {
                    $formErrors[] = 'message can\'t be less than <strong>10</strong> characters';
                }
                
                $headers='From: '.$email.'\n';
                $headers.="MIME-Version: 1.0\n";
                $headers.="Content-type: text/html; charset=iso-8859-1";
                if(empty($formErrors)){

                    mail("ahmedatef1610@gmail.com","contact form",$message,$headers);

                    $user = "";
                    $email = "";
                    $phone = "";
                    $message = "";
                    $success = "<div class='alert alert-success'>We have recieved your</div>";
                }
            }
        ?>
    </div>
    <div class='container p-5'>
        <h1 class='text-center display-4'>Contact Me</h1>
        <?php if ( !empty( $formErrors ) ) { ?>
        <div class='alert alert-danger alert-dismissible fade show'>
            <button type='button' class='close' data-dismiss='alert'><span>&times;</span></button>
            <?php
                    foreach ( $formErrors as $value ) {
                        echo $value . '<br>';
                    }
                ?>
        </div>
        <?php } ?>
        <?php if ( isset( $success ) ) { echo $success;}?>
        <form class='contact-form' action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
            <div class='form-group'>
                <label for='username'>Username</label>
                <div class='input-group flex-nowrap'>
                    <div class='input-group-prepend'>
                        <span class='input-group-text'><i class='fad fa-user'></i></span>
                    </div>
                    <input type='text' class='form-control' id='username' name='username' placeholder='username'
                        value='<?php echo (isset($user))?$user:"" ?>' required>
                </div>
                <small class='form-text text-muted custom-error'>username must be larger than 3 characters</small>
                <!-- <small class = 'form-text text-muted'> <?php echo ( isset( $userError ) )? $userError : ''; ?></small> -->
            </div>
            <div class='form-group'>
                <label for='email'>Email</label>
                <div class='input-group flex-nowrap'>
                    <div class='input-group-prepend'>
                        <span class='input-group-text'><i class='fad fa-envelope'></i></span>
                    </div>
                    <input type='email' class='form-control' id='email' name='email' placeholder='email'
                        value='<?php echo (isset($email))?$email:"" ?>' required>
                </div>
                <small class='form-text text-muted custom-error'>email can't be empty</small>
            </div>
            <div class='form-group'>
                <label for='phone'>Phone</label>
                <div class='input-group flex-nowrap'>
                    <div class='input-group-prepend'>
                        <span class='input-group-text'><i class='fad fa-phone-alt'></i></span>
                    </div>
                    <input type='number' class='form-control' id='phone' name='phone' placeholder='phone'
                        value='<?php echo (isset($phone))?$phone:"" ?>' required>
                </div>
                <small class='form-text text-muted custom-error'>phone can't be empty</small>
            </div>
            <div class='form-group'>
                <label for='message'>Message</label>
                <textarea class='form-control' id='message' name='message' rows='3' placeholder='message'
                    required><?php echo (isset($message))?$message:"" ?></textarea>
                <small class='form-text text-muted custom-error'>message can't be less than 10 characters</small>
                <!-- <small class = 'form-text text-muted'> <?php echo ( isset( $messageError ) )? $messageError : ''; ?></small> -->
            </div>
            <button type='submit' class='btn btn-primary'> <i class='fad fa-paper-plane'></i> Send Message</button>
        </form>
    </div>

    <script src='js/jquery.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src="js/app.js"></script>
</body>

</html>