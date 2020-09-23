<?php

    function validate_signup(){
        $errors = array(); // empty array to store validation errors

        if(empty($_POST['name'])){
            
            $errors[] = "Please enter your name.";
        }
        elseif(!preg_match("#^[-A-Z a-z']*$#",$_POST['name'])){

            $errors[]= "Please enter your valid name.";	
	
        }

        if(empty($_POST['email'])){

            $errors[]= "Please enter your email.";

        }
        elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            
            $errors[]= "Please enter valid email."; //FILTER_VALIDATE_EMAIL predefind method to check email validation.
        }
        
        return $errors;
	
    }


    function validate_guest(){
        
        $errors = array();

        if(empty($_POST['first_name'])){
            
            $errors[] = "Please enter your first_name.";	
        }
        elseif(!preg_match("#^[-A-Z a-z']*$#",$_POST['first_name'])){

            $errors[]= "Please enter your valid first_name.";

        }

        if(empty($_POST['last_name']))
        {
            $errors[]= "Please enter your last_name.";	
        }	
        elseif(!preg_match("#^[-A-Z a-z']*$#",$_POST['last_name'])){

            $errors[]= "Please enter your valid last_name.";	

        }

        if(empty($_POST['email_address']))
        {
            $errors[]= "Please enter your email.";
        }
        elseif(!filter_var($_POST['email_address'],FILTER_VALIDATE_EMAIL))
        {
            $errors[]= "Please enter valid email."; //FILTER_VALIDATE_EMAIL predefind method to check email validation.
        }


        // Photo Validation

        if($_FILES['photo']['error'] == 0){

            $types = array('image/jpeg','image/jpg','image/png','image/gif','application/pdf'); //accept those type of array image list

            if(!in_array($_FILES['photo']['type'],$types)){

                $errors[] = "Please enter photo of type jpeg or png or gif";
            }
            
        }

        return $errors;

    }

?>