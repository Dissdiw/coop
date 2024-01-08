<?php 
include_once 'config/db.php';

if(isset($_REQUEST['submit'])) {
    try{
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $studentid = $_REQUEST['studentid'];
        $rest = $_REQUEST['rest'];
        $estra = $_REQUEST['estra'];
        $employee_no = $_REQUEST['employee_no'];
        $std_work_date = $_REQUEST['std_work_date'];
        $std_work_hour = $_REQUEST['std_work_hour'];
        $start_date = $_REQUEST['start_date'];
        $end_date = $_REQUEST['end_date'];
        $position = $_REQUEST['position'];
        $job_des = $_REQUEST['job_des'];
        $mentor_name = $_REQUEST['mentor_name']; 
        $mentor_phone = $_REQUEST['mentor_phone'];
        $mentor_position = $_REQUEST['mentor_position'];
        $mentor_std_no = $_REQUEST['mentor_std_no'];
        $income = $_REQUEST['income'];
        $income_type = $_REQUEST['income_type'];
        $rest_choice = $_REQUEST['rest_choice'];
        $rest_payment_est = $_REQUEST['rest_payment_est'];
        $rest_payment_std = $_REQUEST['rest_payment_std'];
        $bus = $_REQUEST['bus'];
        $benefit = $_REQUEST['benefit'];
        $status = $_REQUEST['status'];

       
        $student_work_time = [
            'studentid' => $studentid,
            'estra' => $estra,
            'std_work_date' => $std_work_date,
            'std_work_hour' => $std_work_hour,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ];

        $student_rest = [
            'studentid' => $studentid,
            'estra' => $estra,
            'rest' => $rest,
            'rest_choice' => $rest_choice,
            'rest_payment_std' => $rest_payment_std,
            'rest_payment_est' => $rest_payment_est,
        ];
        
        $student_income = [
            'studentid' => $studentid,
            'estra' => $estra,
            'income' => $income,
            'income_type' => $income_type,
        ];
        
        $mentorTable = [
            'mentor_name' => $mentor_name,
            'mentor_phone' => $mentor_phone,
            'mentor_position' => $mentor_position,
            'mentor_std_no' => $mentor_std_no,
        ];

        $stmt_mentor = $conn->prepare('INSERT INTO mentor (mentor_name, mentor_phone, mentor_position, mentor_std_no)
                                        VALUES (:mentor_name, :mentor_phone, :mentor_position, :mentor_std_no)');

        $stmt_mentor->execute($mentorTable);
        $mentor_id = $conn->lastInsertId();

        $survey_request = [
            'studentid' => $studentid,
            'estra' => $estra,
            'mentor_id' => $mentor_id,
            'employee_no' => $employee_no,
            'position' => $position,
            'job_des' => $job_des,
            'bus' => $bus,
            'benefit' => $benefit,
            'status' => $status,
        ];

        $stmt_survey_request = $conn->prepare('INSERT INTO survey_request (studentid, estra, mentor_id, employee_no, position, job_des, bus, benefit, status)
                                                VALUES (:studentid, :estra, :mentor_id, :employee_no, :position, :job_des, :bus, :benefit, :status)');
        $stmt_survey_request->execute($survey_request);

        $stmt_student_income = $conn->prepare('INSERT INTO student_income (studentid, estra, income, income_type)
                                                VALUES (:studentid, :estra, :income, :income_type)');
        $stmt_student_income->execute($student_income);

        $stmt_student_rest = $conn->prepare('INSERT INTO student_rest (studentid, estra, rest, rest_choice, rest_payment_std, rest_payment_est)
                                                VALUES (:studentid, :estra, :rest, :rest_choice, :rest_payment_std, :rest_payment_est)');
        $stmt_student_rest->execute($student_rest);

        $stmt_student_work_time = $conn->prepare('INSERT INTO student_work_time (studentid, estra, std_work_date, std_work_hour, start_date, end_date)
                                                VALUES (:studentid, :estra, :std_work_date, :std_work_hour, :start_date, :end_date)');
        $stmt_student_work_time->execute($student_work_time);

        $conn->commit();

        header('location: form_sv.php');

    } catch(PDOException $e) {
        $conn->rollBack();
        echo "Error: " . $e -> getMessage();
    }
}

















?>
