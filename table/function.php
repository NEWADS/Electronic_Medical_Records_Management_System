<?php 
 session_start();
 $con = mysqli_connect("localhost","root","","doctor_for_test_se");
 if ($con === FALSE)
 {
    die("Connection Failed!");
 }
 mysqli_query($con,'set names utf8');

 
 function deletePatient($Name)
 {
     global $con;
     $del = 'DELETE FROM patient_test WHERE User_Name = '.$Name;
     if (mysqli_query($con, $del) === TRUE)
     {
         return 1;
     }
     else
     {
         return 0;
     } 
 }

 function QuerySQL($Dname, $id)
 {
	 global $con;
     $sql = 'SELECT Patient_Name,
                    Patient_Age,
                    Patient_Height,
                    Patient_Weight,
                    Patient_Male,
                    User_Name,
                    Sign_in_time,
                    Doctor_ID,
                    Disease_Name,
                    Discribe,
                    Solution FROM patient_test';
	 $result_patient = mysqli_query($con,$sql);
	 $result_doc = mysqli_query($con, "SELECT Doctor_ID, Doctor_Name FROM doctor_a");
     $doc = mysqli_fetch_all($result_doc);
     if ($Dname == 'Doctor_ID')
     {
         foreach ($doc as $value)
         {
            if ($_SESSION['id'] == $value[0])
            {
                return $value[1];
                break;
            }
            
         }
     }
     else
     {
         while($row = mysqli_fetch_assoc($result_patient))
         {
            if ($row['Patient_Male']== 'M' )
            {
                $row['Patient_Male'] = '男';
            }
            else
            {
                $row['Patient_Male'] = '女';
            }
            if ($row['User_Name'] == $id)
            {
                return $row[$Dname];
                break;
            }
        }       
     }
 }

 function insertPatient($array)
 {
     global $con;
     $len = count($array);
     for ($x=0;$x<$len;$x++)
     {
        if($array[$x] == '')
        {
            $array[$x] = NULL;
        }
     }
     $sql = 'INSERT INTO patient_test (Patient_Name,
                                       User_Name,
                                       Doctor_ID,
                                       Patient_Male,
                                       Patient_Age,
                                       Patient_Height,
                                       Patient_Weight,
                                       Sign_in_time,
                                       Disease_Name,
                                       Discribe,
                                       Solution)
        VALUES ('.$array[0].',
                '.$array[1].',
                '.$array[2].',
                '.$array[3].',
                '.$array[4].',
                '.$array[5].',
                '.$array[6].',
                '.$array[7].',
                '.$array[8].',
                '.$array[9].',
                '.$array[10].');';
     if (mysqli_query($con, $sql) === TRUE)
     {
         return 1;
     }
     else
     {
         return 0;
     }

 }
?>