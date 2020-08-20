<?php
ob_start();

if(isset($_POST['register_form']) || isset($_POST['register'])){

    extract($_POST);

    if(empty($user_first_name) || empty($user_last_name) || empty($user_phone) || empty($user_dob) || empty($user_address) || empty($user_type) || empty($user_email) || empty($user_password) || empty($user_confirm_password) || empty($user_gender)){
        //header("Location: ../register.php?value_mis=true");
        print_r($_POST);
    } else{


        include_once ("db.php");
        include_once ("functions.php");

        $user_email = mysqli_real_escape_string($connection, $user_email);
        $user_password = mysqli_real_escape_string($connection, $user_password);
        $user_confirm_password = mysqli_real_escape_string($connection, $user_confirm_password);
        $user_last_name = mysqli_real_escape_string($connection, $user_last_name);
        $user_first_name = mysqli_real_escape_string($connection, $user_first_name);
        $user_dob = mysqli_real_escape_string($connection, $user_dob);
        $user_gender = mysqli_real_escape_string($connection, $user_gender);
        $user_phone = mysqli_real_escape_string($connection, $user_phone);
        $user_type = mysqli_real_escape_string($connection, $user_type);
        $user_address = mysqli_real_escape_string($connection, $user_address);

        //echo "Reached here";

        if($user_confirm_password === $user_password){

            $query = "SELECT * FROM users WHERE user_email = '$user_email'";
            $checkuseremail = mysqli_query($connection, $query);
            //confirmQuery($checkuseremail);

            if(mysqli_num_rows($checkuseremail) > 0){
                header("Location: ../register.php?same_user=true");
            } else{

                $options = [
                    'cost' => 10,
                ];

                $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, $options);

                $add_user_query = "INSERT INTO user(user_email, user_password, user_first_name, user_last_name, user_phone, user_gender, user_dob, user_type, user_address) VALUES ('$user_email', '$hashed_password', '$user_first_name', '$user_last_name', '$user_phone', '$user_gender', '$user_dob', $user_type, '$user_address')";
                $add_user = mysqli_query($connection, $add_user_query);
                if(mysqli_error($connection)){
                    header("Location: ../register.php?error=true");
                } else{
                    $inserted_user = mysqli_insert_id($connection);

                    $add_query = "";

                    switch ($user_type) {
                        case 2:
                            $add_query = "INSERT INTO teaching_staff(teacher_qualification, user_id) VALUES ('$teacher_qualification', $inserted_user)";
                            break;

                        case 3:
                            $add_query = "INSERT INTO non_teaching_staff(user_id) VALUES ($inserted_user)";
                            break;

                        case 4:
                            $add_query = "INSERT INTO student(student_enrollment_no, user_id, class_id) VALUES ('$student_enrollment_no', $inserted_user, $class_id)";
                            break;
                    }

                    $add_person = mysqli_query($connection, $add_query);
                    confirmQuery($add_person);

                    header("Location: ../index.php");

                }
            }


        } else{

            header("Location: ../register.php?pass_match=false");
        }


    }
} else{
    die("<div class='text-center'><h3 class='text-uppercase'>You have No access <a href='../../includes/functions.php?home=true'>Go Back</a></h3></div>");
}
?>