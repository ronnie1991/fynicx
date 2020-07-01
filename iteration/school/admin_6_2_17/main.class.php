<?php 
class main
{
    protected $host_name='localhost';
	protected $user_name='root';
	protected $password='';
	protected $db_name='agpnserver';
	protected $connect;
	
	function __construct()
	{
		$this->conn();
	}
	function __destruct()
	{
		mysqli_close($this->connect);
	}
	function conn()
	{  
	    date_default_timezone_set('Asia/Kolkata');
		$this->connect=mysqli_connect($this->host_name,$this->user_name,$this->password,$this->db_name);	 
	}
	
	//Function Start for Admin Users
	function login()
	{
		$email=mysqli_real_escape_string($this->connect,$_POST['email_id']);
		$password=mysqli_real_escape_string($this->connect,$_POST['password']);
		$md5_password=md5($password);
		
		$login=mysqli_query($this->connect,"select * from `admin` where email='$email' and password='$md5_password' AND status='1' ");
		$rowcount=mysqli_num_rows($login);
		if($rowcount>0)
		{
		session_start();
		$_SESSION['user_email'] = $email;
           echo "
            <script type=\"text/javascript\">           
		   window.location='dashboard';
            </script>
        ";		
		
		}
		else
		return'Email Or Password is Incorrect';
	}
	function logout()
	{		
		session_destroy();
	}
	function add_admin()
 	{	
		  $name=mysqli_real_escape_string($this->connect,$_POST['admin_name']);
		  $email=mysqli_real_escape_string($this->connect,$_POST['email_id']);
		  $contact=mysqli_real_escape_string($this->connect,$_POST['cont_number']);
		  $sate=mysqli_real_escape_string($this->connect,$_POST['state_id']);
		  $city=mysqli_real_escape_string($this->connect,$_POST['city_id']);
		  $location=mysqli_real_escape_string($this->connect,$_POST['location']);
		  $address=mysqli_real_escape_string($this->connect,$_POST['address']);
		  $password=md5(mysqli_real_escape_string($this->connect,$_POST['password']));
		  $filename=$_FILES['user_img']['name'];
		  $admin_roll=mysqli_real_escape_string($this->connect,$_POST['roll']);
		  $status=mysqli_real_escape_string($this->connect,$_POST['admin_stat']);
		  $instime=time();	 
		  
	    $chk=mysqli_query($this->connect,"select * from `admin` WHERE email='$email' AND contact='$contact' ");
		$coun=mysqli_num_rows($chk);
		if($coun>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Email I.D & Contact can not be same</h5>";
		  }
		  else
		  {
		 if($filename !='')
		 {
		 $file=mysqli_real_escape_string($this->connect,$filename);
		 }
		 else
		 {
			$file='Not Uploaded'; 
		 }
		           	 
		 $insert=mysqli_query($this->connect,"INSERT INTO `admin`(`name`, `email`, `contact`, `sate`, `city`, `location`, `address`, `password`, `image`, `admin_roll`,`status`,`add_date`, `update`) VALUES ('$name','$email','$contact','$sate','$city','$location','$address','$password','$filename','$admin_roll','$status','$instime','$instime')");		 	
		move_uploaded_file($_FILES['user_img']['tmp_name'],'images/admin_user/'.$file);
		if($insert)
		{		
		return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";	
		}	
		else
		return mysqli_error($this->connect); 
		  }
	}
	//Function End for Admin Users
	
	//Function start for Class
	
	function add_class()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class_name']);
		$status=mysqli_real_escape_string($this->connect,$_POST['cl_st']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `class` WHERE class='$class' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Class name already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `class`(`class`, `status`, 
		`created_by`, `in_time`, `updated_time`) VALUES ('$class','$status',
		'$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function findallclass()
	{
		$get_all=mysqli_query($this->connect,"select * from `class` WHERE status='1' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function singelClass($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `class` 
        where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function dele_cate()
	{
		$id=$_POST['cate_id'];
		$del=mysqli_query($this->connect,"DELETE FROM `smcategory` WHERE category_id='$id' ");
		
	}
	//Function End for categories
	//Function Start for Class Section
	function add_class_section()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['sec_name']);
		$status=mysqli_real_escape_string($this->connect,$_POST['cl_sec_st']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `class_section` WHERE class='$class' AND section='$section'");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Class Section name already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `class_section`(`class`, `section`,
		`status`, `created_by`, `in_time`, `update_time`)VALUES ('$class','$section',
		'$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
    
      function ajaxClassSection($id)
	{		
		$get_all=mysqli_query($this->connect,"select * from `class_section` 
        where class='$id' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;	
	}
	function findAllClassSection()
	{
		$get_all=mysqli_query($this->connect,"select * from `class_section` ORDER BY class");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function singelClassSect($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `class_section` 
        where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	//Function End for Class Section
	//Function Start for Subject
	    function addSubject()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$subject_name=mysqli_real_escape_string($this->connect,$_POST['subj_name']);
		$status=mysqli_real_escape_string($this->connect,$_POST['subj_st']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `subject` WHERE class='$class' AND subject_name='$subject_name'");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Subject already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `subject`(`class`, 
		`subject_name`, `status`, `created_by`, `in_time`, `updated_time`) VALUES 
		('$class','$subject_name','$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function findAllSubject()
	{
		$get_all=mysqli_query($this->connect,"select * from `subject` ORDER BY class");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	 function findAjaxSubject($id)
	{		
		$get_all=mysqli_query($this->connect,"select * from `subject` 
        where class='$id' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;	
	}
	function singelSubj($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `subject` 
        where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	//Function End for Subject
	//Function Start for Student
	function add_student()
	{	
		  $year=mysqli_real_escape_string($this->connect,$_POST['amis_year']);		  
		  $class=mysqli_real_escape_string($this->connect,$_POST['class']);		  
		  $section=mysqli_real_escape_string($this->connect,$_POST['section']);		  
		  $admission_number=mysqli_real_escape_string($this->connect,$_POST['admisn_number']);		  
		  $admisn_date=mysqli_real_escape_string($this->connect,$_POST['admisn_date']);		  
		  $roll_number=mysqli_real_escape_string($this->connect,$_POST['roll_number']);		  
		  $stu_full_nm=mysqli_real_escape_string($this->connect,$_POST['student_fullnm']);		  
		  $father_name=mysqli_real_escape_string($this->connect,$_POST['father_nm']);
		  $father_telephone=mysqli_real_escape_string($this->connect,$_POST['father_tel']);
		  $father_mobile=mysqli_real_escape_string($this->connect,$_POST['father_mob']);
		  $mother_name=mysqli_real_escape_string($this->connect,$_POST['mother_nm']);		 		  
		  $mother_telephone=mysqli_real_escape_string($this->connect,$_POST['mother_tel']);		 		  
		  $mother_mobile=mysqli_real_escape_string($this->connect,$_POST['mother_mob']);		 		  
		  $family_income=mysqli_real_escape_string($this->connect,$_POST['fam_income']);
 		  $dob=mysqli_real_escape_string($this->connect,$_POST['dob']);		  
		  $age=mysqli_real_escape_string($this->connect,$_POST['age']);		  
		  $blood_group=mysqli_real_escape_string($this->connect,$_POST['bl_group']);		  
		  $father_email=mysqli_real_escape_string($this->connect,$_POST['father_email']);		  
		  $mother_email=mysqli_real_escape_string($this->connect,$_POST['mother_email']);	 	  
		  $corres_address=mysqli_real_escape_string($this->connect,$_POST['corsp_address']);			  
		  $permanent_address=mysqli_real_escape_string($this->connect,$_POST['perm_address']);			  
		  $present_school=mysqli_real_escape_string($this->connect,$_POST['naosps_address']);			  
		  $category=mysqli_real_escape_string($this->connect,$_POST['board']);			  
		  $previous_two_exams=mysqli_real_escape_string($this->connect,$_POST['pomitptfe_address']);			  
		  $brothers_sisters=mysqli_real_escape_string($this->connect,$_POST['bswarits_address']);			  
		  $info_source=mysqli_real_escape_string($this->connect,$_POST['info_source']);			  
		  $pin=mysqli_real_escape_string($this->connect,$_POST['pin']);		  
		  $religion=mysqli_real_escape_string($this->connect,$_POST['religion']);		  
		  $cast=mysqli_real_escape_string($this->connect,$_POST['cast']);		  
		  $student_img=$_FILES['student_img']['name'];		  
		  $student_document=$_FILES['student_documents']['name'];				  
		  $medical=mysqli_real_escape_string($this->connect,$_POST['medical']);		  
		  $mother_tung=mysqli_real_escape_string($this->connect,$_POST['mother_tung']);		  
		  $nationality=mysqli_real_escape_string($this->connect,$_POST['nationality']);	  
		  $password=md5($father_mobile);		  
		  $gender=mysqli_real_escape_string($this->connect,$_POST['gender']);		  
		  $hostel_status=mysqli_real_escape_string($this->connect,$_POST['hostl_stastus']);		  
		  $status=mysqli_real_escape_string($this->connect,$_POST['stu_status']);		  
		  $created_by=$_SESSION['user_email'];	  
		  $instime=time();  
	    $chk=mysqli_query($this->connect,"select * from `student_registation` WHERE 
		admission_number='$admission_number' "); 
		$coun=mysqli_num_rows($chk);		
		$chkr=mysqli_query($this->connect,"select * from `class_upgrading` WHERE 
		year='$year' AND class='$class' AND section='$section' AND roll_no='$roll_number' "); 
		$counr=mysqli_num_rows($chkr);		
		if($coun>0 || $counr>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'> Student Data Alredy Exist</h5>";
		}
		  else
		  {
		 if($student_img !='')
		 {
		 $file=mysqli_real_escape_string($this->connect,$student_img);
		 }
		 else
		 {
			$file='Not Uploaded'; 
		 }
		           	 
		 $insert=mysqli_query($this->connect, "INSERT INTO `student_registation`(
		 `admisn_year`, `admission_number`, `admisn_date`, `stu_full_nm`,
		 `mother_name`, `mother_telephone`, `mother_mobile`, `father_name`, 
		 `father_telephone`, `father_mobile`, `family_income`, `dob`, `age`,
		 `blood_group`, `father_email`, `mother_email`, `corres_address`, 
		 `permanent_address`, `present_school`, `category`, `previous_two_exams`,
		 `brothers_sisters`, `info_source`, `pin`, `religion`, `cast`, `student_img`,
		 `student_document`, `medical`, `mother_tung`, `nationality`, `user_id`,
		 `password`, `gender`,`hostel_status`,`status`, `created_by`, `in_time`, `update_time`)
		 VALUES ('$year','$admission_number','$admisn_date','$stu_full_nm','$mother_name',
		 '$mother_telephone','$mother_mobile','$father_name','$father_telephone',
		 '$father_mobile','$family_income',
		 '$dob','$age','$blood_group','$father_email','$mother_email','$corres_address',
		 '$permanent_address','$present_school','$category','$previous_two_exams',
		 '$brothers_sisters','$info_source','$pin','$religion',
		 '$cast','$student_img','$student_document','$medical','$mother_tung',
		 '$nationality','$admission_number',
		 '$password','$gender','$hostel_status','$status','$created_by','$instime',
		 '$instime')");		 	
		move_uploaded_file($_FILES['student_img']['tmp_name'],'../images/student_img/'.$file);
		$insRoll=mysqli_query($this->connect, "INSERT INTO `class_upgrading`(`year`,
		`class`, `section`,`admission_number`, `roll_no`, `created_by`, `in_time`, `update_on`)
		VALUES ('$year','$class','$section','$admission_number','$roll_number','$created_by',
		'$instime','$instime')");
		if($insert)
		{		
		return "<h5 style='color:#ff4081'>Successfully Added</h5>";	
		}	
		else
		return mysqli_error($this->connect); 
		  } 
	}
	  function ajaxAllStudent($yar)
	{	
        $get_all=mysqli_query($this->connect,"select * from `student_registation` 
        where admisn_year='$yar' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
	}
	function findallAjaxStudent($id)
	{
		$get_all=mysqli_query($this->connect,"select * from `student_registation` 
		WHERE class='$id' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function findAllStudent()
	{
		$get_all=mysqli_query($this->connect,"select * from `student_registation`
		ORDER BY id DESC");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function fndAlStuByCrCls($cls,$sec)
	{
		$curntYear=date("Y");
		$get_all=mysqli_query($this->connect,"select * from `class_upgrading`
		WHERE class='$cls' AND section='$sec' AND year='$curntYear' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function fndAlStuByCrClsFUpg($cls,$sec,$yar)
	{
		$get_all=mysqli_query($this->connect,"select * from `class_upgrading`
		WHERE year='$yar' AND class='$cls' AND section='$sec' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	 function singelStuInfo($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `student_registation` 
        where admission_number='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	 function lastSlNo()
	{		
		$get_single=mysqli_query($this->connect,"select admission_number from `student_registation` 
        ORDER BY id DESC LIMIT 1 ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	 function slNoValidation($slNo)
	{		
		$get_single=mysqli_query($this->connect,"select admission_number from
		`student_registation`  WHERE admission_number='$slNo' ");
		$count=mysqli_num_rows($get_single);
			
        if($count==1)
        {
			echo "<b style='color:red;'>Admission Number / Not Available</b>";
		}
		if($count==0)
        {
			echo "<b style='color:green;'>
		  Admission Number / Available</b>";
		}			
	}
	function rollNoVerif($rollNo,$admYr,$clsId,$secId)
	{	
      
		$get_single=mysqli_query($this->connect,"select roll_no from `class_upgrading` 
        WHERE year='$admYr' AND roll_no='$rollNo' AND class='$clsId' AND section='$secId'  ");
		$count=mysqli_num_rows($get_single);
			
        if($count==1)
        {
			echo "<b style='color:red;'>Roll Number / Not Available</b>";
		}
		if($count==0)
        {
			echo "<b style='color:green;'>
		  Roll Number / Available</b>";
		}			
	}
	function singeRollNumber($slNo,$admisYr)
	{		
		$get_single=mysqli_query($this->connect,"select * from `class_upgrading` 
        where admission_number='$slNo' AND year='$admisYr' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function lastRollNo($admYr,$class,$section)
	{		
		$get_single=mysqli_query($this->connect,"select roll_no from `class_upgrading` 
        WHERE year='$admYr' AND class='$class' AND section='$section'
		ORDER BY id DESC LIMIT 1 ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function upgradeStuCsyr($rollNo,$slNo,$year,$class,$section,$created_by)
	{	
        
       $intm=time();		
		$get_single=mysqli_query($this->connect,"INSERT INTO `class_upgrading`(`year`,
		`class`, `section`, `admission_number`, `roll_no`, `created_by`, `in_time`, 
		`update_on`) VALUES ('$year','$class','$section','$slNo',
		'$rollNo','$created_by','$intm','$intm') ");
			if($get_single)
			{
				echo 'sucess';
			}
			else
			{
				echo 'Error';
			}
	}
	function chkUpgradeStuCsyr($slNo,$upgdyar,$upgdClas,$upgdSec)
	{	 		
		$get_single=mysqli_query($this->connect,"SELECT * FROM `class_upgrading`
		WHERE year='$upgdyar' AND class='$upgdClas' AND section='$upgdSec'
		AND admission_number='$slNo' ");
	   $fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 
	}
	function emailVerif($emailId)
	{	
      
		$get_single=mysqli_query($this->connect,"select * from `student_registation` 
        WHERE father_email='$emailId' OR mother_email='$emailId' ");
		$count=mysqli_num_rows($get_single);
			
        if($count==1)
        {
			echo "<b style='color:red;'>Email Id / Not Available</b>";
		}
		if($count==0)
        {
			echo "<b style='color:green;'>
		  Email Id / Available</b>";
		}			
	}
	//Function End for Student
	//Function Start for Student Attendance	  
	
	function findAllStudentAttendance()
	{
		$get_all=mysqli_query($this->connect,"select * from `stu_attendance` ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function chkStuAttDate($cls,$sec)
	{
		 $get_all=mysqli_query($this->connect,"select * from `stu_attendance` WHERE class='$cls' AND
		section='$sec' AND MONTH(FROM_UNIXTIME(inserted)) = MONTH(CURDATE()) 
		AND YEAR(FROM_UNIXTIME(inserted)) = YEAR(CURDATE()) AND
		DATE(FROM_UNIXTIME(inserted)) = DATE(CURDATE()) ");
		$coun=mysqli_num_rows($get_all);
		return $coun; 
		
	}
	 function addProgrmdAtten($cls,$sec)
	{
		$created_by=$_SESSION['user_email'];
		$instime=time();
		$curntYear=date("Y");
		$get_all=mysqli_query($this->connect,"select * from `class_upgrading`
		WHERE class='$cls' AND section='$sec' AND year='$curntYear' ");
		while($fetch=mysqli_fetch_array($get_all))
		{
			$stuId=$fetch['admission_number'];
		$in_cate=mysqli_query($this->connect,"INSERT INTO `stu_attendance`(`class`,`section`,`st_id`,
		`attendance`, `created_by`, `inserted`, `update_on`) VALUES ('$cls','$sec','$stuId',
		'0','$created_by','$instime','$instime')");
		}
		
	}
	 function updtStuAtten($cls,$sec,$stuId,$atend)
	{
		$created_by=$_SESSION['user_email'];
		$instime=time();
		$up_atte=mysqli_query($this->connect,"UPDATE `stu_attendance` SET 
		`attendance`='$atend',`created_by`='$created_by',`update_on`='$instime'
		WHERE class='$cls' AND section='$sec' AND st_id='$stuId' AND
		MONTH(FROM_UNIXTIME(inserted)) = MONTH(CURDATE()) 
		AND YEAR(FROM_UNIXTIME(inserted)) = YEAR(CURDATE()) AND
		DATE(FROM_UNIXTIME(inserted)) = DATE(CURDATE()) ");
		
		
	}
	function singelAtendncInfo($cls,$sec,$stuId)
	{		
		$get_single=mysqli_query($this->connect,"select * from `stu_attendance` 
        where class='$cls' AND section='$sec' AND st_id='$stuId' AND
		MONTH(FROM_UNIXTIME(inserted)) = MONTH(CURDATE()) 
		AND YEAR(FROM_UNIXTIME(inserted)) = YEAR(CURDATE()) AND
		DATE(FROM_UNIXTIME(inserted)) = DATE(CURDATE())
		");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function findAllStuAteByYCS($clas,$sec,$month,$year)
	{		
		$get_all=mysqli_query($this->connect,"select * from `stu_attendance` 
        where class='$clas' AND section='$sec' AND
		MONTH(FROM_UNIXTIME(inserted)) = $month 
		AND YEAR(FROM_UNIXTIME(inserted)) = $year 
		ORDER BY `id` DESC
		");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;	
	}
	//Function End for Attendance
	//Function Start for General Admission Charges
     function addGenAdminCharg()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$admg_fees=mysqli_real_escape_string($this->connect,$_POST['gen_adm_chr']);
		$status=mysqli_real_escape_string($this->connect,$_POST['gac_status']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `general_admission_charges` WHERE class='$class'");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>General admission charges already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `general_admission_charges`(`class`, 
        `admg_fees`, `status`, `created_by`, `in_time`, `update_time`) 
         VALUES ('$class','$admg_fees','$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	 function ajaxGenrAdmisonCharges($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `general_admission_charges` 
        where class='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function receveGenAdminCharg()
	{
		$year=mysqli_real_escape_string($this->connect,$_POST['year']);
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$student_id=mysqli_real_escape_string($this->connect,$_POST['strn']);
		$payed_amount=mysqli_real_escape_string($this->connect,$_POST['recvd_gen_adm_chr']);
		$concession=mysqli_real_escape_string($this->connect,$_POST['concession']);
		$description=mysqli_real_escape_string($this->connect,$_POST['concession_desc']);
		$status=mysqli_real_escape_string($this->connect,$_POST['genadmch_sta']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `student_general_admission_charges`
		WHERE student_id='$student_id' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Student already paid</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `student_general_admission_charges`
		( `class`, `section`, `student_id`, `payed_amount`, `concession`, `description`,
		`year`, `created_by`, `status`, `in_time`, `update_time`) VALUES ('$class',
		'$section','$student_id','$payed_amount','$concession','$description',
		'$year','$created_by','$status','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function findAStuGenerlAdmisonLedger($stId,$year)
	{
		$get_single=mysqli_query($this->connect,"select * from `student_general_admission_charges` 
		WHERE student_id='$stId' AND year='$year' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
		
	}
	function findAllGenrlAdmiChargs()
	{
		$get_all=mysqli_query($this->connect,"select * from `general_admission_charges` ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function chkStuGenAdmLed($stId)
	{
		$get_single=mysqli_query($this->connect,"select * from `student_general_admission_charges` 
		WHERE student_id='$stId' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
		
	}
	//Function End for General Admission Charges
	//Function Start for Hostel Admission Charges
	function receveHostlAdminCharg()
	{
		$year=mysqli_real_escape_string($this->connect,$_POST['year']);
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$student_id=mysqli_real_escape_string($this->connect,$_POST['strn']);
		$payed_amount=mysqli_real_escape_string($this->connect,$_POST['recvd_hostl_adm_chr']);
		$concession=mysqli_real_escape_string($this->connect,$_POST['concession']);
		$description=mysqli_real_escape_string($this->connect,$_POST['concession_desc']);
		$status=mysqli_real_escape_string($this->connect,$_POST['hosadmch_sta']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `student_hostel_admission_charges`
		WHERE student_id='$student_id' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Student already paid</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `student_hostel_admission_charges`(
		`year`, `class`, `section`, `student_id`, `payed_amount`, `concession`, `description`,
		`created_by`, `status`, `in_time`, `update_time`) VALUES ('$year','$class',
		'$section','$student_id','$payed_amount','$concession','$description',
		'$created_by','$status','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	 function ajaxHostelAdmisonCharges($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `hostel_admission_charges` 
        where class='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function findAStuHostlAdmisonLedger($stId,$year)
	{
		$get_single=mysqli_query($this->connect,"select * from `student_hostel_admission_charges` 
		WHERE student_id='$stId' AND year='$year' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
		
	}
	function findAllHostelAdmiChargs()
	{
		$get_all=mysqli_query($this->connect,"select * from `hostel_admission_charges` ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function chkStuHostlAdmLed($stId)
	{
		$get_single=mysqli_query($this->connect,"select * from `student_hostel_admission_charges` 
		WHERE student_id='$stId'");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
		
	}
	//Function End for Hostel Admission Charges	
	//Function Start for Hostel Admission Charges
	   function addHostAdmCharg()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$adho_fees=mysqli_real_escape_string($this->connect,$_POST['hos_adm_cha']);
		$status=mysqli_real_escape_string($this->connect,$_POST['hac_status']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `hostel_admission_charges` WHERE class='$class'");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Hostel admission charges already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `hostel_admission_charges`(`class`, 
        `adho_fees`, `status`, `created_by`, `in_time`, `update_time`) 
         VALUES ('$class','$adho_fees','$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	 function ajaxhostelStudent($clid,$id,$year)
	{	
        $get_all=mysqli_query($this->connect,"select * from `student_hostel_admission_charges` 
        where year='$year' AND class='$clid' AND section='$id' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
	}
	//Function End for Hostel Admission Charges
	
	//Function Start for Re-Admission charges for old student 
	
	 function addReAdmisionCharges()
	{
		$year=mysqli_real_escape_string($this->connect,$_POST['year']);
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$re_admg_fees=mysqli_real_escape_string($this->connect,$_POST['re_adm_chr']);		
		$status=mysqli_real_escape_string($this->connect,$_POST['readmch_status']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `general_re_admission_charges`
		WHERE year='$year' AND class='$class'");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Re-Admission Charges already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `general_re_admission_charges`
		(`year`, `class`, `re_admg_fees`, `status`, `created_by`, `in_time`,
		`update_time`) VALUES ('$year','$class','$re_admg_fees','$status',
		'$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function findAllReadmisnAdmiChargs()
	{
		$get_all=mysqli_query($this->connect,"select * from `general_re_admission_charges` ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	 function ajaxReAdmisonCharges($id,$yar)
	{		
		$get_single=mysqli_query($this->connect,"select * from `general_re_admission_charges` 
        where year='$yar' AND class='$id'  ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function receveReAdminsonCharg()
	{
		$year=mysqli_real_escape_string($this->connect,$_POST['year']);
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$student_id=mysqli_real_escape_string($this->connect,$_POST['strn']);
		$payed_amount=mysqli_real_escape_string($this->connect,$_POST['recvd_re_adm_chr']);
		$concession=mysqli_real_escape_string($this->connect,$_POST['readmisconcesn']);
		$description=mysqli_real_escape_string($this->connect,$_POST['readmi_concession_desc']);
		$status=mysqli_real_escape_string($this->connect,$_POST['readmch_sta']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `receive_stud_readmison_charges`
		WHERE student_id='$student_id' AND year='$year' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Student already paid</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `receive_stud_readmison_charges`
		(`class`, `section`, `student_id`, `payed_amount`, `concession`,
		`description`, `year`, `created_by`, `status`, `in_time`, `update_time`) 
		VALUES ('$class','$section','$student_id','$payed_amount','$concession',
		'$description','$year','$created_by',
		'$status','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function findAlStureAdmisonLedger($stId,$year)
	{
		$get_single=mysqli_query($this->connect,"select * from `receive_stud_readmison_charges` 
		WHERE student_id='$stId' AND year='$year' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
		
	}
	//Function End for Re-Admission charges for old student 
	
	//Function Start for Hostel Fees
	  function addHotelFees()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$hostel_fees=mysqli_real_escape_string($this->connect,$_POST['hostel_fee']);
		$fess_type=mysqli_real_escape_string($this->connect,$_POST['fee_category']);
		$status=mysqli_real_escape_string($this->connect,$_POST['hosfee_status']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `hostel__fees` WHERE class='$class' AND fess_type='$fess_type' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Hostel fees already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `hostel__fees`(`class`, 
		`hostel_fees`, `fess_type`, `status`, `created_by`, `in_time`, `update_time`)
		VALUES ('$class','$hostel_fees','$fess_type','$status','$created_by',
		'$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	 function ajaxHostelfees($id,$cls)
	{		
		$get_single=mysqli_query($this->connect,"select * from `hostel__fees` 
        where class='$cls' AND fess_type='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function receveHostlFees()
	{
		$payment_year=mysqli_real_escape_string($this->connect,$_POST['year']);
		$payment_month=mysqli_real_escape_string($this->connect,$_POST['month']);
		$payment_date=mysqli_real_escape_string($this->connect,$_POST['date']);
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$fess_type=mysqli_real_escape_string($this->connect,$_POST['fee_category']);
		$student_id=mysqli_real_escape_string($this->connect,$_POST['strn']);
		$receving_amont=mysqli_real_escape_string($this->connect,$_POST['recvd_hostl_fee']);		
		$status=mysqli_real_escape_string($this->connect,$_POST['hosfee_stat']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `receive_student_hostel_fees`
		WHERE student_id='$student_id'
		AND payment_year='$payment_year' 
		AND payment_month='$payment_month' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Student already paid for this month</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `receive_student_hostel_fees`(
		 `payment_year`,`payment_month`,`payment_date`, `class`, `section`, `fess_type`, `student_id`,
		 `receving_amont`, `status`, `created_by`, `in_time`, `update_time`) VALUES 
		 ('$payment_year','$payment_month','$payment_date','$class','$section','$fess_type','$student_id','$receving_amont',
		 '$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function findAStuHostFeesLedger($stId,$year,$month)
	{
		$get_single=mysqli_query($this->connect,"select * from `receive_student_hostel_fees` 
		WHERE student_id='$stId' AND payment_year='$year' AND payment_month='$month'  ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
		
	}
	function ajaxHostelfeesByClass($id,$ftyp)
	{		
		$get_single=mysqli_query($this->connect,"select * from `hostel__fees` 
        where class='$id'AND fess_type='$ftyp' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function findAllHostelFees()
	{
		$get_all=mysqli_query($this->connect,"select * from `hostel__fees` ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	//Function End for Hostel Fees
	//Function Start for Other Annual Charges
	 function addOtherAnualCharges()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$particulars=mysqli_real_escape_string($this->connect,$_POST['particulars']);
		$charges=mysqli_real_escape_string($this->connect,$_POST['otanch']);
		$status=mysqli_real_escape_string($this->connect,$_POST['otac_status']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `other_annual_charges`
		WHERE class='$class' AND particulars='$particulars' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Other annual charges already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `other_annual_charges`(`class`,
		`particulars`, `charges`, `status`, `created_by`, `in_time`, `update_time`)
		VALUES ('$class','$particulars','$charges','$status','$created_by','$instime',
		'$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	 function ajaxOtherAnulChar($id)
	{		
		$get_all=mysqli_query($this->connect,"select * from `other_annual_charges` 
        where class='$id'");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function ajaxOtherAnulCharDetils($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `other_annual_charges` 
        where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	
	function receveOtherAnualChrgs()
	{
		$year=mysqli_real_escape_string($this->connect,$_POST['year']);		
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$particulars=mysqli_real_escape_string($this->connect,$_POST['particulars']);
		$student_id=mysqli_real_escape_string($this->connect,$_POST['strn']);
		$paid_amoount=mysqli_real_escape_string($this->connect,$_POST['recvd_anual_chr']);		
		$status=mysqli_real_escape_string($this->connect,$_POST['otanch_stat']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `receive_stud_other_annual_charges`
		WHERE student_id='$student_id' AND particulars='$particulars' AND year='$year' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Student already paid for this year</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `receive_stud_other_annual_charges`
		( `year`, `class`, `section`, `particulars`, `student_id`, `paid_amoount`,
		`status`, `created_by`, `in_time`, `update_time`) VALUES ('$year',
		'$class','$section','$particulars','$student_id','$paid_amoount','$status',
		'$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function findAStuOtherAnualChrLed($stId,$year,$particulars)
	{
		
		$get_single=mysqli_query($this->connect,"select * from `receive_stud_other_annual_charges` 
        WHERE year='$year' AND particulars='$particulars' AND student_id='$stId'");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
		
	}
	function findAllOtherAnualCharges()
	{
		$get_all=mysqli_query($this->connect,"select * from `other_annual_charges` ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	//Function End for Other Annual Charges
	//Function Start for Tuition Fees
	function addSessionTf()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$fees=mysqli_real_escape_string($this->connect,$_POST['session_fee']);
		$late_fine=mysqli_real_escape_string($this->connect,$_POST['late_fine']);
		$status=mysqli_real_escape_string($this->connect,$_POST['sf_status']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `tution_fees`
		WHERE class='$class' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Session fees already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `tution_fees`(`class`, `fees`,
		`late_fine`, `status`, `created_by`, `in_time`, `update_time`) VALUES ('$class',
		'$fees','$late_fine','$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	 function ajaxSessionfees($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `tution_fees` 
        where class='$id'  ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function receveSessionTuitionFees()
	{
		$payment_year=mysqli_real_escape_string($this->connect,$_POST['year']);
		$payment_month=mysqli_real_escape_string($this->connect,$_POST['month']);
		$payment_date=mysqli_real_escape_string($this->connect,$_POST['date']);
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);		
		$student_id=mysqli_real_escape_string($this->connect,$_POST['strn']);
		$paid_amount=mysqli_real_escape_string($this->connect,$_POST['recvd_Setu_fee']);		
		$status=mysqli_real_escape_string($this->connect,$_POST['setufee_stat']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `recived_student_tution_fees`
		WHERE student_id='$student_id'
		AND payment_year='$payment_year' 
		AND payment_month='$payment_month' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Student already paid for this month</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `recived_student_tution_fees`
		(`payment_year`, `payment_month`, `payment_date`, `class`, `section`, 
		`student_id`, `paid_amount`, `status`, `created_by`, `in_time`, `update_time`)
		VALUES ('$payment_year','$payment_month','$payment_date','$class','$section',
		'$student_id','$paid_amount','$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Fess successfully received</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function findAStRecTuFee($stId,$year,$month)
	{
		
		$get_single=mysqli_query($this->connect,"select * from `recived_student_tution_fees` 
        WHERE payment_year='$year' AND payment_month='$month' AND student_id='$stId'");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
		
	}
	function findAllStuSessionFess()
	{
		$get_all=mysqli_query($this->connect,"select * from `tution_fees` ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	//Function End for Tuition Fees
	//Function Start for Class Timetable
	 function addClassTt()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$course_session=mysqli_real_escape_string($this->connect,$_POST['course_session']);
		$subj_name=mysqli_real_escape_string($this->connect,$_POST['subj_id']);		
		$subj_teac=mysqli_real_escape_string($this->connect,$_POST['subj_teac']);
		$class_day=mysqli_real_escape_string($this->connect,$_POST['class_day']);
		$class_start=mysqli_real_escape_string($this->connect,$_POST['cst']);
		$class_end=mysqli_real_escape_string($this->connect,$_POST['cet']);
		$status=mysqli_real_escape_string($this->connect,$_POST['class_tt_sta']);
		$created_by=$_SESSION['user_email'];
		$instime=time();		
        $uniq=mysqli_query($this->connect,"select * from `class_tt` WHERE 
		section='$section' AND subj_name='$subj_name' AND class_day='$class_day' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Time Table already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `class_tt`(`class`, 
		`section`, `course_session`, `subj_name`, `subj_teac`, `class_day`, `class_start`,
		`class_end`, `status`, `created_by`, `in_time`, `updated`) VALUES ('$class',
		'$section','$course_session','$subj_name','$subj_teac','$class_day','$class_start','$class_end','$status',
		'$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function findAllClassTime()
	{
		$get_all=mysqli_query($this->connect,"select * from `class_tt`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
    function findAjxClassTt($cls,$sec)
	{
		$get_all=mysqli_query($this->connect,"select * from `class_tt` WHERE class='$cls' AND section='$sec' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	 function singelClTT($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `class_tt` 
        where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function clsTtValidation($id)
	{		
	    $get_single=mysqli_query($this->connect,"select * from `stu_attendance` 
        WHERE session='$id' ORDER BY session DESC LIMIT 1 ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	
	//Function End for Class Timetable
	//Function Start for Exam Type
	function add_exam_type()
	{
		$exam_name=mysqli_real_escape_string($this->connect,$_POST['exam_name']);
		$min_marks=mysqli_real_escape_string($this->connect,$_POST['min_marks']);
		$max_marks=mysqli_real_escape_string($this->connect,$_POST['max_marks']);
		$exam_status=mysqli_real_escape_string($this->connect,$_POST['ex_typ_sta']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `exam_type` WHERE exam_name='$exam_name' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Class Section name already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `exam_type`(`exam_name`,`min_marks`,`max_marks`,`exam_status`, `creatd_by`, `in_time`, `updated_time`)
		VALUES ('$exam_name','$min_marks','$max_marks','$exam_status','$created_by',
		'$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function findAjxAllExmTyp()
	{
		$get_all=mysqli_query($this->connect,"select * from `exam_type`	");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function allExamType()
	{
		$get_all=mysqli_query($this->connect,"select * from `exam_type`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	 function singelExamType($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `exam_type` 
        where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	//Function End for Exam Type
	//Function Start for Exam Time Table
	function addExamTT()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$exam_type=mysqli_real_escape_string($this->connect,$_POST['exm_type']);
		$exm_code=mysqli_real_escape_string($this->connect,$_POST['exm_code']);
		$subj_nm=mysqli_real_escape_string($this->connect,$_POST['subj_nm']);
		$exm_dt=mysqli_real_escape_string($this->connect,$_POST['exm_date']);
		$strt_time=mysqli_real_escape_string($this->connect,$_POST['start_time']);
		$end_time=mysqli_real_escape_string($this->connect,$_POST['end_time']);
		$status=mysqli_real_escape_string($this->connect,$_POST['exm_tt']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `exm_tt` WHERE class='$class'
		AND subj_nm='$subj_nm' AND exam_type='$exam_type' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Exam Schedule already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `exm_tt`(`class`, `exam_type`,
		`exm_code`, `subj_nm`, `exm_dt`, `strt_time`, `end_time`, `status`, `created_by`,
		`in_time`, `update_time`) VALUES ('$class','$exam_type','$exm_code','$subj_nm',
		'$exm_dt','$strt_time','$end_time','$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function findAllExmTT($id)
	{
		$get_all=mysqli_query($this->connect,"select * from `exm_tt` WHERE class='$id' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function allExamtt()
	{
		$get_all=mysqli_query($this->connect,"select * from `exm_tt`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	 function singelExamTT($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `exm_tt` 
        where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	
	//Function End for Exam Time Table
	//Function Start for Student Result
	function addStuResult()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$exam_type=mysqli_real_escape_string($this->connect,$_POST['exm_type']);
		$exam_code=mysqli_real_escape_string($this->connect,$_POST['exam_code']);
		$student_id=mysqli_real_escape_string($this->connect,$_POST['st_id']);
		$marks_obtained=mysqli_real_escape_string($this->connect,$_POST['mrk_obtend']);
		$result_status=mysqli_real_escape_string($this->connect,$_POST['result_status']);		
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `student_result` WHERE student_id='$student_id'
		AND exam_code='$exam_code'");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Result already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `student_result`(`class`, 
		`section`, `exam_type`, `exam_code`, `student_id`, `marks_obtained`, 
		`result_status`, `created_by`, `in_time`, `update_time`) VALUES ('$class',
		'$section','$exam_type','$exam_code','$student_id','$marks_obtained','$result_status',
		'$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function allStudentResult()
	{
		$get_all=mysqli_query($this->connect,"select * from `student_result`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	//Function End for Student Result
	//Function Start for Employee Department
	function addEmpDepartment()
	{
		$dept_code=mysqli_real_escape_string($this->connect,$_POST['dept_code']);
		$dept_name=mysqli_real_escape_string($this->connect,$_POST['emp_dept_name']);
		$status=mysqli_real_escape_string($this->connect,$_POST['emp_dept_st']);				
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `emp_dept` WHERE dept_code='$dept_code'
		AND dept_name='$dept_name'");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Result already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `emp_dept`(`dept_code`,
		`dept_name`, `status`, `created_by`, `in_time`, `update_time`) VALUES (
		'$dept_code','$dept_name','$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function findAllDepartment()
	{
		$get_all=mysqli_query($this->connect,"select * from `emp_dept`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	//Function End for Employee Department
	//Function Start for Employee Designation
	function addEmpDesignation()
	{
		$department=mysqli_real_escape_string($this->connect,$_POST['dept_id']);
		$designation=mysqli_real_escape_string($this->connect,$_POST['designation']);
		$status=mysqli_real_escape_string($this->connect,$_POST['emp_desg_st']);				
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `emp_designatio` WHERE department='$department'
		AND designation='$designation'");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Result already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `emp_designatio`(`department`,
		`designation`, `status`, `created_by`, `in_time`, `update_time`) VALUES
		('$department','$designation','$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function ajaxAlldesgnation($id)
	{
		$get_all=mysqli_query($this->connect,"select * from `emp_designatio` WHERE department='$id' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function allEmpDesignation()
	{
		$get_all=mysqli_query($this->connect,"select * from `emp_designatio`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	//Function End for Employee Designation
	//Function Start for Employee 
	function add_employee()
	{	
		  $emp_code=mysqli_real_escape_string($this->connect,$_POST['emp_code']);		  
		  $emp_name=mysqli_real_escape_string($this->connect,$_POST['emp_name']);		  
		  $email=mysqli_real_escape_string($this->connect,$_POST['email_id']);		  
		  $contact_number=mysqli_real_escape_string($this->connect,$_POST['contact_number']);		  
		  $alt_number=mysqli_real_escape_string($this->connect,$_POST['altr_number']);		  
		  $qualification=mysqli_real_escape_string($this->connect,$_POST['qualification']);		  
		  $wrk_exp=mysqli_real_escape_string($this->connect,$_POST['wrk_exp']);
 		  $wrk_field=mysqli_real_escape_string($this->connect,$_POST['wrk_field']);		  
		  $blood_group=mysqli_real_escape_string($this->connect,$_POST['blood']);		  
		  $dob=mysqli_real_escape_string($this->connect,$_POST['dob']);		  
		  $age=mysqli_real_escape_string($this->connect,$_POST['age']);		  
		  $hw_name=mysqli_real_escape_string($this->connect,$_POST['husband_wife']);		  
		  $mother_name=mysqli_real_escape_string($this->connect,$_POST['mother_nm']);		  
		  $father_name=mysqli_real_escape_string($this->connect,$_POST['father_nm']);		  
		  $location=mysqli_real_escape_string($this->connect,$_POST['location']);			  
		  $address=mysqli_real_escape_string($this->connect,$_POST['address']); 
		  $pin=mysqli_real_escape_string($this->connect,$_POST['pin']);		  
		  $nationallity=mysqli_real_escape_string($this->connect,$_POST['nationality']);		  
		  $medical_codition=mysqli_real_escape_string($this->connect,$_POST['medical']);		  
		  $mother_tongue=mysqli_real_escape_string($this->connect,$_POST['mt']);		  
		  $religion=mysqli_real_escape_string($this->connect,$_POST['religion']);		  
		  $cast=mysqli_real_escape_string($this->connect,$_POST['cast']);		  
		  $department=mysqli_real_escape_string($this->connect,$_POST['department']);		  
		  $designation=mysqli_real_escape_string($this->connect,$_POST['designation']);		  
		  $salary=mysqli_real_escape_string($this->connect,$_POST['salary']);		  
		  $salary_ac=mysqli_real_escape_string($this->connect,$_POST['ac_number']);		  
		  $pan_number=mysqli_real_escape_string($this->connect,$_POST['pan']);		  
		  $pf_number=mysqli_real_escape_string($this->connect,$_POST['pf_number']);		  
		  $adhar_number=mysqli_real_escape_string($this->connect,$_POST['adhar_number']);
           $id_proof=$_FILES['id_proof']['name'];		  
		  $work_exp=$_FILES['work_exp']['name'];				  
		  $emp_img=$_FILES['emp_img']['name'];				  
		  $maritual_status=mysqli_real_escape_string($this->connect,$_POST['mrtiual_status']);		  
		  $gender=mysqli_real_escape_string($this->connect,$_POST['gender']);		  
		  $status=mysqli_real_escape_string($this->connect,$_POST['emp_status']);		  	  
		  $created_by=$_SESSION['user_email'];	  
		  $instime=time();			  
	    $chk=mysqli_query($this->connect,"select * from `employee` WHERE 
		emp_code='$emp_code' AND email='$email' ");
		$coun=mysqli_num_rows($chk);
		if($coun>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'> Employee Code alredy exist</h5>";
		}
		  else
		  {	 
		           	 
		 $insert=mysqli_query($this->connect, "INSERT INTO `employee`( `emp_code`,
		 `emp_name`, `email`, `contact_number`, `alt_number`, `qualification`,
		 `wrk_exp`, `wrk_field`, `blood_group`, `dob`, `age`, `hw_name`, `mother_name`,
		 `father_name`, `location`, `address`, `pin`, `nationallity`, `medical_codition`,
		 `mother_tongue`, `religion`, `cast`, `department`, `designation`, `salary`,
		 `salary_ac`, `pan_number`, `pf_number`, `adhar_number`, `id_proof`, `work_exp`, 
		 `emp_img`, `maritual_status`, `gender`, `status`, `created_by`, `in_time`,
		 `updated_time`) VALUES ('$emp_code','$emp_name','$email','$contact_number','$alt_number',
		 '$qualification','$wrk_exp','$wrk_field','$blood_group','$dob','$age','$hw_name',
		 '$mother_name','$father_name','$location','$address','$pin','$nationallity','$medical_codition',
		 '$mother_tongue','$religion','$cast','$department','$designation','$salary','$salary_ac',
		 '$pan_number','$pf_number','$adhar_number','$id_proof','$work_exp','$emp_img','$maritual_status',
		'$gender','$status','$created_by','$instime','$instime')");		 	
		move_uploaded_file($_FILES['id_proof']['tmp_name'],'../images/employee/emp_id_proof/'.$id_proof);		
		move_uploaded_file($_FILES['work_exp']['tmp_name'],'../images/employee/emp_wrk_exp/'.$work_exp);
		move_uploaded_file($_FILES['emp_img']['tmp_name'],'../images/employee/emp_img/'.$emp_img);
		if($insert)
		{		
		return "<h5 style='color:#ff4081'>Successfully Added</h5>";	
		}	
		else
		return mysqli_error($this->connect); 
		  }
	}
	function allEmployee()
	{
		$get_all=mysqli_query($this->connect,"select * from `employee`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	//Function End for Employee 
	//Function Start for Librey Books
	function addLibBooks()
	{
		$year=mysqli_real_escape_string($this->connect,$_POST['year']);
		$book_nm=mysqli_real_escape_string($this->connect,$_POST['book_nm']);
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$isbn_code=mysqli_real_escape_string($this->connect,$_POST['isbn_code']);
		$book_code=mysqli_real_escape_string($this->connect,$_POST['book_code']);
		$author_name=mysqli_real_escape_string($this->connect,$_POST['author_name']);
		$book_price=mysqli_real_escape_string($this->connect,$_POST['book_price']);
		$book_quan=mysqli_real_escape_string($this->connect,$_POST['book_quantity']);
		$book_self=mysqli_real_escape_string($this->connect,$_POST['bokslf']);
		$book_category=mysqli_real_escape_string($this->connect,$_POST['boca']);
		$book_status=mysqli_real_escape_string($this->connect,$_POST['book_status']);				
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `add_lib_book` WHERE book_nm='$book_nm'");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Book already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `add_lib_book`(`year`,`book_nm`, 
		`class`, `isbn_code`, `book_code`, `author_name`, `book_price`, `book_quan`,
		`book_self`,`book_category`,`book_status`, `created_by`, `in_time`, `update_time`) VALUES ('$year','$book_nm',
		'$class','$isbn_code','$book_code','$author_name','$book_price','$book_quan',
		'$book_self','$book_category','$book_status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function findAlllibBook()
	{
		$get_all=mysqli_query($this->connect,"select * from `add_lib_book`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
		
	}
	function allLibBook()
	{
		$get_all=mysqli_query($this->connect,"select * from `add_lib_book`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function singelLibBook($id)
	{
		$get_single=mysqli_query($this->connect,"select * from `add_lib_book` 
		WHERE id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 
		
	}
	
	//Function End for Librey Book
	
	//Function Start for Enroll Librey Book	
	function enrollStuBook()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$student_roll=mysqli_real_escape_string($this->connect,$_POST['strn']);
		$book_nm=mysqli_real_escape_string($this->connect,$_POST['book_nm']);				
		$status='1';				
		$created_by=$_SESSION['user_email'];
		$instime=time();        
		$in_cate=mysqli_query($this->connect,"INSERT INTO `lib_enrolld_bk`(`book_nm`,
		`class`, `section`, `student_roll`, `issue_date`, `status`, `created_by`,
		`in_time`, `update_time`) VALUES ('$book_nm','$class','$section','$student_roll',
		'$instime','$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h2 style='color:green;'>Successfully Enrolled </h2>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
	}
	function ajaxLibCarChk($id,$clid,$secid)
	{
		$get_all=mysqli_query($this->connect,"select * from `lib_enrolld_bk` 
		WHERE class='$clid' AND section='$secid' AND student_roll='$id' AND status='1' ");
		$count=mysqli_num_rows($get_all);		
		return $count;
		
	}
	function allEnrlBk()
	{
		$get_all=mysqli_query($this->connect,"select * from `lib_enrolld_bk`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function allEnroledBkook()
	{
		$get_all=mysqli_query($this->connect,"select * from `lib_enrolld_bk`
         WHERE status='1'");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function singelEnroldBok($id,$clid,$secid)
	{
		$get_single=mysqli_query($this->connect,"select * from `lib_enrolld_bk` 
		WHERE class='$clid' AND section='$secid' AND student_roll='$id' AND status='1' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 
		
	}
	function ajaxReturnBook()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$student_roll=mysqli_real_escape_string($this->connect,$_POST['strn']);
		$created_by=$_SESSION['user_email'];
		$instime=time();
		$returnBook=mysqli_query($this->connect,"UPDATE `lib_enrolld_bk`
		SET `status`='0',`created_by`='$created_by',`update_time`='$instime' WHERE 
        class='$class' AND section='$section' AND student_roll='$student_roll' ");
		if($returnBook)
		{
			return "<h5 style='color:green;'>Successfully book returned </h5>";
		}
		else
		{
		return 'Unable To Return Now..Try Again!!!'; 
		}
		
	}
	function chkBookStatus($id)
	{
		$get_single=mysqli_query($this->connect,"select * from `lib_enrolld_bk` 
		WHERE  	book_nm='$id' AND status='1' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 
		
	}
	//Function End for Enroll Librey Book	
	//Function Start for Hall Of Fame
    function addStudentAchievement()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$student=mysqli_real_escape_string($this->connect,$_POST['strn']);
		$achiv_title=mysqli_real_escape_string($this->connect,$_POST['achiv_titl']);
		$achiv_desc=mysqli_real_escape_string($this->connect,$_POST['description']);
		$achiv_date=mysqli_real_escape_string($this->connect,$_POST['achiv_dt']);
		$achiv_img=$_FILES['achiver_img']['name'];
		$status=mysqli_real_escape_string($this->connect,$_POST['achvr_status']);				
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `stu_achievement` WHERE
		student='$student' AND achiv_title='$achiv_title'");		
		$count=mysqli_num_rows($uniq);		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Data already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `stu_achievement`(`class`,
		`section`, `student`, `achiv_title`, `achiv_desc`, `achiv_img`, `achiv_date`, 
		`status`, `created_by`, `in_time`, `updated_time`) VALUES ('$class','$section',
		'$student','$achiv_title','$achiv_desc','$achiv_img','$achiv_date','$status','$created_by',
		'$instime','$instime')");
		move_uploaded_file($_FILES['achiver_img']['tmp_name'],'../images/students/achievers/'.$achiv_img);		
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function allAchivers()
	{
		$get_all=mysqli_query($this->connect,"select * from `stu_achievement`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	//Function End for Hall Of Fame	
	//Function Start for Study material	
	function addStudyMaterial()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$author=mysqli_real_escape_string($this->connect,$_POST['author']);
		$designation=mysqli_real_escape_string($this->connect,$_POST['designation']);
		$subject=mysqli_real_escape_string($this->connect,$_POST['subj_id']);
        $study_file=$_FILES['stdy_mat']['name'];		
		$bref_desc=mysqli_real_escape_string($this->connect,$_POST['stmt_desc']);		
		$status=mysqli_real_escape_string($this->connect,$_POST['stmt_status']);				
		$created_by=$_SESSION['user_email'];
		$instime=time();       
		$in_cate=mysqli_query($this->connect,"INSERT INTO `study_materials`(`class`,
		`author`, `designation`, `subject`, `study_file`, `bref_desc`, `status`,
		`created_by`, `in_time`, `updated_time`) VALUES ('$class','$author',
		'$designation','$subject','$study_file','$bref_desc','$status','$created_by','$instime',
		'$instime')");
		move_uploaded_file($_FILES['stdy_mat']['tmp_name'],'../images/studymaterials/'.$study_file);		
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		
	}
	//Function End for Study material
	//Function Start for Holiday Managment
	function addHoliday()
	{
		$holiday_nm=mysqli_real_escape_string($this->connect,$_POST['holiday_name']);
		$frm_date=mysqli_real_escape_string($this->connect,$_POST['from_date']);
		$to_date=mysqli_real_escape_string($this->connect,$_POST['to_date']);
		$no_day=mysqli_real_escape_string($this->connect,$_POST['nod']);	
		$status=mysqli_real_escape_string($this->connect,$_POST['holiday_status']);						
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `holidays` WHERE
		holiday_nm='$holiday_nm' ");		
		$count=mysqli_num_rows($uniq);		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Holiday already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `holidays`(`holiday_nm`,
		`frm_date`, `to_date`, `no_day`, `status`, `created_by`, `in_time`, 
		`update_time`) VALUES ('$holiday_nm','$frm_date','$to_date','$no_day','$status',
		'$created_by','$instime','$instime')");
		
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
		
	}
	//Function End for Holiday Managment
	//Function Start for Event Managment
	function addEvent()
	{
		$event_name=mysqli_real_escape_string($this->connect,$_POST['event_name']);
		$event_date=mysqli_real_escape_string($this->connect,$_POST['event_date']);
		$event_time=mysqli_real_escape_string($this->connect,$_POST['event_time']);
		$event_desc=mysqli_real_escape_string($this->connect,$_POST['event_desc']);	
		$status=mysqli_real_escape_string($this->connect,$_POST['event_status']);						
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `events` WHERE
		event_name='$event_name' AND event_date='$event_date' ");		
		$count=mysqli_num_rows($uniq);		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Event already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `events`(`event_name`,
		`event_date`, `event_time`, `event_desc`, `status`, `created_by`, `in_time`,
		`update_time`) VALUES ('$event_name','$event_date','$event_time','$event_desc',
		'$status','$created_by','$instime','$instime')");
		
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
		
	}
	//Function End for Event Managment
	//Function Start for All Teachers
	function findAllTeachers()
	{
		$get_all=mysqli_query($this->connect,"select * from `employee` WHERE department='1' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	//Function End for All Teachers
	//Function Start for TimeStamp Operation
		function tsToDay($dv)
	{
		if($dv==1)
		{
			$day='Monday';
		}
		if($dv==2)
		{
			$day='Tuesday';
		}
		if($dv==3)
		{
			$day='Wednesday';
		}
		if($dv==4)
		{
			$day='Thursday';
		}
		if($dv==5)
		{
			$day='Friday';
		}
		if($dv==6)
		{
			$day='Saturdy';
		}
		if($dv==7)
		{
			$day='Sunday';
		}
		return $day;
		
	}
		function numrcMonth($mn)
	{
		if($mn==1)
		{
			$month='January';
		}
		if($mn==2)
		{
			$month='February';
		}
		if($mn==3)
		{
			$month='March';
		}
		if($mn==4)
		{
			$month='April ';
		}
		if($mn==5)
		{
			$month='May';
		}
		if($mn==6)
		{
			$month='June';
		}
		if($mn==7)
		{
			$month='July';
		}
		if($mn==8)
		{
			$month='August';
		}
		if($mn==9)
		{
			$month='September';
		}
		if($mn==10)
		{
			$month='October';
		}
		if($mn==11)
		{
			$month='November';
		}
		if($mn==12)
		{
			$month='December ';
		}
		return $month;
		
	}
	
	
	//Function End for TimeStamp Operation
	//Function Start for Daily Feedback
	function addDailyFeedbk()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$student_roll=mysqli_real_escape_string($this->connect,$_POST['strn']);
		$feedback=mysqli_real_escape_string($this->connect,$_POST['daily_feedback']);	
		$status=mysqli_real_escape_string($this->connect,$_POST['daily_feedbk_stat']);						
		$created_by=$_SESSION['user_email'];
		$instime=time();        
		$in_cate=mysqli_query($this->connect,"INSERT INTO `student_daily_feedback`(`class`,
		`section`, `student_roll`, `feedback`, `status`, `created_by`, `in_time`,
		`update_time`) VALUES ('$class','$section','$student_roll','$feedback',
		'$status','$created_by','$instime','$instime')");
		
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		
		
	}
	function allStudentDailyFeedback()
	{
		$get_all=mysqli_query($this->connect,"select * from `student_daily_feedback`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	//Function End for Daily Feedback
	//Function Start for Parents Teachers Meetings
	function addPTMetSchedul()
	{
		$meeting_for=mysqli_real_escape_string($this->connect,$_POST['class']);
		$meeting_date=mysqli_real_escape_string($this->connect,$_POST['pt_meeting_date']);
		$meeting_time=mysqli_real_escape_string($this->connect,$_POST['pt_meeting_time']);
		$meetings_desc=mysqli_real_escape_string($this->connect,$_POST['pt_meeting_desc']);	
		$status=mysqli_real_escape_string($this->connect,$_POST['pt_meeting_status']);						
		$created_by=$_SESSION['user_email'];
		$instime=time();  
         $uniq=mysqli_query($this->connect,"select * from `pt_meetings_schedule` WHERE
		meeting_for='$meeting_for' AND meeting_date='$meeting_date' ");		
		$count=mysqli_num_rows($uniq);		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Meeting already scheduled</h5>";
		}
		else
		{		
		$in_cate=mysqli_query($this->connect,"INSERT INTO `pt_meetings_schedule`
		(`meeting_for`, `meeting_date`, `meeting_time`, `meetings_desc`,
		`status`,`created_by`, `in_time`, `update_time`) VALUES ('$meeting_for','$meeting_date',
		'$meeting_time','$meetings_desc','$status','$created_by','$instime','$instime')");
		
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
		
	}
	function allPTMetSchedul()
	{
		$get_all=mysqli_query($this->connect,"select * from `pt_meetings_schedule`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function ajaxAllPTMetSchedul($id)
	{
		$get_all=mysqli_query($this->connect,"select * from `pt_meetings_schedule`
		WHERE meeting_for='$id' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function addPTMetFeedback()
	{
		$meeting_for=mysqli_real_escape_string($this->connect,$_POST['meet_for']);
		$meeting_date=mysqli_real_escape_string($this->connect,$_POST['ptmet_date']);
		$meeting_feedback=mysqli_real_escape_string($this->connect,$_POST['pt_meeting_feedbk']);
		$status=mysqli_real_escape_string($this->connect,$_POST['ptmet_feedbk_status']);						
		$created_by=$_SESSION['user_email'];
		$instime=time();  
         $uniq=mysqli_query($this->connect,"select * from `pt_meetings_feedback` WHERE
		meeting_for='$meeting_for' AND meeting_date='$meeting_date' ");		
		$count=mysqli_num_rows($uniq);		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Meeting already scheduled</h5>";
		}
		else
		{		
		$in_cate=mysqli_query($this->connect,"INSERT INTO `pt_meetings_feedback`
		(`meeting_for`, `meeting_date`, `meeting_feedback`,
		`status`, `created_by`, `in_time`, `update_time`)
		VALUES ('$meeting_for','$meeting_date','$meeting_feedback','$status','$created_by',
		'$instime','$instime')");
		
		if($in_cate)
		{
			return "<h5 style='color:#3c8dbc;'>Successfully Added</h5>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
		
	}
	function allPTMetFeedback()
	{
		$get_all=mysqli_query($this->connect,"select * from `pt_meetings_feedback`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	//Function End for Parents Teachers Meetings
    //Function Start for Class Diary     
	function uploadClassDiary()
	{
		$diary_date=mysqli_real_escape_string($this->connect,$_POST['clsdiry_date']);
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$ogfilename=$_FILES['clsdiry_file']['name'];
		$file=time().'-'.$ogfilename;
		$status=mysqli_real_escape_string($this->connect,$_POST['clsdiry_status']);						
		$uploaded_by=$_SESSION['user_email'];
		$instime=time();  
         $uniq=mysqli_query($this->connect,"select * from `class_diary` WHERE
		diary_date='$diary_date' AND class='$class' AND section='$section'  ");		
		$count=mysqli_num_rows($uniq);		
		if($count>0)
		{
			return "<h2 style='color:rgb(244, 54, 61);'>Diary Alredy Uploaded</h2>";
		}
		else
		{		
		$in_cate=mysqli_query($this->connect,"INSERT INTO `class_diary`(
		`diary_date`, `class`, `section`, `file`, `status`, `uploaded_by`,
		`intime`, `uplod_time`) VALUES ('$diary_date','$class','$section',
		'$file','$status','$uploaded_by','$instime','$instime')");
		move_uploaded_file($_FILES['clsdiry_file']['tmp_name'],'../images/classdiary/'.$file);
		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Added</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
		
	}
	function allClassDairy()
	{
		$get_all=mysqli_query($this->connect,"select * from `class_diary`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
		public function downloadClassDiary($id)
	{
		
		$fname=$id;		
		header('Content-Description:FileTransfer');
		header('Content-Type:application/octet-stream');		
		header('Content-Disposition:attachment;filename='.basename('../images/classdiary/'."$fname"));
		header('Expires:0');
		header('Cache-Control:must-revalidate');
		header('Pragma:public');
		header('Content-aLength:'.filesize('../images/classdiary/'."$fname"));
		ob_clean();
		flush();
		readfile('../images/classdiary/'."$fname");
		exit;				
		
	}
    //Function End for Class Diary     
	
		
	
}
$object=new main();
?>