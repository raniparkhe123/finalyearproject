<?php
ob_start();
session_start();

include_once ("db.php");

function confirmQuery($result){
    global $connection;
    if(!$result){
        die("Query Failed".mysqli_error($connection));
    }
}

function getNumberOfUsers(){
    global $connection;

    $query = "SELECT COUNT(*) as num_users FROM user";
    $number_users = mysqli_query($connection, $query);
    confirmQuery($number_users);

    $row = mysqli_fetch_assoc($number_users);
    return $row['num_users'];

}

function getNumberOfStudents(){
    global $connection;

    $query = "SELECT COUNT(*) as num_users FROM student";
    $number_users = mysqli_query($connection, $query);
    confirmQuery($number_users);

    $row = mysqli_fetch_assoc($number_users);
    return $row['num_users'];

}

function getNumberOfTeachers(){
    global $connection;

    $query = "SELECT COUNT(*) as num_users FROM teaching_staff";
    $number_users = mysqli_query($connection, $query);
    confirmQuery($number_users);

    $row = mysqli_fetch_assoc($number_users);
    return $row['num_users'];

}

function getNumberOfNonTeaching(){
    global $connection;

    $query = "SELECT COUNT(*) as num_users FROM non_teaching_staff";
    $number_users = mysqli_query($connection, $query);
    confirmQuery($number_users);

    $row = mysqli_fetch_assoc($number_users);
    return $row['num_users'];

}

function getSubjectDetails($subject_id){
    global $connection;
    $query = "SELECT * FROM subject, class, teaching_staff, department, user WHERE subject.class_id = class.class_id AND teaching_staff.tid = subject.tid AND teaching_staff.user_id = user.user_id AND department.department_id = class.department_id AND subject_id = $subject_id";
    $details = mysqli_query($connection, $query);
    confirmQuery($query);

    if($row = mysqli_fetch_assoc($details))
        return $row;
}

function getClassDetails($class_id){
    global $connection;
    $query = "SELECT * FROM class, department WHERE department.department_id = class.department_id AND class_id = $class_id";
    $details = mysqli_query($connection, $query);
    confirmQuery($query);

    if($row = mysqli_fetch_assoc($details))
        return $row;
}

function getDepartmentDetails($department_id){
    global $connection;
    $query = "SELECT * FROM department WHERE department_id = $department_id";
    $details = mysqli_query($connection, $query);
    confirmQuery($query);

    if($row = mysqli_fetch_assoc($details))
        return $row;
}

function deleteData($table_name, $condition, $value){

    global $connection;

    $delete_query = "DELETE FROM $table_name WHERE $condition = $value";
    $delete = mysqli_query($connection, $delete_query);
    confirmQuery($delete);

}

function isUserLoggedIn(){
    if(!(isset($_SESSION['user_id']) && isset($_SESSION['user_type']))){
        die("<div class='text-center'><h3 class='text-uppercase'>You have not Logged in please login from <a href='index.php'>here</a></h3></div>");
    }
}

function getStudentDetails($user_id){

    global $connection;

    $query = "SELECT * FROM student, class WHERE student.class_id = class.class_id AND student.user_id = $user_id";
    $student_id = mysqli_query($connection, $query);
    confirmQuery($student_id);

    if($row = mysqli_fetch_assoc($student_id))
        return $row;

}

function getTeacherDetails($user_id){

    global $connection;

    $query = "SELECT * FROM teaching_staff WHERE user_id = $user_id";
    $teacher_id = mysqli_query($connection, $query);
    confirmQuery($teacher_id);

    if($row = mysqli_fetch_assoc($teacher_id))
        return $row;

}

function getStudentId($user_id){

    global $connection;

    $query = "SELECT sid FROM student WHERE user_id = $user_id";
    $student_id = mysqli_query($connection, $query);
    confirmQuery($student_id);

    if($row = mysqli_fetch_assoc($student_id))
        return $row['sid'];

}

function getUserDetails($user_id){

    global $connection;

    $query = "SELECT * FROM user WHERE user_id = $user_id";
    $user = mysqli_query($connection, $query);
    confirmQuery($user);

    return $row = mysqli_fetch_assoc($user);
}

function getConcessionDetails($railway_id){

    global $connection;

    $query = "SELECT * FROM railway, student WHERE railway.sid = student.sid AND r_id = $railway_id";
    $railway_details = mysqli_query($connection, $query);
    confirmQuery($railway_details);

    return $row = mysqli_fetch_assoc($railway_details);
}

function updateStatusRailway($r_id, $new_status){
    global $connection;

    $query = "UPDATE railway SET status = '$new_status' WHERE r_id = $r_id";
    $update_railway = mysqli_query($connection, $query);
    confirmQuery($update_railway);

}


function getMarksDetails($mid){
    global $connection;

    $marks_query = "SELECT * FROM marks, subject, student, user, teaching_staff WHERE marks.subject_id = subject.subject_id AND marks.sid = student.sid AND student.user_id = user.user_id AND subject.tid = teaching_staff.tid AND marks.mid = $mid";
    $marks = mysqli_query($connection, $marks_query);
    confirmQuery($marks);

    return $row = mysqli_fetch_assoc($marks);

}

function getTeacherIdFromUserId($user_id){
    global $connection;

    $query = "SELECT tid FROM teaching_staff WHERE user_id = $user_id";
    $get_tid = mysqli_query($connection, $query);
    confirmQuery($get_tid);

    if($row = mysqli_fetch_assoc($get_tid))
        return $row['tid'];
}

function getStudentsOfClass($class_id){
    global $connection;

    $query = "SELECT * FROM student, user WHERE student.user_id = user.user_id AND student.class_id = $class_id";
    $get_students = mysqli_query($connection, $query);
    confirmQuery($get_students);

    return $get_students;

}

function getSubjectsOfClass($class_id){
    global $connection;
    $user_id = $_SESSION['user_id'];
    $teacher_id = getTeacherIdFromUserId($user_id);

    $query = "SELECT * FROM subject WHERE class_id = $class_id AND tid = $teacher_id";
    $get_subjects = mysqli_query($connection, $query);
    confirmQuery($get_subjects);

    return $get_subjects;

}

function sendMailToPerson($email_id, $content, $subject){
    $emailto = $email_id;
    $emailfrom = 'helpdesk@collegemanagement.in';
    $fromname = 'no-replies College Management';
    $messagebody = $content;
    $headers =
        'Return-Path: ' . $emailfrom . "\r\n" .
        'From: ' . $fromname . ' <' . $emailfrom . '>' . "\r\n" .
        'X-Priority: 3' . "\r\n" .
        'X-Mailer: PHP ' . phpversion() .  "\r\n" .
        'Reply-To: ' . $fromname . ' <' . $emailfrom . '>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n" .
        'Content-Transfer-Encoding: 8bit' . "\r\n" .
        'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $params = '-f ' . $emailfrom;
    $test = mail($emailto, $subject, $messagebody, $headers, $params);
}

/****************************************RE-DIRECTIONS****************************************************************/

if(isset($_GET['delete_subject'])){
    $subject_id = $_GET['delete_subject'];
    deleteData('subject', 'subject_id', $subject_id);
    header("Location: ../subjects.php");
}

if(isset($_GET['delete_class'])){
    $class_id = $_GET['delete_class'];
    deleteData('class', 'class_id', $class_id);
    header("Location: ../class.php");
}

if(isset($_GET['delete_department'])){
    $dept_id = $_GET['delete_department'];
    deleteData('department', 'department_id', $dept_id);
    header("Location: ../departments.php");
}

if(isset($_GET['approve_concession'])){
    $r_id = $_GET['approve_concession'];
    updateStatusRailway($r_id, 'approved');
    $user_email = $_GET['user_x'];
    $content = "Dear Student, Your request for Railway Concession has been approved. Kindly proceed to ground floor office to collect Concession Letter";
    $message_subject = "Railway Concession";

    sendMailToPerson($user_email, $content, $message_subject);

    header("Location: ../railway.php");
}

if(isset($_GET['deny_concession'])){
    $r_id = $_GET['deny_concession'];
    updateStatusRailway($r_id, 'denied');

    $user_email = $_GET['user_x'];
    $content = "Dear Student, Your request for Railway Concession has been declined. Kindly proceed to ground floor office for any queries";
    $message_subject = "Railway Concession";

    sendMailToPerson($user_email, $content, $message_subject);

    header("Location: ../railway.php");

    header("Location: ../railway.php");
}

?>