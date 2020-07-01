<?php 
class main
{
    protected $host_name='localhost';
	protected $user_name='root';
	protected $password='';
	protected $db_name='agpnconventer';
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
	function adminLogin()
	{
		$adminUser=mysqli_real_escape_string($this->connect,$_POST['adminUserId']);
		$password=mysqli_real_escape_string($this->connect,$_POST['adminPassword']);
		//$md5_password=md5($password);
		$login=mysqli_query($this->connect,"select * from `emp_login_user` where user_id='$adminUser' and password='$password' AND status='1' ");
		$rowcount=mysqli_num_rows($login);
		$fetch_singel=mysqli_fetch_array($login);       
		if($rowcount>0)
		{		
		$_SESSION['user_email'] = $fetch_singel['emp_code'];
           echo "
            <script type=\"text/javascript\">           
		   window.location='dashboard';
            </script>
        ";		
		}
		else
		return "<span style='color:red;font-size: 18px;text-decoration: underline;'>User ID Or Password is Incorrect</span>";		
	}
	function adminLoginAccessLevel()
	{
		$empId=mysqli_real_escape_string($this->connect,$_POST['emp_codeNm']);
		$accessLevl=$_POST['aces_levl'];
		$up=time();
		$accessLevlImpLd=implode(',',$accessLevl);	
        $insert=mysqli_query($this->connect,"UPDATE `emp_login_user` SET `access_level`='$accessLevlImpLd', `up_time`='$up' WHERE `emp_code`='$empId' ");	
		if($insert)
		{		
		return "<h3 style='color:green;'>Successfully Assigned</h3>";	
		}
		
	}
	function singeladminLoginDtls($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `emp_login_user` where `emp_code`='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
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
	
	//Function start for Academic Session
	 function academicSession()
	 {
		 $curntYear=date("Y");
		 $currentYear=$curntYear+1;
		 $sesnStrtMonth=4;
		 $json='{"currentYear":"'.$curntYear.'","curntMonth":"'.$currentMonth.'","nextYear":"'.$currentYear.'"}';
         $json=json_decode($json,true);
		 return $json;
	 }
	 
	
	 
	//Function End for Academic Session
	
	
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
		move_uploaded_file($_FILES['student_img']['tmp_name'],'../common/students/student_img/'.$file);
		move_uploaded_file($_FILES['student_documents']['tmp_name'],'../common/students/documents/'.$student_document);
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
	function update_student($admsNum)
	{	
		  $year=mysqli_real_escape_string($this->connect,$_POST['amis_year']);		  
		  $admisn_date=mysqli_real_escape_string($this->connect,$_POST['admisn_date']);		  
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
		  $gender=mysqli_real_escape_string($this->connect,$_POST['gender']);		  
		  $hostel_status=mysqli_real_escape_string($this->connect,$_POST['hostl_stastus']);		  
		  $status=mysqli_real_escape_string($this->connect,$_POST['stu_status']);		  
		  $created_by=$_SESSION['user_email'];	  
		  $instime=time();  
	      $singlStuInfo=$this->singelStuInfo($admsNum);
		 if($student_img !='')
		 {
			$file=mysqli_real_escape_string($this->connect,$student_img); 
		   move_uploaded_file($_FILES['student_img']['tmp_name'],'../common/students/student_img/'.$file);
		     unlink('../common/students/student_img/'.$singlStuInfo['student_img']);			 
		 }
		 if($student_img =='')
		 {
		    if($singlStuInfo['student_img']!='')
			{
				$file=$singlStuInfo['student_img'];				
			}
			if($singlStuInfo['student_img']=='')
			{
				$file='';
			}
		 }
		
		 if($student_document =='')
		 {		 
		    if($singlStuInfo['student_document']!='')
			{
				$studuc_file=$singlStuInfo['student_document'];				
			}
			if($singlStuInfo['student_document']=='')
			{
				$studuc_file='';
			}
		 }
		 if($student_document !='')
		 {
			$studuc_file=mysqli_real_escape_string($this->connect,$student_document); 
		  move_uploaded_file($_FILES['student_documents']['tmp_name'],'../common/students/documents/'.$student_document);
		  unlink('../common/students/documents/'.$singlStuInfo['student_document']);
		 }
		           	 
		 $insert=mysqli_query($this->connect, "UPDATE
		 `student_registation` SET `admisn_year`='$year',		 
		 `admisn_date`='$admisn_date',
		 `stu_full_nm`='$stu_full_nm',
		 `mother_name`='$mother_name',
		 `mother_telephone`='$mother_telephone',
		 `mother_mobile`='$mother_mobile',
		 `father_name`='$father_name',
		 `father_telephone`='$father_telephone',
		 `father_mobile`='$father_mobile',
		 `family_income`='$family_income',
		 `dob`='$dob',`age`='$age',
		 `blood_group`='$blood_group',`father_email`='$father_email',
		 `mother_email`='$mother_email',
		 `corres_address`='$corres_address',
		 `permanent_address`='$permanent_address',
		 `present_school`='$present_school',`category`='$category',
		 `previous_two_exams`='$previous_two_exams',
		 `brothers_sisters`='$brothers_sisters',`info_source`='$info_source',
		 `pin`='$pin',`religion`='$religion',
		 `cast`='$cast',`student_img`='$file',
		 `student_document`='$studuc_file',`medical`='$medical',
		 `mother_tung`='$mother_tung',`nationality`='$nationality',
		 `gender`='$gender',`hostel_status`='$hostel_status',
		 `status`='$status',`created_by`='$created_by',
		 `update_time`='$instime' WHERE admission_number='$admsNum'");		
		if($insert)
		{		
		return "<h4 style='color:blue'>Successfully Updated</h4>";	
		}	
		else
		return mysqli_error($this->connect); 
		  
	}
	function updateStuPassword($stuAdmsnNum)
	{
		$upTm=time();
		$created_by=$_SESSION['user_email'];
		$rawPassword=mysqli_real_escape_string($this->connect,$_POST['password']);	
        $password=md5($rawPassword);		
	    $update=mysqli_query($this->connect,"UPDATE `student_registation`
	    SET `password`='$password',`created_by`='$created_by',
	    `update_time`='$upTm' WHERE admission_number='$stuAdmsnNum'");
	    if($update)
		{
			return "<h4 style='color:blue'>Successfully Password Updated</h4>";	
		}
		
	}
	function deltStudentCurrentClass()
	{
		$id=$_POST['stu_crclsDltId'];
		$del=mysqli_query($this->connect,"DELETE FROM `class_upgrading` WHERE id='$id' ");		
		
	}
	function updateUpgradeStudentCrYrRoll($admisnNumber)
	{
		$year=mysqli_real_escape_string($this->connect,$_POST['year']);
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$roll_no=mysqli_real_escape_string($this->connect,$_POST['roll_number']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `class_upgrading` WHERE `year`='$year' AND class='$class' AND section='$section' AND admission_number='$admisnNumber'");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			$in_cate=mysqli_query($this->connect,"UPDATE `class_upgrading` SET `year`='$year',`class`='$class',`section`='$section',`admission_number`='$admisnNumber',`roll_no`='$roll_no',`created_by`='$created_by',`update_on`='$instime' WHERE `admission_number`='$admisnNumber' ");
			if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Updated</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
		if($count<1)
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `class_upgrading`(`year`, `class`, `section`, `admission_number`, `roll_no`, `created_by`, `in_time`, `update_on`) VALUES ('$year','$class','$section','$admisnNumber','$roll_no','$created_by','$instime','$instime')");
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
	function actvStudent()
	{
	    $getAllActvStudnt=mysqli_query($this->connect,"SELECT * FROM `student_registation` WHERE status='1'");
		$container=array();
		while($fetchActvStudnt=mysqli_fetch_array($getAllActvStudnt))
		{
			$container[]=$fetchActvStudnt;
		}
		return $container;
	}
	
	function actvStudentCount()
	{
		$get_count=mysqli_query($this->connect,"select * from student_registation WHERE status='1' ");
		$coun=mysqli_num_rows($get_count);
		return $coun;
	}


	/* function countRowsStuByCrCls($cls,$sec,$curntYear)
    {
      $sql = mysqli_query($this->connect,"select * from `class_upgrading` WHERE class='$cls' AND section='$sec' AND year='$curntYear'");
      return mysqli_num_rows($sql);
    }*/

	function fndAlStuByCrCls($cls,$sec,$curntYear,$page,$perpage)
	{	
				
		$get_all=mysqli_query($this->connect,"select `admission_number`,`roll_no` from `class_upgrading`
		WHERE class='$cls' AND section='$sec' AND year='$curntYear' ORDER BY roll_no ASC LIMIT ".$page.",".$perpage." ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function fndAlStuByCrClsLIMIT($cls,$sec,$curntYear,$page,$perpage)
	{	
				
		$get_all=mysqli_query($this->connect,"select `admission_number`,`roll_no` from `class_upgrading`
		WHERE class='$cls' AND section='$sec' AND year='$curntYear' ORDER BY roll_no ASC LIMIT ".$page.",".$perpage." ");
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
		$get_single=mysqli_query($this->connect,"select * from `student_registation` where admission_number='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	 function singelStuInfoOnlyName($id)
	{		
		$get_single=mysqli_query($this->connect,"select `stu_full_nm`,`status` from `student_registation` 
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
    function stuCurntYarClass($admiNo)
	{
            
			$getStudntCurYarClas=mysqli_query($this->connect,"SELECT * FROM `class_upgrading` WHERE admission_number='$admiNo'  ORDER BY id DESC LIMIT 1  ");
			$fetchStudntCrClss=mysqli_fetch_array($getStudntCurYarClas);
            return $fetchStudntCrClss;
			
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
	function singeRollNumberByYear($slNo,$admisnYear)
	{	
	   	
		$get_single=mysqli_query($this->connect,"select * from `class_upgrading` 
        where admission_number='$slNo' AND year='$admisnYear' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function singeRollNumber($slNo)
	{	
	   $curntYear=date("Y");
		if(date("m")>3)
		{
			$curntYear=$curntYear;
		}
		if(date("m")<3)
		{
			$curntYear=$curntYear-1;
		}	
		$get_single=mysqli_query($this->connect,"select * from `class_upgrading` 
        where admission_number='$slNo' AND year='$curntYear' ");
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
	function updateStuCurntRoll($stuAdmsnNum,$crYear)
	{
		$upTm=time();
		$created_by=$_SESSION['user_email'];
		$roll_no=mysqli_real_escape_string($this->connect,$_POST['student_newrolnm']);
		$singlStuInfo=$this->singeRollNumber($stuAdmsnNum,$crYear);		
		$crCls=$singlStuInfo['class'];
		$crSec=$singlStuInfo['section'];
		$chkr=mysqli_query($this->connect,"select * from `class_upgrading` WHERE 
		year='$crYear' AND class='$crCls' AND section='$crSec' AND roll_no='$roll_no' "); 
		$counr=mysqli_num_rows($chkr);		
		if($counr>0)
		{
			return "<h4 style='color:rgb(244, 54, 61);'> Roll Number Not Available </h4>";
		}
		else
		{
				  
	    $update=mysqli_query($this->connect,"UPDATE `class_upgrading`
	    SET `roll_no`='$roll_no',`created_by`='$created_by',
	    `update_on`='$upTm' WHERE year='$crYear' AND admission_number='$stuAdmsnNum'");
	    if($update)
		{
			return "<h4 style='color:blue'>Successfully Updated</h4>";	
		}
		}
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
	function updtStuOngoingSection()
	{	
		$roll_no=mysqli_real_escape_string($this->connect,$_POST['migrtRollNumber']);
		$admisNumber=mysqli_real_escape_string($this->connect,$_POST['stuAdmsnNum']);
		$year=mysqli_real_escape_string($this->connect,$_POST['migrtYar']);
		$class=mysqli_real_escape_string($this->connect,$_POST['migrtClas']);
		$section=mysqli_real_escape_string($this->connect,$_POST['migretSec']);
	    $created_by=$_SESSION['user_email'];	    
		$get_single=mysqli_query($this->connect,"SELECT `year`, `class`, `section`, `roll_no` FROM `class_upgrading` WHERE `year`='$year' AND `class`='$class' AND `section`='$section' AND `roll_no`='$roll_no' ");
		$count=mysqli_num_rows($get_single);
        if($count=='0')
        {
           $upTm=time();           	
		   $get_single=mysqli_query($this->connect,"UPDATE  `class_upgrading` SET `year`='$year',`class`='$class',`section`='$section',`admission_number`='$admisNumber',`roll_no`='$roll_no',`created_by`='$created_by',`update_on`='$upTm' WHERE `admission_number`='$admisNumber' AND `year`='$year'");
			if($get_single)
			{
				return "<b style='color:green;'>Successfully Migrated</b>";;
			}
			
		}
		if($count>0)
		{
			return  "<b style='color:red;'>Roll Number Not Available</b>";; 
		}	
	}
	function chkUpgradeStuCsyr($slNo,$upgdyar,$upgdClas)
	{	 		
		$get_single=mysqli_query($this->connect,"SELECT * FROM `class_upgrading`
		WHERE year='$upgdyar' AND class='$upgdClas' 
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
	public function dwnldStuDocuments($id)
	{
		
		$fname=base64_decode($id);		
		header('Content-Description:FileTransfer');
		header('Content-Type:application/octet-stream');		
		header('Content-Disposition:attachment;filename='.basename('../common/students/documents/'."$fname"));
		header('Expires:0');
		header('Cache-Control:must-revalidate');
		header('Pragma:public');
		header('Content-aLength:'.filesize('../common/students/documents/'."$fname"));
		ob_clean();
		flush();
		readfile('../common/students/documents/'."$fname");
		exit;				
		
	}
	public function exportStudentnmrlbyyrclssec($year,$cls,$sec)
	{
		$get_all=mysqli_query($this->connect,"select * from `class_upgrading` WHERE year='$year' AND class='$cls' AND section='$sec' ORDER BY roll_no ASC");
		$data=array();
		$i=1;
		while($fetch=mysqli_fetch_array($get_all))
		{
           $singlStuInf=$this->singelStuInfo($fetch['admission_number']);
          // $data[]=$singlStuInf['stu_full_nm'];
		   $data[]=array("Sl No."=>$i,"Admission No."=>$fetch['admission_number'],"Student Name"=>$singlStuInf['stu_full_nm'], "Roll No."=>$fetch['roll_no']);   
           $i++;

		}
		return $data;
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
	function onDtSpClSeAtendnce($cls,$sec)
	{
		$curntDate=date("Y-m-d");
		$get_all=mysqli_query($this->connect,"select * from `stu_attendance` WHERE class='$cls' AND
		section='$sec' AND DATE(date)='$curntDate' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function onDtStudentAttendancePresentCount()
	{
		$curntDate=date("Y-m-d");		
		$get_all=mysqli_query($this->connect,"select * from `stu_attendance` WHERE
		attendance='1' AND DATE(date)='$curntDate' ");
		return mysqli_num_rows($get_all);
		
	}
	function onDtStudentAttendanceAbsentCount()
	{
		$curntDate=date("Y-m-d");
		$get_all=mysqli_query($this->connect,"select * from `stu_attendance` WHERE
		attendance='0' AND DATE(date)='$curntDate' ");
		return mysqli_num_rows($get_all);
		
	}
	function chkStuAttDate($cls,$sec,$curntDate)
	{				
		$get_all=mysqli_query($this->connect,"select `class` from `stu_attendance` WHERE `class`='$cls' AND
		`section`='$sec' AND DATE(date)='$curntDate' LIMIT 1"); 		
		$coun=mysqli_num_rows($get_all);
		return $coun;	   	
	}
	 function addProgrmdAtten($cls,$sec,$user,$curntYear,$curntDate)	
	 {
		
		$instime=time();		
		$count=count($this->findAllStuAteByYCSNActive($cls,$sec,$curntYear));
		$i = 0;
		foreach ($this->findAllStuAteByYCSNActive($cls,$sec,$curntYear) as $key=>  $data) {
			$stuId=$data['admission_number'];
			 $in_cate=mysqli_query($this->connect, "INSERT INTO `stu_attendance`(`class`, `section`, `st_id`, `attendance`, `date`, `created_by`, `inserted`, `update_on`) VALUES ('$cls','$sec','$stuId','0','$curntDate','$user','$instime','$instime')");
			 if(++$i === $count) {	
			    $cls=base64_encode($cls);
			    $sec=base64_encode($sec);		   
			    echo "<script>location='attendance_sheet?cls=$cls&sec=$sec&page=0'</script>";
			  }
			}		
	}

	function findAllStuAteByYCSNActive($cls,$sec,$curntYear)
	{		
		$get_all=mysqli_query($this->connect,"select `admission_number` from `class_upgrading`
		WHERE class='$cls' AND section='$sec' AND year='$curntYear'
       	ORDER BY roll_no ASC	");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$stuId=$fetch['admission_number'];
			$chkStuStat=$this->singelStuInfo($stuId);
			if($chkStuStat['status']==1)
			{
			$container[]=$fetch;
		    }
		}
		return $container;	
	}
	 function updtStuAtten($cls,$sec,$stuId,$atend)
	{
		$curntDate=date("Y-m-d");
		$created_by=$_SESSION['user_email'];
		$instime=time();
		$up_atte=mysqli_query($this->connect,"UPDATE `stu_attendance` SET 
		`attendance`='$atend',`created_by`='$created_by',`update_on`='$instime'
		WHERE class='$cls' AND section='$sec' AND st_id='$stuId' AND DATE(date)='$curntDate' ");
		
		
	}
	function singelAtendncInfo($cls,$sec,$stuId)
	{		
		$curntDate=date("Y-m-d");
		$get_single=mysqli_query($this->connect,"select `attendance` from `stu_attendance` 
        where  st_id='$stuId' AND DATE(date)='$curntDate' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function singelAtendncInfoByAtendncField($cls,$sec,$stuId)
	{		
		$curntDate=date("Y-m-d");
		$get_single=mysqli_query($this->connect,"select `attendance` from `stu_attendance` 
        where  st_id='$stuId' AND DATE(date)='$curntDate' ");
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
	function fetchStuAtndncByClsSecONDate($clas,$sec,$date)
	{		
		$get_all=mysqli_query($this->connect,"select * from `stu_attendance` WHERE `class`='$clas' AND `section`='$sec' 
			AND `date`='$date'");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;	
	}
	function sendSMS($cls,$sec)
	{	
	    $curntDate=date("Y-m-d");	
	    $created_by=$_SESSION['user_email'];
		$instime=time();				
		$i=1;
		$encdClass=base64_encode($cls);
		$encdSec=base64_encode($sec);
		$get_all=mysqli_query($this->connect,"select * from `stu_attendance` 
        where class='$cls' AND section='$sec' AND DATE(date)='$curntDate'");
		$rwCount=mysqli_num_rows($get_all);
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{		
			$stuDetls=$this->singelStuInfo($fetch['st_id']);
			$stuNm=$stuDetls['stu_full_nm'];
			$atndncSta=$fetch['attendance'];
			if($atndncSta==1)
			{
				$attendance='present';
			}
			if($atndncSta==0)
			{
				$attendance='absent';
			}
			$crDate= DATE("M-d-Y");
			$i++;
			if($i==$rwCount)
			{				
				$insrt=mysqli_query($this->connect,"INSERT INTO `smsrecords`
				(`sms_for`, `class`, `sec`, `sms_count`, `date`,`created_by`,
				`in_time`, `updated_on`) VALUES ('attandance','$cls',
				'$sec','$i','$curntDate','$created_by','$instime','$instime')");
			}
			/* 
			//your username
			$username = "Maxcin@AGPNER";
			//Your API key
			$apikey = "3da88287-abef-4c86-a0fa-8d1aea247cf8";
			//Multiple mobiles numbers separated by comma $mobileNumber = "XXXXXXXXXX";
			$mobileNumber = $stuDetls['father_mobile'];
			//Sender ID,sender id should be 6 characters long.
			$senderId = "AGPNHS";
			//Your message to send, .
			$message = "Your ward - $stuNm is $attendance today $crDate";
			$smstype = "TRANS";
			//Prepare you post parameters
			$postData = array(
			     'apikey' => $apikey,
			     'numbers' => $mobileNumber ,
			     'message' => $message ,
			     'sendername' =>$senderId ,
			     'smstype' => $smstype,
			        'username' => $username,
			);
			//API URL
			$url="http://sms.hspsms.com/sendSMS";

			// init the resource
			$ch = curl_init();
			curl_setopt_array($ch, array(
			     CURLOPT_URL => $url,
			     CURLOPT_RETURNTRANSFER => true,
			     CURLOPT_POST => true,
			     CURLOPT_POSTFIELDS => $postData
			     //,CURLOPT_FOLLOWLOCATION => true
			));


			//Ignore SSL certificate verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); curl_setopt($ch,
			CURLOPT_SSL_VERIFYPEER, 0);


			//get response
			$output = curl_exec($ch);

			//Print error if any
			if(curl_errno($ch))
			{
			     echo 'error:' . curl_error($ch);
			}

			curl_close($ch);

			echo $output;*/
			
		}
		 echo "
            <script type=\"text/javascript\">           
		   window.location='atndnc_sms_conf?cls=$encdClass&sec=$encdSec';
            </script>
        ";
     }

	function smsChkOD($cls,$sec)
	{		
		$curntDate=date("Y-m-d");	
		$get_single=mysqli_query($this->connect,"select * from `smsrecords` 
        where class='$cls' AND sec='$sec' AND DATE(date)='$curntDate'");
		$row_count=mysqli_num_rows($get_single);
		return $row_count; 	
	}
	function onDtAllSmsRecords($cdte)
	{	 echo "select * from `smsrecords` WHERE `sms_for`='attandance' AND 'date'='$cdte'  ";   		
		$get_all=mysqli_query($this->connect,"select * from `smsrecords` WHERE `sms_for`='attandance' AND 'date'='$cdte'  ");	
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
	}
	
	/*	function updateDateClmInAtndnce()
	{
		$curntDate=date("Y-m-d");
		$get_all=mysqli_query($this->connect,"select * from `stu_attendance` ");		
		while($fetch=mysqli_fetch_array($get_all))
		{
			$prId=$fetch['id'];
			$insDt=date("Y-m-d",$fetch['inserted']);
			$updt_all=mysqli_query($this->connect,"UPDATE `stu_attendance` SET `date`='$insDt' WHERE `id`='$prId' ");	
		}
		if($updt_all)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Successfully Updated</h5>";	
		}
		else
		{
			return mysqli_error($this->connect); 
		}
			
	}*/
		
	//Function End for Attendance
	//Function Start for General Admission Charges
     function addGenAdminCharg()
	{
		$year=mysqli_real_escape_string($this->connect,$_POST['year']);
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$admg_fees=mysqli_real_escape_string($this->connect,$_POST['gen_adm_chr']);
		$status=mysqli_real_escape_string($this->connect,$_POST['gac_status']);
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `general_admission_charges` WHERE year='$year' AND class='$class'");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h3 style='color:red;'>General admission charges already exists</h3>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `general_admission_charges`(`year`,`class`, 
        `admg_fees`, `status`, `created_by`, `in_time`, `update_time`) 
         VALUES ('$year','$class','$admg_fees','$status','$created_by','$instime','$instime')");
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
			return "<h3 style='color:red;'>Student already paid</h3>";
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
			return "<h3 style='color:green;'>Successfully Added</h3>";
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
	function onDtTotlGenrlAdmisnChrgesCollectionsDtl()
	{		
		$get_all=mysqli_query($this->connect,"select * from `student_general_admission_charges` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");	
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
	}
	function onDtTotlGenrlAdmisnChrges()
	{		
		$get_sum=mysqli_query($this->connect,"select SUM(payed_amount)  from `student_general_admission_charges` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");	
		$row = mysqli_fetch_row($get_sum); 
		return $row[0];
	}
	function onDtTotlGenrlAdmisnChrgesCount()
	{		
		$get_sum=mysqli_query($this->connect,"select * from `student_general_admission_charges` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");			
		return   $count=mysqli_num_rows($get_sum);
	}
	function exportGACExl($class,$section,$yar)
	{
    $user_query = mysqli_query($this->connect,"select * from `class_upgrading`  WHERE year='$yar' AND class='$class' AND section='$section' ");
   $data=array();
   $i=1;
   while($fetch=mysqli_fetch_array($user_query))
  {    
  $admNo=$fetch['admission_number']; 
   
   $stuInfoa=  mysqli_query($this->connect,"select * from `student_registation` where admission_number='$admNo' ");
   $stuInfo=mysqli_fetch_array($stuInfoa);
       $student=$stuInfo['stu_full_nm'];
   
   $stuGenAdLedgera= mysqli_query($this->connect,"select * from `student_general_admission_charges` WHERE student_id='$admNo' AND year='$yar' "); 
   $stuGenAdLedger=mysqli_fetch_array($stuGenAdLedgera);
       if($stuGenAdLedger['concession']==1)
   {
     $category='General Student';
   }
    else
   {
        
      $category='Concession Student';
   } 
   
   
   if($stuGenAdLedger==true)
   {
       
       $paid=$stuGenAdLedger['payed_amount'];                          
       $desc=$stuGenAdLedger['description'];
       
   }   
   else
   {
       
       $paid="Not Paid";                       
       $category="Not Paid";                       
       $desc="Not Paid";
       
   }
    $data[]=array("Sl No."=>$i,"Student Name"=>$student, "Receive Amount"=>$paid,"Category"=>$category,"Description"=>$desc);   
    $i++;         
   }

   return $data;
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
			return "<h3 style='red;'>Student already paid</h3>";
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
			return "<h3 style='color:green;'>Successfully Added</h3>";
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
	function onDtTotlHostellAdmisnChrgesDetail()
	{		
		$get_all=mysqli_query($this->connect,"select * from `student_hostel_admission_charges` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
	}
	function onDtTotlHostellAdmisnChrges()
	{		
		$get_sum=mysqli_query($this->connect,"select SUM(payed_amount)  from `student_hostel_admission_charges` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");
		$row = mysqli_fetch_row($get_sum); 
		return $row[0];
	}
	function onDtTotlHostlAdmisnChrgesCount()
	{		
		$get_sum=mysqli_query($this->connect,"select * from `student_hostel_admission_charges` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");			
		return   $count=mysqli_num_rows($get_sum);
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
	function onDtTotlreAdmisnChrgesDtls()
	{		
		$get_all=mysqli_query($this->connect,"select *  from `receive_stud_readmison_charges` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
	}
	function onDtTotlreAdmisnChrges()
	{		
		$get_sum=mysqli_query($this->connect,"select SUM(payed_amount)  from `receive_stud_readmison_charges` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");
		$row = mysqli_fetch_row($get_sum); 
		return $row[0];
	}
	function onDtTotlreAdmisnChrgesCount()
	{		
		$get_sum=mysqli_query($this->connect,"select * from `receive_stud_readmison_charges` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");			
		return   $count=mysqli_num_rows($get_sum);
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
	function onDtTotlHostelFeesDtls()
	{		
		$get_all=mysqli_query($this->connect,"select * from `receive_student_hostel_fees` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
	}
	function onDtTotlHostelFees()
	{		
		$get_sum=mysqli_query($this->connect,"select SUM(receving_amont)  from `receive_student_hostel_fees` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");
		$row = mysqli_fetch_row($get_sum); 
		return $row[0];
	}
	function onDtTotlreHostelFeesCount()
	{		
		$get_sum=mysqli_query($this->connect,"select * from `receive_student_hostel_fees` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");			
		return   $count=mysqli_num_rows($get_sum);
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
	function onDtTotlOtherAnulChrgsDtls()
	{		
		$get_all=mysqli_query($this->connect,"select * from `receive_stud_other_annual_charges` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
	}
	function onDtTotlOtherAnulChrgss()
	{		
		$get_sum=mysqli_query($this->connect,"select SUM(paid_amoount)  from `receive_stud_other_annual_charges` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");
		$row = mysqli_fetch_row($get_sum); 
		return $row[0];
	}
	function onDtTotlOtherAnulChrgssCount()
	{		
		$get_sum=mysqli_query($this->connect,"select * from `receive_stud_other_annual_charges` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");			
		return   $count=mysqli_num_rows($get_sum);
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
		WHERE student_id='$student_id'	AND payment_year='$payment_year' AND payment_month='$payment_month' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Student already paid for this month</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `recived_student_tution_fees`(`payment_year`, `payment_month`, `payment_date`, `class`, `section`, `student_id`, `paid_amount`, `sms_status`, `status`, `created_by`, `in_time`, `update_time`) VALUES ('$payment_year','$payment_month','$payment_date','$class','$section','$student_id','$paid_amount','0','$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			$last_id =base64_encode(mysqli_insert_id($this->connect));
			 echo "
            <script type=\"text/javascript\">           
		  	 window.open('printout?id=$last_id', '_blank');
            </script>
        ";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}

	function ajaxReceveSessionTuitionFees($admisNum,$date,$class,$section,$monthNo,$year,$tutionFees,$cretby)
	{				
		
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `recived_student_tution_fees`
		WHERE student_id='$admisNum' AND payment_year='$year' AND payment_month='$monthNo' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Student already paid for this month</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `recived_student_tution_fees`(`payment_year`, `payment_month`, `payment_date`, `class`, `section`, `student_id`, `paid_amount`, `sms_status`, `status`, `created_by`, `in_time`, `update_time`) VALUES ('$year','$monthNo','$date','$class','$section','$admisNum','$tutionFees','0','1','$cretby','$instime','$instime')");
		if($in_cate)
		{
			 echo "1";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	 function ajaxStuTutnFes($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `recived_student_tution_fees` 
        where id='$id'  ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function findAStRecTuFee($stId,$year,$month)
	{
		
		$get_single=mysqli_query($this->connect,"select * from `recived_student_tution_fees` 
        WHERE payment_year='$year' AND payment_month='$month' AND student_id='$stId'");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
		
	}
	
	function academicYear()
	{
		$curntYear=date("Y");
		if(date("m")>=3)
		{
		$year=$curntYear;
		}
		if(date("m")<=3)
		{
		$year=$curntYear-1;
		}
		return $year;

	}
	function findAllTutionFeesListToRece($clsid,$secid,$month,$PaymntYear)
	{
		$academicYear=$this->academicYear();
		$allStuCrCls=$this->fndAlStuByCrClsFUpg($clsid,$secid,$academicYear);
		$container=array();
		while($fetch=mysqli_fetch_array($allStuCrCls))
		{
			$admsnNum=$fetch['admission_number'];
	       $studentInfo=$this->singelStuInfo($admsnNum);
	       if($studentInfo['status']=='1')
		   {
	       $chkTutFeLed=$this->findAStRecTuFee($admsnNum,$PaymntYear,$month);
		    if($chkTutFeLed==FALSE) 
			   { 	
			$container[]=$fetch;
		       }
	       }
		}
		return $container;
		
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
	function findAllStuTutnFesOnDate()
	{
		$get_all=mysqli_query($this->connect,"select * from `recived_student_tution_fees`
     	WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE()) ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function findAllNotPaidStudent($stuAdmNo,$payYear,$payMonth)
	{
		
         
		$chkStuTu=mysqli_query($this->connect,"SELECT * FROM `recived_student_tution_fees` WHERE payment_year='$payYear' AND payment_month='$payMonth' 	AND student_id='$stuAdmNo' ");
		$count=mysqli_num_rows($chkStuTu);
		return $count;
		
	}
	function onDtTotlMonthlyFeesDetls()
	{		
		$get_all=mysqli_query($this->connect,"select * from `recived_student_tution_fees` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
	}
	function onDtTotlMonthlyFees()
	{		
		$get_sum=mysqli_query($this->connect,"select SUM(paid_amount)  from `recived_student_tution_fees` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");
		$row = mysqli_fetch_row($get_sum); 
		return $row[0];
	}
	function onDtTotlMonthlyFeesCount()
	{		
		$get_sum=mysqli_query($this->connect,"select * from `recived_student_tution_fees` WHERE DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE())   ");			
		return   $count=mysqli_num_rows($get_sum);
	}
	function sendMTFSMS($id,$redicurl)
	{
		$upTime=time();					
		$getStuId=mysqli_query($this->connect,"select `student_id`,`paid_amount` from `recived_student_tution_fees` where `id`='$id' ");
		$fetch_singel=mysqli_fetch_array($getStuId);
		$singlStuInfo=$this->singelStuInfo($fetch_singel['student_id']);
		$studentName=$singlStuInfo['stu_full_nm'];
		$amountPaid=$fetch_singel['paid_amount'];

		//your username
		$username = "Maxcin@AGPNER";
		//Your API key
		$apikey = "3da88287-abef-4c86-a0fa-8d1aea247cf8";
		//Multiple mobiles numbers separated by comma $mobileNumber = "XXXXXXXXXX";
		$mobileNumber = $singlStuInfo['father_mobile'];
		//Sender ID,sender id should be 6 characters long.
		$senderId = "AGPNHS";
		//Your message to send, .
		$message = "$amountPaid r.s paid to AGPN CONVENT E R SCHOOL.. BY $studentName";
		$smstype = "TRANS";
		//Prepare you post parameters
		$postData = array(
		     'apikey' => $apikey,
		     'numbers' => $mobileNumber ,
		     'message' => $message ,
		     'sendername' =>$senderId ,
		     'smstype' => $smstype,
		        'username' => $username,
		);
		//API URL
		$url="http://sms.hspsms.com/sendSMS";

		// init the resource
		$ch = curl_init();
		curl_setopt_array($ch, array(
		     CURLOPT_URL => $url,
		     CURLOPT_RETURNTRANSFER => true,
		     CURLOPT_POST => true,
		     CURLOPT_POSTFIELDS => $postData
		     //,CURLOPT_FOLLOWLOCATION => true
		));


		//Ignore SSL certificate verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); curl_setopt($ch,
		CURLOPT_SSL_VERIFYPEER, 0);


		//get response
		$output = curl_exec($ch);

		//Print error if any
		if(curl_errno($ch))
		{
		     echo 'error:' . curl_error($ch);
		}

		curl_close($ch);

		echo $output;

		$update=mysqli_query($this->connect,"UPDATE `recived_student_tution_fees` SET `sms_status`='1', `update_time`='$upTime' WHERE `id`='$id' ");	
		 echo "<script>location='tlmtlbcs?$redicurl;'</script>";
     }
     function sendtutionFNPSMS($admissionNumber,$date,$class,$section,$monthNo,$year,$cretby)
	{	
	   $singlStuInfo=$this->singelStuInfo($admissionNumber);   

				//your username
				$username = "Maxcin@AGPNER";
				//Your API key
				$apikey = "3da88287-abef-4c86-a0fa-8d1aea247cf8";
				//Multiple mobiles numbers separated by comma $mobileNumber = "XXXXXXXXXX";
				$mobileNumber = $singlStuInfo['father_mobile'];
				//Sender ID,sender id should be 6 characters long.
				$senderId = "AGPNHS";
				//Your message to send, .
				$message = "PLEASE DEPOSIT DUE FEES SOON TO AVOID FINE. IF PAID THEN IGNORE THIS NOTICE.";
				$smstype = "TRANS";
				//Prepare you post parameters
				$postData = array(
				     'apikey' => $apikey,
				     'numbers' => $mobileNumber ,
				     'message' => $message ,
				     'sendername' =>$senderId ,
				     'smstype' => $smstype,
				        'username' => $username,
				);
				//API URL
				$url="http://sms.hspsms.com/sendSMS";

				// init the resource
				$ch = curl_init();
				curl_setopt_array($ch, array(
				     CURLOPT_URL => $url,
				     CURLOPT_RETURNTRANSFER => true,
				     CURLOPT_POST => true,
				     CURLOPT_POSTFIELDS => $postData
				     //,CURLOPT_FOLLOWLOCATION => true
				));


				//Ignore SSL certificate verification
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); curl_setopt($ch,
				CURLOPT_SSL_VERIFYPEER, 0);


				//get response
				$output = curl_exec($ch);

				//Print error if any
				if(curl_errno($ch))
				{
				     echo 'error:' . curl_error($ch);
				}

				curl_close($ch);

				echo $output;
			$insert=$this->insertIntoMtfr($admissionNumber,$date,$class,$section,$monthNo,$year,$cretby);
			$encodedDate=base64_encode($date);	
			$encodedclass=base64_encode($class);	
			$encodedsection=base64_encode($section);				
		echo "<script>location='tlmtlbcs?d=$encodedDate&c=$encodedclass&s=$encodedsection'</script>";
     }
     public function insertIntoMtfr($admissionNumber,$date,$class,$section,$monthNo,$year,$cretby)
     {
     	$inTime=time();
     	$insert=mysqli_query($this->connect,"INSERT INTO `monthly_tution_fees_sms_records`(`admission_number`, `class`, `section`, `month`, `year`, `send_date`, `sms_for`, `created_by`, `in_time`) VALUES ('$admissionNumber','$class','$section','$monthNo','$year','$date','Monthly Tution Fess Due Reminder','$cretby','$inTime') ");
     }
     function chkMTFDSMS($admissionNumber,$class,$section,$monthNo,$year)
	{		
		$get_sum=mysqli_query($this->connect,"select * from `monthly_tution_fees_sms_records` WHERE `admission_number`='$admissionNumber' AND `class`='$class' AND `section`='$section' AND `month`='$monthNo' AND `year`='$year' ");			
		return   $count=mysqli_num_rows($get_sum);
	}

     
	//Function End for Tuition Fees
	//Function Start for Miscellaneous Fees
	function receveMiscellaneousFees()
	{
		$recev_date=mysqli_real_escape_string($this->connect,$_POST['recev_date']);
		$fees_category=mysqli_real_escape_string($this->connect,$_POST['fees_category']);		
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);		
		$student_id=mysqli_real_escape_string($this->connect,$_POST['strn']);
		$receve_amount=mysqli_real_escape_string($this->connect,$_POST['receve_amount']);		
		$status=mysqli_real_escape_string($this->connect,$_POST['miscfee_stat']);
		$created_by=$_SESSION['user_email'];
		$instime=time();       
		$in_cate=mysqli_query($this->connect,"INSERT INTO `receive_miscellaneous_fees`(`recev_date`, `fees_category`, `class`, `section`, `student_id`, `receve_amount`, `status`, `cereated_by`, `InTime`, `upTime`) VALUES ('$recev_date','$fees_category','$class','$section','$student_id','$receve_amount','$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<b style='color:green'>Successfully Receive</b>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		
	}
	function findAllRecvdMiscFes()
	{
		$get_all=mysqli_query($this->connect,"SELECT * FROM `receive_miscellaneous_fees`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function onDtTotlMiscellaneousFeesDtls()
	{		
		$get_all=mysqli_query($this->connect,"select * from `receive_miscellaneous_fees` WHERE DATE(FROM_UNIXTIME(InTime)) = DATE(CURDATE())   ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
	}
	function onDtTotlMiscellaneousFees()
	{		
		$get_sum=mysqli_query($this->connect,"select SUM(receve_amount)  from `receive_miscellaneous_fees` WHERE DATE(FROM_UNIXTIME(InTime)) = DATE(CURDATE())   ");
		$row = mysqli_fetch_row($get_sum); 
		return $row[0];
	}
	function onDtTotlMiscellaneousFeesCount()
	{		
		$get_sum=mysqli_query($this->connect,"select * from `receive_miscellaneous_fees` WHERE DATE(FROM_UNIXTIME(InTime)) = DATE(CURDATE())   ");			
		return   $count=mysqli_num_rows($get_sum);
	}
	//Function End for Miscellaneous Fees
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
	 function singelDepartment($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `emp_dept` 
        where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
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
	 function singelEmpDesignation($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `emp_designatio` 
        where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
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
		move_uploaded_file($_FILES['id_proof']['tmp_name'],'../common/employee/emp_id_proof/'.$id_proof);		
		move_uploaded_file($_FILES['work_exp']['tmp_name'],'../common/employee/emp_wrk_exp/'.$work_exp);
		move_uploaded_file($_FILES['emp_img']['tmp_name'],'../common/employee/emp_img/'.$emp_img);
		if($insert)
		{		
		return "<h4 style='color:blue'>Successfully Added</h4>";	
		}	
		else
		return mysqli_error($this->connect); 
		  }
	}
	function updateSpecificEmpDta($emp_code)
	{	     	 		  
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
		  $updtTime=time();
          $sigelEmpDetls=$this->singelEmployeeDetls($emp_code);
		  
		   if($id_proof !='')
		 {
			$id_proof_final=mysqli_real_escape_string($this->connect,$id_proof);		  
		     unlink('../common/employee/emp_id_proof/'.$sigelEmpDetls['id_proof']);	
           move_uploaded_file($_FILES['id_proof']['tmp_name'],'../common/employee/emp_id_proof/'.$id_proof_final);			 
		 }	
           if($id_proof =='')
		 {
		    if($sigelEmpDetls['id_proof']!='')
			{
				$id_proof_final=$sigelEmpDetls['id_proof'];				
			}
			if($sigelEmpDetls['id_proof']=='')
			{
				$id_proof_final='';
			}
		 }
		 
		 
		   if($work_exp !='')
		 {
			$work_exp_final=mysqli_real_escape_string($this->connect,$work_exp);		  
		     unlink('../common/employee/emp_wrk_exp/'.$sigelEmpDetls['work_exp']);	          
            move_uploaded_file($_FILES['work_exp']['tmp_name'],'../common/employee/emp_wrk_exp/'.$work_exp_final);		   
		 }	
           if($work_exp =='')
		 {
		    if($sigelEmpDetls['work_exp']!='')
			{
				$work_exp_final=$sigelEmpDetls['work_exp'];				
			}
			if($sigelEmpDetls['work_exp']=='')
			{
				$work_exp_final='';
			}
		 }
		 
		 
		   if($emp_img !='')
		 {
			$emp_img=mysqli_real_escape_string($this->connect,$emp_img);		  
		     unlink('../common/employee/emp_img/'.$sigelEmpDetls['emp_img']);	
            move_uploaded_file($_FILES['emp_img']['tmp_name'],'../common/employee/emp_img/'.$emp_img);			 
		 }	
           if($emp_img =='')
		 {
		    if($sigelEmpDetls['emp_img']!='')
			{
				$emp_img=$sigelEmpDetls['emp_img'];				
			}
			if($sigelEmpDetls['emp_img']=='')
			{
				$emp_img='';
			}
		 }
			  
	    $insert=mysqli_query($this->connect, "UPDATE `employee` SET `emp_name`='$emp_name',`email`='$email',
		`contact_number`='$contact_number',`alt_number`='$alt_number',`qualification`='$qualification',`wrk_exp`='$wrk_exp',
		`wrk_field`='$wrk_field',`blood_group`='$blood_group',`dob`='$dob',`age`='$age',
		`hw_name`='$hw_name',`mother_name`='$mother_name',`father_name`='$father_name',
		`location`='$location',`address`='$address',`pin`='$pin',
		`nationallity`='$nationallity',`medical_codition`='$medical_codition',`mother_tongue`='$mother_tongue',
		`religion`='$religion',`cast`='$cast',`department`='$department',`designation`='$designation',
		`salary`='$salary',`salary_ac`='$salary_ac',`pan_number`='$pan_number',`pf_number`='$pf_number',
		`adhar_number`='$adhar_number',`id_proof`='$id_proof_final',`work_exp`='$work_exp_final',`emp_img`='$emp_img',
		`maritual_status`='$maritual_status',`gender`='$gender',`status`='$status',`created_by`='$created_by',
		`updated_time`='$updtTime' WHERE emp_code='$emp_code'");	
		if($insert)
		{		
		return "<h4 style='color:blue'>Successfully Updated</h4>";	
		}	
		else
		return mysqli_error($this->connect); 
		  
	}
	function singelEmployeeDetls($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `employee` 
        where emp_code='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function singelEmployeeDetlsByDepDesg($dept,$desg)
	{		
		$get_single=mysqli_query($this->connect,"select * from `employee` 
        where `department`='$dept' AND `designation`='$desg' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function singelEmployeeDetlsByDesg($desg)
	{		
		$get_single=mysqli_query($this->connect,"select * from `employee` 
        where `designation`='$desg' ");
		$count=mysqli_num_rows($get_single);
		return $count; 	
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
	 function empCodeValidation($empCode)
	{		
	     $get_single=mysqli_query($this->connect,"select emp_code from
		`employee`  WHERE  emp_code='$empCode' ");
		$count=mysqli_num_rows($get_single);
			
        if($count==1)
        {
			echo "<b style='color:red;'>Employee Code / Not Available</b>";
		}
		if($count==0)
        {
			echo "<b style='color:green;'>
		  Employee Code / Available</b>";
		} 			
	}
	function empEmailVerif($emailId)
	{	
      
		$get_single=mysqli_query($this->connect,"select email from
		`employee`  WHERE  email='$emailId' ");
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
	function EmployeeCount()
	{
		$get_all=mysqli_query($this->connect,"select * from `employee`");
		return mysqli_num_rows($get_all);
		
	}
	public function dwnldEmpIdProf($id)
	{
		
		$fname=base64_decode($id);		
		header('Content-Description:FileTransfer');
		header('Content-Type:application/octet-stream');		
		header('Content-Disposition:attachment;filename='.basename('../common/employee/emp_id_proof/'."$fname"));
		header('Expires:0');
		header('Cache-Control:must-revalidate');
		header('Pragma:public');
		header('Content-aLength:'.filesize('../common/employee/emp_id_proof/'."$fname"));
		ob_clean();
		flush();
		readfile('../common/employee/emp_id_proof/'."$fname");
		exit;				
		
	}
	public function dwnldEmpWorkExp($id)
	{
		
		$fname=base64_decode($id);		
		header('Content-Description:FileTransfer');
		header('Content-Type:application/octet-stream');		
		header('Content-Disposition:attachment;filename='.basename('../common/employee/emp_wrk_exp/'."$fname"));
		header('Expires:0');
		header('Cache-Control:must-revalidate');
		header('Pragma:public');
		header('Content-aLength:'.filesize('../common/employee/emp_wrk_exp/'."$fname"));
		ob_clean();
		flush();
		readfile('../common/employee/emp_wrk_exp/'."$fname");
		exit;				
		
	}
	//Function End for Employee 
	//Function Start for Employee Login Control
	function addEmpLogin()
	{
		$emp_code=mysqli_real_escape_string($this->connect,$_POST['emp_codeNm']);
		$user_id=mysqli_real_escape_string($this->connect,$_POST['emp_userid']);
		$password=mysqli_real_escape_string($this->connect,$_POST['emp_confirm_password']);
		$status=mysqli_real_escape_string($this->connect,$_POST['emp_logn_st']);				
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `emp_login_user` WHERE emp_code='$emp_code'
		AND user_id='$user_id' AND password='$password'");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h5 style='color:rgb(244, 54, 61);'>Result already exists</h5>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `emp_login_user`(`emp_code`, `user_id`, `password`, `status`, `created_by`, `in_time`, `up_time`) VALUES ('$emp_code','$user_id','$password','$status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h4 style='color:green;'>Successfully Added</h4>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function updateEmpLogin($empCode)
	{
		$emp_code=mysqli_real_escape_string($this->connect,$_POST['emp_codeNm']);
		$user_id=mysqli_real_escape_string($this->connect,$_POST['emp_userid']);
		$password=mysqli_real_escape_string($this->connect,$_POST['emp_confirm_password']);
		$status=mysqli_real_escape_string($this->connect,$_POST['emp_logn_st']);				
		$created_by=$_SESSION['user_email'];		
		if($password=='')
		{
          $singlEmpLCDtls=$this->singelEmpAdmLognDetils($emp_code);
          $password=$singlEmpLCDtls['password'];
		}
		$instime=time();
        $uniq=mysqli_query($this->connect,"select * from `emp_login_user` WHERE `user_id`='$user_id'
		AND `emp_code` !='$empCode' ");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h4 style='color:rgb(244, 54, 61);'>Result already exists</h4>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"UPDATE `emp_login_user` SET `emp_code`='$emp_code',`user_id`='$user_id',`password`='$password',`status`='$status',`created_by`='$created_by',`up_time`='$instime' WHERE `emp_code`='$empCode' ");
		if($in_cate)
		{
			return "<h4 style='color:green;'>Successfully Updated</h4>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	 function empLognIdValidation($empLognId)
	{		
		$get_single=mysqli_query($this->connect,"select user_id from
		`emp_login_user`  WHERE user_id='$empLognId' ");
		$count=mysqli_num_rows($get_single);
			
        if($count==1)
        {
			echo "<b style='color:red;'>Employee User ID / Not Available</b>";
		}
		if($count==0)
        {
			echo "<b style='color:green;'>
		  Employee User ID / Available</b>";
		}			
	}
	function empUserIdUpdateValidation($empId,$userId)
	{		
		$get_single=mysqli_query($this->connect,"select user_id from
		`emp_login_user`  WHERE user_id='$userId' AND `emp_code`!='$empId' ");
		$count=mysqli_num_rows($get_single);
        if($count==1)
        {
			echo "<b style='color:red;'>Employee User ID / Not Available</b>";
		}
		if($count==0)
        {
			echo "<b style='color:green;'>Employee User ID / Available</b>";
		}		
	}
	function allEmplLoginDetls()
	{
		$get_all=mysqli_query($this->connect,"select * from `emp_login_user`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function singelEmpAdmLognDetils($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `emp_login_user` 
        where emp_code='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	
	//Function End for Employee Login Control
	//Function Start for Librey Books
	function addLibBooks()
	{
		$year=mysqli_real_escape_string($this->connect,$_POST['year']);
		$book_nm=mysqli_real_escape_string($this->connect,$_POST['book_nm']);		
		$book_code=mysqli_real_escape_string($this->connect,$_POST['book_code']);
		$author_name=mysqli_real_escape_string($this->connect,$_POST['author_name']);
		$book_price=mysqli_real_escape_string($this->connect,$_POST['book_price']);
		$book_self=mysqli_real_escape_string($this->connect,$_POST['bokslf']);
		$book_category=mysqli_real_escape_string($this->connect,$_POST['boca']);
		$book_status=mysqli_real_escape_string($this->connect,$_POST['book_status']);				
		$created_by=$_SESSION['user_email'];
		$instime=time();	
        $uniq=mysqli_query($this->connect,"select * from `add_lib_book` WHERE book_nm='$book_nm'");		
		$count=mysqli_num_rows($uniq);
		
		if($count>0)
		{
			return "<h4 style='color:rgb(244, 54, 61);'>Book already exists</h4>";
		}
		else
		{
		$in_cate=mysqli_query($this->connect,"INSERT INTO `add_lib_book`(`year`, `book_nm`, `book_code`, `author_name`, `book_price`, `book_self`, 
		 `book_category`, `book_status`, `created_by`, `in_time`, `update_time`) VALUES ('$year','$book_nm','$book_code','$author_name','$book_price',
		 '$book_self','$book_category','$book_status','$created_by','$instime','$instime')");
		if($in_cate)
		{
			return "<h4 style='color:green;'>Successfully Added</h4>";
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
	function allEnroledBkookDuDtExcited()
	{
		$get_all=mysqli_query($this->connect,"select * from `lib_enrolld_bk`
         WHERE status='1' AND (UNIX_TIMESTAMP(CURDATE())-issue_date)/(24*60*60)>7 ");
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
		move_uploaded_file($_FILES['achiver_img']['tmp_name'],'../common/students/achievers/'.$achiv_img);		
		if($in_cate)
		{
			return "<h4 style='color:green;'>Successfully Added</h4>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
	}
	function updateStudentAchievement($achvId)
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
		$singlAchvrInfo=$this->singelAchiverDtls($achvId);
		if($achiv_img!='')
		{ 
           $achiv_img=mysqli_real_escape_string($this->connect,$achiv_img); 
		   move_uploaded_file($_FILES['achiver_img']['tmp_name'],'../common/students/achievers/'.$achiv_img);
		   if($singlAchvrInfo['achiv_img']!='')
			{
		   unlink('../common/students/achievers/'.$singlAchvrInfo['achiv_img']);	
		    }
		}
		if($achiv_img =='')
		 {
		    if($singlAchvrInfo['achiv_img']!='')
			{
				$achiv_img=$singlAchvrInfo['achiv_img'];				
			}
			if($singlAchvrInfo['achiv_img']=='')
			{
				$achiv_img='';
			}
		 }
        $in_cate=mysqli_query($this->connect,"UPDATE `stu_achievement` SET `class`='$class',`section`='$section',`student`='$student',
			`achiv_title`='$achiv_title',`achiv_desc`='$achiv_desc',`achiv_img`='$achiv_img',`achiv_date`='$achiv_date',`status`='$status',
			`created_by`='$created_by',`updated_time`='$instime' WHERE id='$achvId' ");			
		if($in_cate)
		{
			return "<h4 style='color:green;'>Successfully Updated</h4>";
		}
		else
		{
			return mysqli_error($this->connect); 
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
	function singelAchiverDtls($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `stu_achievement` 
        where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
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
		move_uploaded_file($_FILES['stdy_mat']['tmp_name'],'../common/studymaterials/'.$study_file);		
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
	function findAllholidys()
	{
		$get_all=mysqli_query($this->connect,"select * from `holidays` WHERE status='1' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
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
	function findAllEvents()
	{
		$get_all=mysqli_query($this->connect,"select * from `events` WHERE status='1' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
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
		move_uploaded_file($_FILES['clsdiry_file']['tmp_name'],'../common/classdiary/'.$file);
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
	function updateClassDiary($did)
	{
		$diary_date=mysqli_real_escape_string($this->connect,$_POST['clsdiry_date']);
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$ogfilename=$_FILES['clsdiry_file']['name'];
		$siglDiryDtl=$this->sigelDairyDetls($did);		
		$status=mysqli_real_escape_string($this->connect,$_POST['clsdiry_status']);						
		$uploaded_by=$_SESSION['user_email'];
		$instime=time();  
         $uniq=mysqli_query($this->connect,"select * from `class_diary` WHERE
		diary_date='$diary_date' AND class='$class' AND section='$section' AND `id`!='$did' ");		
		$count=mysqli_num_rows($uniq);		
		if($count>0)
		{
			return "<h2 style='color:rgb(244, 54, 61);'>Diary Alredy Exist</h2>";
		}
		else
		{	
		if($ogfilename=='')
		{          
          $file=$siglDiryDtl['file'];              	
		}
		if($ogfilename!='')
		{
           $file=time().'-'.$ogfilename;
           move_uploaded_file($_FILES['clsdiry_file']['tmp_name'],'../common/classdiary/'.$file);  
           unlink('../common/classdiary/'.$siglDiryDtl['file']);
		}	
		$in_cate=mysqli_query($this->connect,"UPDATE `class_diary` SET `diary_date`='$diary_date',`class`='$class',`section`='$section',`file`='$file',`status`='$status',`uploaded_by`='$uploaded_by',`uplod_time`='$instime' WHERE `id`='$did'");		
		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Updated</h3>";
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
	function allClassDairyCount()
	{
		$get_all=mysqli_query($this->connect,"select * from `class_diary` WHERE status='1' ");
		$clsDiryCount=mysqli_num_rows($get_all);		
		return $clsDiryCount;
		
	}
	function sigelDairyDetls($id)
	{
		$get_all=mysqli_query($this->connect,"select * from `class_diary` WHERE `id`='$id'");
		$fetch=mysqli_fetch_array($get_all);
		return $fetch;
		
	}
	function deltClassDiary()
	{
		$id=$_POST['classDiaryId'];
		$del=mysqli_query($this->connect,"DELETE FROM `class_diary` WHERE `file`='$id' ");		
		 unlink('../common/classdiary/'.$id);
		
	}
		public function downloadClassDiary($id)
	{
		
		$fname=$id;		
		header('Content-Description:FileTransfer');
		header('Content-Type:application/octet-stream');		
		header('Content-Disposition:attachment;filename='.basename('../common/classdiary/'."$fname"));
		header('Expires:0');
		header('Cache-Control:must-revalidate');
		header('Pragma:public');
		header('Content-aLength:'.filesize('../common/classdiary/'."$fname"));
		ob_clean();
		flush();
		readfile('../common/classdiary/'."$fname");
		exit;				
		
	}
    //Function End for Class Diary   
    //Function Start for Lesson Plan     
	function uploadLessonPlan()
	{
		$lp_date=mysqli_real_escape_string($this->connect,$_POST['lessonplan_date']);
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$ogfilename=$_FILES['lessonplan_file']['name'];
		$file=time().'-'.$ogfilename;
		$status=mysqli_real_escape_string($this->connect,$_POST['lessonplan_status']);						
		$uploaded_by=$_SESSION['user_email'];
		$instime=time();  
         $uniq=mysqli_query($this->connect,"select * from `lessionplan` WHERE
		lp_date='$lp_date' AND class='$class' AND section='$section'  ");		
		$count=mysqli_num_rows($uniq);		
		if($count>0)
		{
			return "<h2 style='color:rgb(244, 54, 61);'>Lesson Plan Alredy Uploaded</h2>";
		}
		else
		{		
		$in_cate=mysqli_query($this->connect,"INSERT INTO `lessionplan`(
		`lp_date`, `class`, `section`, `file`, `status`, `uploaded_by`,
		`intime`, `uplod_time`) VALUES ('$lp_date','$class','$section',
		'$file','$status','$uploaded_by','$instime','$instime')");
		move_uploaded_file($_FILES['lessonplan_file']['tmp_name'],'../common/lessonplan/'.$file);
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
	function allLessonPlan()
	{
		$get_all=mysqli_query($this->connect,"select * from `lessionplan`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function deltLessonPlan()
	{
		$id=$_POST['lessionPlanId'];
		$del=mysqli_query($this->connect,"DELETE FROM `lessionplan` WHERE `file`='$id' ");		
		 unlink('../common/lessonplan/'.$id);
		
	}
		public function downloadLessonPlan($id)
	{
		
		$fname=$id;		
		header('Content-Description:FileTransfer');
		header('Content-Type:application/octet-stream');		
		header('Content-Disposition:attachment;filename='.basename('../common/lessonplan/'."$fname"));
		header('Expires:0');
		header('Cache-Control:must-revalidate');
		header('Pragma:public');
		header('Content-aLength:'.filesize('../common/lessonplan/'."$fname"));
		ob_clean();
		flush();
		readfile('../common/lessonplan/'."$fname");
		exit;				
		
	}
    //Function End for Lesson Plan 
      //Function Start for Monthly Calendar     
	function uploadMontlyClndr()
	{
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$ogfilename=$_FILES['montlyClndr_file']['name'];
		$file=time().'-'.$ogfilename;
		$status=mysqli_real_escape_string($this->connect,$_POST['montlyClndr_status']);						
		$uploaded_by=$_SESSION['user_email'];
		$instime=time();  
         $uniq=mysqli_query($this->connect,"select * from `monthly_clndr` WHERE
		MONTH(FROM_UNIXTIME(intime)) = MONTH(CURDATE()) AND class='$class' AND section='$section'  ");		
		$count=mysqli_num_rows($uniq);		
		if($count>0)
		{
			return "<h2 style='color:rgb(244, 54, 61);'>Monthly Calendar Alredy Uploaded</h2>";
		}
		else
		{		
		$in_cate=mysqli_query($this->connect,"INSERT INTO `monthly_clndr`(
		`class`, `section`, `file`, `status`, `uploaded_by`,
		`intime`, `uplod_time`) VALUES ('$class','$section',
		'$file','$status','$uploaded_by','$instime','$instime')");
		move_uploaded_file($_FILES['montlyClndr_file']['tmp_name'],'../common/monthlyclndr/'.$file);
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
	function allMontlyClndr()
	{
		$get_all=mysqli_query($this->connect,"select * from `monthly_clndr`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
		public function downloadMontlyClndr($id)
	{
		
		$fname=$id;		
		header('Content-Description:FileTransfer');
		header('Content-Type:application/octet-stream');		
		header('Content-Disposition:attachment;filename='.basename('../common/lessonplan/'."$fname"));
		header('Expires:0');
		header('Cache-Control:must-revalidate');
		header('Pragma:public');
		header('Content-aLength:'.filesize('../common/lessonplan/'."$fname"));
		ob_clean();
		flush();
		readfile('../common/lessonplan/'."$fname");
		exit;				
		
	}
    //Function End for Monthly Calendar  	
	//Function Start for Exam Report Card  
	function uploadExamReportCard()
	{
		$erc_date=mysqli_real_escape_string($this->connect,$_POST['erc_date']);
		$class=mysqli_real_escape_string($this->connect,$_POST['class']);
		$section=mysqli_real_escape_string($this->connect,$_POST['section']);
		$ogfilename=$_FILES['erc_file']['name'];
		$file=time().'-'.$ogfilename;
		$status=mysqli_real_escape_string($this->connect,$_POST['erc_status']);						
		$uploaded_by=$_SESSION['user_email'];
		$instime=time();  
         $uniq=mysqli_query($this->connect,"select * from `examreportcard` WHERE
		erc_date='$erc_date' AND class='$class' AND section='$section'  ");		
		$count=mysqli_num_rows($uniq);		
		if($count>0)
		{
			return "<h2 style='color:rgb(244, 54, 61);'>Exam Report Card Alredy Uploaded</h2>";
		}
		else
		{		
		$in_cate=mysqli_query($this->connect,"INSERT INTO `examreportcard`(
		`erc_date`, `class`, `section`, `file`, `status`, `uploaded_by`,
		`intime`, `uplod_time`) VALUES ('$erc_date','$class','$section',
		'$file','$status','$uploaded_by','$instime','$instime')");
		move_uploaded_file($_FILES['erc_file']['tmp_name'],'../common/examreportcard/'.$file);
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
	function allExamReportCard()
	{
		$get_all=mysqli_query($this->connect,"select * from `examreportcard`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
		public function downloadExamReportCard($id)
	{
		
		$fname=$id;		
		header('Content-Description:FileTransfer');
		header('Content-Type:application/octet-stream');		
		header('Content-Disposition:attachment;filename='.basename('../common/examreportcard/'."$fname"));
		header('Expires:0');
		header('Cache-Control:must-revalidate');
		header('Pragma:public');
		header('Content-aLength:'.filesize('../common/examreportcard/'."$fname"));
		ob_clean();
		flush();
		readfile('../common/examreportcard/'."$fname");
		exit;				
		
	}
    //Function End for Exam Report Card

    //Function Start for Frontend Control panel 

     //Function Start for Frontend Slider Image 
     
        function addFrontndSliderImage()
	{
		
		$ogfilename=$_FILES['slidr_imgnm']['name'];
		$file=time().'-'.$ogfilename;
		$fileType=$_FILES['slidr_imgnm']['type'];
		$fileTmpNmae=$_FILES['slidr_imgnm']['tmp_name'];
		$fileSize=getimagesize($fileTmpNmae);
		$imageWidth=$fileSize[0];
		$imageHeight=$fileSize[1];
		$status=mysqli_real_escape_string($this->connect,$_POST['fsi_status']);						
		$uploaded_by=$_SESSION['user_email'];
		$instime=time();
        $validFileType=array('image/png','image/jpg','image/jpeg'); 
        if($imageWidth==1920 && $imageHeight==750)
        {      
        if(in_array($fileType,$validFileType))
        {
		$in_cate=mysqli_query($this->connect,"INSERT INTO `frontnd_slider`(`image_name`, `created_by`, `status`, `intime`, `updatetime`) 
			VALUES ('$file','$uploaded_by','$status','$instime','$instime')");
		move_uploaded_file($_FILES['slidr_imgnm']['tmp_name'],'../frontend/extra-images/slider/'.$file);
		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Uploaded</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
	    }	    
	    else
	    {
	    	return "<h3 style='color:red;'>File type not valid</h3>";
	    }
	    }
	    else
	    {
	    	return "<h5 style='color:red;'>Image dimension 1920px * 750px & Image format PNG,JPG,JPEG are allowed</h5>";
	    }
		
		
	}

	function findAllSliderImgs()
	{
		$get_all=mysqli_query($this->connect,"select * from `frontnd_slider` ORDER BY id DESC");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	
	function deltFrntSlidrImage()
	{
		$id=$_POST['fsi_id'];
		$del=mysqli_query($this->connect,"DELETE FROM `frontnd_slider` WHERE image_name='$id' ");
		 unlink('../frontend/extra-images/slider/'.$id);
		
	}
    //Function start for Frontend Slider Image
    //Function Start for Frontend Image Gallery
	 function addFrontndGalleryImage()
	{
		
		$ogfilename=$_FILES['gallery_imgnm']['name'];
		$file=time().'-'.$ogfilename;
		$fileType=$_FILES['gallery_imgnm']['type'];
		$fileTmpNmae=$_FILES['gallery_imgnm']['tmp_name'];
		$fileSize=getimagesize($fileTmpNmae);
		$imageWidth=$fileSize[0];
		$imageHeight=$fileSize[1];
		$status=mysqli_real_escape_string($this->connect,$_POST['sgi_status']);						
		$uploaded_by=$_SESSION['user_email'];
		$instime=time();
        $validFileType=array('image/png','image/jpg','image/jpeg'); 
        if($imageWidth==320 && $imageHeight==320)
        {      
        if(in_array($fileType,$validFileType))
        {
		$in_cate=mysqli_query($this->connect,"INSERT INTO `site_gallery`(`galry_imagenm`, `created_by`, `status`, `intime`, `uptime`) 
			VALUES ('$file','$uploaded_by','$status','$instime','$instime')");
		move_uploaded_file($_FILES['gallery_imgnm']['tmp_name'],'../frontend/extra-images/gallery/'.$file);
		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Uploaded</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
	    }	    
	    else
	    {
	    	return "<h3 style='color:red;'>File type not valid</h3>";
	    }
	    }
	    else
	    {
	    	return "<h3 style='color:red;'>File Size Should(320*320) & Type Should be (PNG,JPG,JPEG)</h3>";
	    }
		
		
	}

	function findAllGalleryImgs()
	{
		$get_all=mysqli_query($this->connect,"select * from `site_gallery`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}

	function deltFrntGalleryImage()
	{
		$id=$_POST['galleryImg_id'];
		$del=mysqli_query($this->connect,"DELETE FROM `site_gallery` WHERE galry_imagenm='$id' ");
		 unlink('../frontend/extra-images/gallery/'.$id);
		
	}

      //Function End for Image Gallery

	//Function Student for What Parents Says

	function addParentsWords()
	{
		
		$ogfilename=$_FILES['parent_image']['name'];
		$file=time().'-'.$ogfilename;
		$fileType=$_FILES['parent_image']['type'];
		$fileTmpNmae=$_FILES['parent_image']['tmp_name'];
		$fileSize=getimagesize($fileTmpNmae);
		$imageWidth=$fileSize[0];
		$imageHeight=$fileSize[1];
		$parentName=mysqli_real_escape_string($this->connect,$_POST['parent_name']);
		$parentWords=mysqli_real_escape_string($this->connect,$_POST['parent_word']);
		$status=mysqli_real_escape_string($this->connect,$_POST['prtwrd_status']);						
		$uploaded_by=$_SESSION['user_email'];
		$instime=time();
        $validFileType=array('image/png','image/jpg','image/jpeg'); 
        if($imageWidth==98 && $imageHeight==100)
        {      
        if(in_array($fileType,$validFileType))
        {
		$in_cate=mysqli_query($this->connect,"INSERT INTO `parents_review`(`parent_name`, `parent_image`, `parent_words`, `created_by`, `status`, `intime`, `uptime`) VALUES ('$parentName','$file','$parentWords','$uploaded_by','$status','$instime','$instime')");
		move_uploaded_file($_FILES['parent_image']['tmp_name'],'../frontend/extra-images/parents/'.$file);
		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Uploaded</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
	    }	    
	    else
	    {
	    	return "<h3 style='color:red;'>File type not valid</h3>";
	    }
	    }
	    else
	    {
	    	return "<h3 style='color:red;'>File Size Should(320*320) & Type Should be (PNG,JPG,JPEG)</h3>";
	    }
		
		
	}

	function allParentsWords()
	{
		$get_all=mysqli_query($this->connect,"select * from `parents_review`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}

	function deltParentWords()
	{
		$id=$_POST['parentword_id'];
		$del=mysqli_query($this->connect,"DELETE FROM `parents_review` WHERE parent_image='$id' ");	
		 unlink('../frontend/extra-images/parents/'.$id);	
		
	}

	//Function End for What Parents Says

	//Function Start for Notices Board

	   function addNotice()
	{
		
		$noticeIsueDate=mysqli_real_escape_string($this->connect,$_POST['notcisu_date']);
		$noticeSubject=mysqli_real_escape_string($this->connect,$_POST['notc_subjct']);
		$noticeDesc=mysqli_real_escape_string($this->connect,$_POST['editor']);
		$noticeStatus=mysqli_real_escape_string($this->connect,$_POST['notce_status']);						
		$uploaded_by=$_SESSION['user_email'];
		$instime=time();
        
		$in_cate=mysqli_query($this->connect,"INSERT INTO `site_noticeboard`(`dateof_issue`, `subjectof_notice`, `notice_description`, `created_by`, `status`, `Intime`, `uptime`) VALUES ('$noticeIsueDate','$noticeSubject','$noticeDesc','$uploaded_by','$noticeStatus','$instime','$instime')");		
		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Submitted</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}		
	}
	function allNoticeBoard()
	{
		$get_all=mysqli_query($this->connect,"select * from `site_noticeboard`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function allNoticeBoardForAdmDshBord()
	{
		$get_all=mysqli_query($this->connect,"select * from `site_noticeboard` WHERE status='1' LIMIT 4 ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
	function deltNotice()
	{
		$id=$_POST['notice_id'];
		$del=mysqli_query($this->connect,"DELETE FROM `site_noticeboard` WHERE id='$id' ");		
		
	}

	//Function End for Notices Board
	//Function Start for Events
     function addEventBanner()
	{
		
		$ogfilename=$_FILES['banner_image']['name'];
		$file=time().'-'.$ogfilename;
		$fileType=$_FILES['banner_image']['type'];
		$fileTmpNmae=$_FILES['banner_image']['tmp_name'];
		$fileSize=getimagesize($fileTmpNmae);
		$imageWidth=$fileSize[0];
		$imageHeight=$fileSize[1];
		$event_date=mysqli_real_escape_string($this->connect,$_POST['event_date']);
		$event_title=mysqli_real_escape_string($this->connect,$_POST['event_title']);
		$event_topic=mysqli_real_escape_string($this->connect,$_POST['event_topic']);
		$event_brief=mysqli_real_escape_string($this->connect,$_POST['brief_about_event']);
		$status=mysqli_real_escape_string($this->connect,$_POST['evbn_status']);						
		$uploaded_by=$_SESSION['user_email'];
		$instime=time();
        $validFileType=array('image/png','image/jpg','image/jpeg'); 
        if($imageWidth==555 && $imageHeight==250)
        {      
        if(in_array($fileType,$validFileType))
        {
		$in_cate=mysqli_query($this->connect,"INSERT INTO `event_banner`(`event_date`,`event_title`,`event_topic`, `event_brief`, `banner_image`, `evnt_multipl_image`,`created_by`, `status`, `in_time`,
		 `up_time`) VALUES ('$event_date','$event_title','$event_topic','$event_brief','$file','','$uploaded_by','$status','$instime','$instime')");
		move_uploaded_file($_FILES['banner_image']['tmp_name'],'../frontend/extra-images/events/'.$file);
		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Uploaded</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
	    }	    
	    else
	    {
	    	return "<h3 style='color:red;'>File type not valid</h3>";
	    }
	    }
	    else
	    {
	    	return "<h3 style='color:red;'>Image Dimension Should be- (555*250) & Type Should be (PNG,JPG,JPEG)</h3>";
	    }		
	}
	 function updateEventBanner($bnrId)
	{
		
		$ogfilename=$_FILES['banner_image']['name'];		
		$event_date=mysqli_real_escape_string($this->connect,$_POST['event_date']);
		$event_title=mysqli_real_escape_string($this->connect,$_POST['event_title']);
		$event_topic=mysqli_real_escape_string($this->connect,$_POST['event_topic']);
		$event_brief=mysqli_real_escape_string($this->connect,$_POST['brief_about_event']);
		$status=mysqli_real_escape_string($this->connect,$_POST['evbn_status']);						
		$uploaded_by=$_SESSION['user_email'];
		$instime=time();
		$singlEvntDtls=$this->singelEventsBanner($bnrId);
		if($ogfilename =='')
		{
         $file=$singlEvntDtls['banner_image']; 	
		 $in_cate=mysqli_query($this->connect,"UPDATE `event_banner` SET `event_date`='$event_date',`event_title`='$event_title',`event_topic`='$event_topic',`event_brief`='$event_brief',`banner_image`='$file',`created_by`='$uploaded_by',`status`='$status',`up_time`='$instime' WHERE id='$bnrId' ");
		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Uploaded</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
		if($ogfilename !='')
		{
		$fileType=$_FILES['banner_image']['type'];
		$fileTmpNmae=$_FILES['banner_image']['tmp_name'];
		$fileSize=getimagesize($fileTmpNmae);
		$imageWidth=$fileSize[0];
		$imageHeight=$fileSize[1];	
        $validFileType=array('image/png','image/jpg','image/jpeg'); 
        if($imageWidth==555 && $imageHeight==250)
        {      
        if(in_array($fileType,$validFileType))
        {  
         unlink('../frontend/extra-images/events/'.$singlEvntDtls['banner_image']);
        $file=time().'-'.$ogfilename; 	
		$in_cate=mysqli_query($this->connect,"UPDATE `event_banner` SET `event_date`='$event_date',`event_title`='$event_title',`event_topic`='$event_topic',`event_brief`='$event_brief',`banner_image`='$file',`created_by`='$uploaded_by',`status`='$status',`up_time`='$instime' WHERE id='$bnrId' ");
		move_uploaded_file($_FILES['banner_image']['tmp_name'],'../frontend/extra-images/events/'.$file);

		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Uploaded</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
	    }	    
	    else
	    {
	    	return "<h3 style='color:red;'>File type not valid</h3>";
	    }
	    }
	    else
	    {
	    	return "<h3 style='color:red;'>Image Dimension Should be- (555*250) & Type Should be (PNG,JPG,JPEG)</h3>";
	    }	
	    }	
	}
	function allEventsBanner()
	{
		$get_all=mysqli_query($this->connect,"select * from `event_banner`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;		
	}
	function singelEventsBanner($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `event_banner` 
        where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	 function addEventMultiplImage()
	{
	
		$id=mysqli_real_escape_string($this->connect,$_POST['id']);	
		foreach ( $_FILES['image']['tmp_name'] as $key => $val ) {

		$fileName = $_FILES['image']['name'][$key];
		$fileSize = $_FILES['image']['size'][$key];   
		$fileTemp = $_FILES['image']['tmp_name'][$key]; 
		$unqFilNm=time().strtolower($fileName); 
		$fileNameAry[]=$unqFilNm;
		$commaSeparated = implode(',' , (array)$fileNameAry);
		$uptime=time();
		move_uploaded_file($fileTemp,'../frontend/extra-images/events/'.$unqFilNm);

		}
		$getMultiImgString=$this->allEventsMultiplImgs($id);	
		if($getMultiImgString['evnt_multipl_image'] !='')
		{
		  $commaSeparated=$getMultiImgString['evnt_multipl_image'].','.$commaSeparated;
		}
		if($getMultiImgString['evnt_multipl_image'] =='')
		{
		  $commaSeparated=$commaSeparated;
		}
		$updtEvtMuImg=mysqli_query($this->connect,"UPDATE `event_banner` SET `evnt_multipl_image`='$commaSeparated',`up_time`='$uptime' WHERE `id`='$id' ");
		if($updtEvtMuImg)
			{
				$encodId=base64_encode($id);
				 echo "
		            <script type=\"text/javascript\">           
			         window.location='view_eventmultipl_imgs?bnr_id=$encodId';
		            </script>
		             ";		
			}
			else
			{
				return mysqli_error($this->connect); 
			}
   }		
    function allEventsMultiplImgs($id)
	{
		$get_single=mysqli_query($this->connect,"select * from `event_banner` WHERE `id`='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
	}
	function deltEventMultiImages($evntId,$imgName)
	{
		
		$getMultiImgString=$this->allEventsMultiplImgs($evntId);	
		$imageNameString=$getMultiImgString['evnt_multipl_image'];
        list($a, $b) = explode($imgName, $imageNameString);
        if($b=='')
		{
		   $imgNameCom=','.$imgName;
		}		
		if($b!='')
		{
		   $imgNameCom=$imgName.',';
		}
		if($a==''&&$b=='')
		{
          $imageNameString='';
		}
		$modifyImagestr=str_replace($imgNameCom,"",$imageNameString);
		$uptime=time();
		$deltImge=mysqli_query($this->connect,"UPDATE `event_banner` SET `evnt_multipl_image`='$modifyImagestr',`up_time`='$uptime' WHERE `id`='$evntId' ");
		unlink('../frontend/extra-images/events/'.$imgName);		
	}
	function deltEvent()
	{
		$id=$_POST['event_id'];
		$getMultiImgString=$this->allEventsMultiplImgs($id);
		$multiplImgString=$getMultiImgString['evnt_multipl_image']; 
        if($multiplImgString !='')
        {
		 $temp = explode(',',$multiplImgString);
	      foreach($temp as $image){
            unlink('../frontend/extra-images/events/'.$image);
	      }
	     } 
	    unlink('../frontend/extra-images/events/'.$getMultiImgString['banner_image']);	
		$del=mysqli_query($this->connect,"DELETE FROM `event_banner` WHERE id='$id' ");		
		
	}
	//Function End for Events
	//Function Start for Co-curricular
       function addCoCurricular()
	{
		
		$ogfilename=$_FILES['co-curricular_image']['name'];
		$file=time().'-'.$ogfilename;
		$fileType=$_FILES['co-curricular_image']['type'];
		$fileTmpNmae=$_FILES['co-curricular_image']['tmp_name'];
		$fileSize=getimagesize($fileTmpNmae);
		$imageWidth=$fileSize[0];
		$imageHeight=$fileSize[1];
		$co_curricular_date=mysqli_real_escape_string($this->connect,$_POST['co-curricular_date']);
		$co_curricular_title=mysqli_real_escape_string($this->connect,$_POST['co-curricular_title']);
		$co_curricular_topic=mysqli_real_escape_string($this->connect,$_POST['co-curricular_topic']);
		$co_curricular_brief=mysqli_real_escape_string($this->connect,$_POST['brief_about_co-curricular']);
		$status=mysqli_real_escape_string($this->connect,$_POST['co-curricular_status']);						
		$created_by=$_SESSION['user_email'];
		$instime=time();
        $validFileType=array('image/png','image/jpg','image/jpeg'); 
        if($imageWidth==555 && $imageHeight==250)
        {      
        if(in_array($fileType,$validFileType))
        {
		$in_cate=mysqli_query($this->connect,"INSERT INTO `add_co-curricular`(`co_curricular_date`, `co_curricular_title`, `co_curricular_topic`, `co_curricular_brief`, `co_curricular_img`, `co_curricular_multpl_img`, `created_by`, `status`, `in_time`, `up_time`) VALUES ('$co_curricular_date','$co_curricular_title','$co_curricular_topic','$co_curricular_brief','$file','','$created_by','$status','$instime','$instime')");
		move_uploaded_file($_FILES['co-curricular_image']['tmp_name'],'../frontend/extra-images/co-curricular/'.$file);
		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Uploaded</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
	    }	    
	    else
	    {
	    	return "<h3 style='color:red;'>File type not valid</h3>";
	    }
	    }
	    else
	    {
	    	return "<h3 style='color:red;'>Image Dimension Should be- (555*250) & Type Should be (PNG,JPG,JPEG)</h3>";
	    }		
	}
	function allCoCurricular()
	{
		$get_all=mysqli_query($this->connect,"select * from `add_co-curricular`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;		
	}
	function singelCoCurricular($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `add_co-curricular` 
        where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function addCoCurriMultiplImage($id)
	{			
	   foreach ( $_FILES['image']['tmp_name'] as $key => $val )
	   {
	    $fileName = $_FILES['image']['name'][$key];
	    $fileSize = $_FILES['image']['size'][$key];   
	    $fileTemp = $_FILES['image']['tmp_name'][$key]; 
	    $unqFilNm=time().strtolower($fileName); 
	    $fileNameAry[]=$unqFilNm;
	    $commaSeparated = implode(',' , (array)$fileNameAry);
	    $uptime=time();
	    move_uploaded_file($fileTemp,'../frontend/extra-images/co-curricular/'.$unqFilNm);
	   
	   }
	   $getMultiImgString=$this->singelCoCurricular($id);	
	   if($getMultiImgString['co_curricular_multpl_img'] !='')
	   {
	      $commaSeparated=$getMultiImgString['co_curricular_multpl_img'].','.$commaSeparated;
	   }
	   if($getMultiImgString['co_curricular_multpl_img'] =='')
	   {
	      $commaSeparated=$commaSeparated;
	   }
	   $updtEvtMuImg=mysqli_query($this->connect,"UPDATE `add_co-curricular` SET `co_curricular_multpl_img`='$commaSeparated',`up_time`='$uptime' WHERE `id`='$id' ");
	    if($updtEvtMuImg)
		{
			$encodId=base64_encode($id);
			 echo "
	            <script type=\"text/javascript\">           
		         window.location='view_cocuricumultipl_imgs?cocur_id=$encodId';
	            </script>
	             ";		
		}
		else
		{
			return mysqli_error($this->connect); 
		}
   } 
   function deltCoCurricuMultiImages($coCurricuId,$imgName)
	{
		
		$getMultiImgString=$this->singelCoCurricular($coCurricuId);	
		$imageNameString=$getMultiImgString['co_curricular_multpl_img'];
        list($a, $b) = explode($imgName, $imageNameString);
        if($b=='')
		{
		   $imgNameCom=','.$imgName;
		}		
		if($b!='')
		{
		   $imgNameCom=$imgName.',';
		}
		if($a==''&&$b=='')
		{
          $imageNameString='';
		}
		$modifyImagestr=str_replace($imgNameCom,"",$imageNameString);
		$uptime=time();
		$deltImge=mysqli_query($this->connect,"UPDATE `add_co-curricular` SET `co_curricular_multpl_img`='$modifyImagestr',`up_time`='$uptime' WHERE `id`='$coCurricuId' ");
		unlink('../frontend/extra-images/co-curricular/'.$imgName);		
	} 
	function deltCoCurricu()
	{
		$id=$_POST['co_curricular_id'];
		$getMultiImgString=$this->singelCoCurricular($id);
		$multiplImgString=$getMultiImgString['co_curricular_multpl_img']; 
        if($multiplImgString !='')
        {
		 $temp = explode(',',$multiplImgString);
	      foreach($temp as $image){
            unlink('../frontend/extra-images/co-curricular/'.$image);
	      }
	     } 
	     unlink('../frontend/extra-images/co-curricular/'.$getMultiImgString['co_curricular_img']);		
		$del=mysqli_query($this->connect,"DELETE FROM `add_co-curricular` WHERE id='$id' ");		
		
	} 
	 function updateCoCurriculr($cocurId)
	{
		
		$ogfilename=$_FILES['cocuriculr_image']['name'];		
		$co_curricular_date=mysqli_real_escape_string($this->connect,$_POST['cocuriculr_date']);
		$co_curricular_title=mysqli_real_escape_string($this->connect,$_POST['cocuriculr_title']);
		$co_curricular_topic=mysqli_real_escape_string($this->connect,$_POST['cocuriculr_topic']);
		$co_curricular_brief=mysqli_real_escape_string($this->connect,$_POST['brief_about_cocuriculr']);
		$status=mysqli_real_escape_string($this->connect,$_POST['cocuricu_status']);						
		$uploaded_by=$_SESSION['user_email'];
		$instime=time();
		$singlCoCurricular=$this->singelCoCurricular($cocurId);
		if($ogfilename =='')
		{
         $file=$singlCoCurricular['co_curricular_img']; 	
		 $in_cate=mysqli_query($this->connect,"UPDATE `add_co-curricular` SET `co_curricular_date`='$co_curricular_date',`co_curricular_title`='$co_curricular_title',`co_curricular_topic`='$co_curricular_topic',`co_curricular_brief`='$co_curricular_brief',`co_curricular_img`='$file',`created_by`='$uploaded_by',`status`='$status',`up_time`='$instime' WHERE id='$cocurId' ");
		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Uploaded</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
		if($ogfilename !='')
		{
		$fileType=$_FILES['cocuriculr_image']['type'];
		$fileTmpNmae=$_FILES['cocuriculr_image']['tmp_name'];
		$fileSize=getimagesize($fileTmpNmae);
		$imageWidth=$fileSize[0];
		$imageHeight=$fileSize[1];	
        $validFileType=array('image/png','image/jpg','image/jpeg'); 
        if($imageWidth==555 && $imageHeight==250)
        {      
        if(in_array($fileType,$validFileType))
        {  
         unlink('../frontend/extra-images/co-curricular/'.$singlCoCurricular['co_curricular_img']);
        $file=time().'-'.$ogfilename; 	
		$in_cate=mysqli_query($this->connect,"UPDATE `add_co-curricular` SET `co_curricular_date`='$co_curricular_date',`co_curricular_title`='$co_curricular_title',`co_curricular_topic`='$co_curricular_topic',`co_curricular_brief`='$co_curricular_brief',`co_curricular_img`='$file',`created_by`='$uploaded_by',`status`='$status',`up_time`='$instime' WHERE id='$cocurId' ");
		move_uploaded_file($_FILES['cocuriculr_image']['tmp_name'],'../frontend/extra-images/co-curricular/'.$file);

		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Uploaded</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
	    }	    
	    else
	    {
	    	return "<h3 style='color:red;'>File type not valid</h3>";
	    }
	    }
	    else
	    {
	    	return "<h3 style='color:red;'>Image Dimension Should be- (555*250) & Type Should be (PNG,JPG,JPEG)</h3>";
	    }	
	    }	
	}
	//Function End for Co-curricular
	//Function Start for Games & Sports
	 function addGamesNSports()
	{
		
		$ogfilename=$_FILES['gamesnsports_image']['name'];
		$file=time().'-'.$ogfilename;
		$fileType=$_FILES['gamesnsports_image']['type'];
		$fileTmpNmae=$_FILES['gamesnsports_image']['tmp_name'];
		$fileSize=getimagesize($fileTmpNmae);
		$imageWidth=$fileSize[0];
		$imageHeight=$fileSize[1];
		$gmsnsport_date=mysqli_real_escape_string($this->connect,$_POST['gamesnsports_date']);
		$gmsnsport_title=mysqli_real_escape_string($this->connect,$_POST['gamesnsports_title']);
		$gmsnsport_topic=mysqli_real_escape_string($this->connect,$_POST['gamesnsports_topic']);
		$gmsnsport_breif=mysqli_real_escape_string($this->connect,$_POST['brief_about_gamesnsports']);
		$status=mysqli_real_escape_string($this->connect,$_POST['gamesnsports_status']);						
		$created_by=$_SESSION['user_email'];
		$instime=time();
        $validFileType=array('image/png','image/jpg','image/jpeg'); 
        if($imageWidth==555 && $imageHeight==250)
        {      
        if(in_array($fileType,$validFileType))
        {
		$in_cate=mysqli_query($this->connect,"INSERT INTO `gamsnsports`(`gmsnsport_date`, `gmsnsport_title`, `gmsnsport_topic`, `gmsnsport_breif`, `gmsnsport_img`,`gmsnsport_multi_img`, `created_by`, `status`, `in_time`, `up_time`) VALUES ('$gmsnsport_date','$gmsnsport_title','$gmsnsport_topic','$gmsnsport_breif','$file','','$created_by','$status','$instime','$instime')");
		move_uploaded_file($_FILES['gamesnsports_image']['tmp_name'],'../frontend/extra-images/games_sports/'.$file);
		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Uploaded</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
	    }	    
	    else
	    {
	    	return "<h3 style='color:red;'>File type not valid</h3>";
	    }
	    }
	    else
	    {
	    	return "<h3 style='color:red;'>Image Dimension Should be- (555*250) & Type Should be (PNG,JPG,JPEG)</h3>";
	    }		
	}
	function allGamesNSports()
	{
		$get_all=mysqli_query($this->connect,"select * from `gamsnsports`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;		
	}
	function singelGamesNSports($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `gamsnsports` 
        where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function addGNSMultiplImage($id)
	{			
	   foreach ( $_FILES['image']['tmp_name'] as $key => $val )
	   {
	    $fileName = $_FILES['image']['name'][$key];
	    $fileSize = $_FILES['image']['size'][$key];   
	    $fileTemp = $_FILES['image']['tmp_name'][$key]; 
	    $unqFilNm=time().strtolower($fileName); 
	    $fileNameAry[]=$unqFilNm;
	    $commaSeparated = implode(',' , (array)$fileNameAry);
	    $uptime=time();
	    move_uploaded_file($fileTemp,'../frontend/extra-images/games_sports/'.$unqFilNm);
	   
	   }
	   $getMultiImgString=$this->singelGamesNSports($id);	
	   if($getMultiImgString['gmsnsport_multi_img'] !='')
	   {
	      $commaSeparated=$getMultiImgString['gmsnsport_multi_img'].','.$commaSeparated;
	   }
	   if($getMultiImgString['gmsnsport_multi_img'] =='')
	   {
	      $commaSeparated=$commaSeparated;
	   }
	   $updtEvtMuImg=mysqli_query($this->connect,"UPDATE `gamsnsports` SET `gmsnsport_multi_img`='$commaSeparated',`up_time`='$uptime' WHERE `id`='$id' ");
	    if($updtEvtMuImg)
		{
			$encodId=base64_encode($id);
			 echo "
	            <script type=\"text/javascript\">           
		         window.location='view_gnsmultipl_imgs?gns_id=$encodId';
	            </script>
	             ";		
		}
		else
		{
			return mysqli_error($this->connect); 
		}
   } 
    function deltMultiGmsNSprt($gmsNSprtsId,$imgName)
	{
		
		$getMultiImgString=$this->singelGamesNSports($gmsNSprtsId);	
		$imageNameString=$getMultiImgString['gmsnsport_multi_img'];
        list($a, $b) = explode($imgName, $imageNameString);
        if($b=='')
		{
		   $imgNameCom=','.$imgName;
		}		
		if($b!='')
		{
		   $imgNameCom=$imgName.',';
		}
		if($a==''&&$b=='')
		{
          $imageNameString='';
		}
		$modifyImagestr=str_replace($imgNameCom,"",$imageNameString);
		$uptime=time();
		$deltImge=mysqli_query($this->connect,"UPDATE `gamsnsports` SET `gmsnsport_multi_img`='$modifyImagestr',`up_time`='$uptime' WHERE `id`='$gmsNSprtsId' ");
		unlink('../frontend/extra-images/games_sports/'.$imgName);		
	} 
	 function updateGmsNSprt($gmsNSprtId)
	{
		
		$ogfilename=$_FILES['gmsnsprt_image']['name'];		
		$gmsnsport_date=mysqli_real_escape_string($this->connect,$_POST['gmsnsprt_date']);
		$gmsnsport_title=mysqli_real_escape_string($this->connect,$_POST['gmsnsprt_title']);
		$gmsnsport_topic=mysqli_real_escape_string($this->connect,$_POST['gmsnsprt_topic']);
		$gmsnsport_breif=mysqli_real_escape_string($this->connect,$_POST['brief_about_gmsnsprt']);
		$status=mysqli_real_escape_string($this->connect,$_POST['gmsnsprt_status']);						
		$uploaded_by=$_SESSION['user_email'];
		$instime=time();
		$singlGamNSport=$this->singelGamesNSports($gmsNSprtId);
		if($ogfilename =='')
		{
         $file=$singlGamNSport['gmsnsport_img']; 	
		 $in_cate=mysqli_query($this->connect,"UPDATE `gamsnsports` SET `gmsnsport_date`='$gmsnsport_date',`gmsnsport_title`='$gmsnsport_title',`gmsnsport_topic`='$gmsnsport_topic',`gmsnsport_breif`='$gmsnsport_breif',`gmsnsport_img`='$file',`created_by`='$uploaded_by',`status`='$status',`in_time`='$instime',`up_time`='$instime' WHERE `id`='$gmsNSprtId'");
		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Uploaded</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
		}
		if($ogfilename !='')
		{
		$fileType=$_FILES['gmsnsprt_image']['type'];
		$fileTmpNmae=$_FILES['gmsnsprt_image']['tmp_name'];
		$fileSize=getimagesize($fileTmpNmae);
		$imageWidth=$fileSize[0];
		$imageHeight=$fileSize[1];	
        $validFileType=array('image/png','image/jpg','image/jpeg'); 
        if($imageWidth==555 && $imageHeight==250)
        {      
        if(in_array($fileType,$validFileType))
        {  
         unlink('../frontend/extra-images/games_sports/'.$singlGamNSport['gmsnsport_img']);
        $file=time().'-'.$ogfilename; 	
		$in_cate=mysqli_query($this->connect,"UPDATE `gamsnsports` SET `gmsnsport_date`='$gmsnsport_date',`gmsnsport_title`='$gmsnsport_title',`gmsnsport_topic`='$gmsnsport_topic',`gmsnsport_breif`='$gmsnsport_breif',`gmsnsport_img`='$file',`created_by`='$uploaded_by',`status`='$status',`in_time`='$instime',`up_time`='$instime' WHERE `id`='$gmsNSprtId'");
		move_uploaded_file($_FILES['gmsnsprt_image']['tmp_name'],'../frontend/extra-images/games_sports/'.$file);

		if($in_cate)
		{
			return "<h3 style='color:green;'>Successfully Uploaded</h3>";
		}
		else
		{
			return mysqli_error($this->connect); 
		}
	    }	    
	    else
	    {
	    	return "<h3 style='color:red;'>File type not valid</h3>";
	    }
	    }
	    else
	    {
	    	return "<h3 style='color:red;'>Image Dimension Should be- (555*250) & Type Should be (PNG,JPG,JPEG)</h3>";
	    }	
	    }	
	}
	function deltGmsNSprt()
	{
		$id=$_POST['gmsnsport_id'];
		$getMultiImgString=$this->singelGamesNSports($id);
		$multiplImgString=$getMultiImgString['gmsnsport_multi_img']; 
        if($multiplImgString !='')
        {
		 $temp = explode(',',$multiplImgString);
	      foreach($temp as $image){
            unlink('../frontend/extra-images/games_sports/'.$image);
	      }
	     } 
	    unlink('../frontend/extra-images/games_sports/'.$getMultiImgString['gmsnsport_img']); 
		$del=mysqli_query($this->connect,"DELETE FROM `gamsnsports` WHERE id='$id' ");		
		
	} 
	//Function End for Games & Sports


    //Function End for Frontend Control panel
		
	
}
$object=new main();
?>