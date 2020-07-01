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
	function verifyAdmisnNo($admisnNumber)
	{		
		$get_single=mysqli_query($this->connect,"SELECT * FROM `student_registation` WHERE admission_number='$admisnNumber' ");
		$count=mysqli_num_rows($get_single);
		return $count; 		
	}

	function chekStudetLogin($admisnNumber,$fatherNumber)
	{		
		$get_single=mysqli_query($this->connect,"SELECT * FROM `student_registation` WHERE admission_number='$admisnNumber' AND father_mobile='$fatherNumber' ");
		$count=mysqli_num_rows($get_single);
		if($count==1)
		{
		   $chars = '0123456789';
           $otp=substr(str_shuffle($chars),0,6);
           $updtOtp=mysqli_query($this->connect,"UPDATE `student_registation` SET `otp`='$otp' WHERE admisn_year='$admisnNumber' ");
		}
		return $count; 		
		
	}

	function updateLoginOtp($admisnNumber)
	{		
		   $chars = '0123456789';
           $otp=substr(str_shuffle($chars),0,6);
           $updtOtp=mysqli_query($this->connect,"UPDATE `student_registation` SET `otp`='$otp' WHERE admission_number='$admisnNumber' ");
		   return $otp; 		
		
	}

	function chekLoginOtp($admisnNumber,$otp)
	{		
		$get_single=mysqli_query($this->connect,"SELECT * FROM `student_registation` WHERE admission_number='$admisnNumber' AND otp='$otp' ");
		$count=mysqli_num_rows($get_single);
		return $count; 		
	}
	function singleStuDetls($admisnNumber,$otp)
	{		
		$getStuDetls=mysqli_query($this->connect,"SELECT * FROM `student_registation` WHERE admission_number='$admisnNumber' AND otp='$otp' ");
		$fetch=mysqli_fetch_array($getStuDetls);
		return $fetch; 		
	}
	function resendOtp($admisnNumber)
	{		
		   $chars = '0123456789';
           $otp=substr(str_shuffle($chars),0,6);
           $updtOtp=mysqli_query($this->connect,"UPDATE `student_registation` SET `otp`='$otp' WHERE admission_number='$admisnNumber' ");
		   return $otp; 		
		
	}

	function allNotices()
	{			
		$get_all=mysqli_query($this->connect,"SELECT dateof_issue,subjectof_notice,notice_description FROM `site_noticeboard` WHERE status='1' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{		
			$container['noticemainKey'][]=array("dateKey"=>$fetch['dateof_issue'],
				"subjectKey"=>$fetch['subjectof_notice'],"noticeKey"=>$fetch['notice_description']);			
		}
		return $container;	 		
	}

	function allClasses()
	{			
		$get_all=mysqli_query($this->connect,"SELECT id,class FROM `class` WHERE status='1' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container['classMainKey'][]=array("id"=>$fetch['id'],"class"=>$fetch['class']);
		}
		return $container;	 		
	}
	function allSection($clsId)
	{			
		$get_all=mysqli_query($this->connect,"SELECT id,section FROM `class_section` WHERE class='$clsId' AND status='1' ");
		$container=array();
		while($fetch=mysqli_fetch_assoc($get_all))
		{
			$container[]=$fetch;			 
		}
		return $container;	 		
	}
	//Start Attandance
	function fndAlStuByCrCls($cls,$sec)
	{
		$curntYear=date("Y");
		$get_all=mysqli_query($this->connect,"select * from `class_upgrading`
		WHERE class='$cls' AND section='$sec' AND year='$curntYear'
		ORDER BY roll_no ASC ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}	 
	function singeRollNumber($slNo,$admisYr)
	{		
		$get_single=mysqli_query($this->connect,"select * from `class_upgrading` 
        where admission_number='$slNo' AND year='$admisYr' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function chkStuAttDate($cls,$sec)
	{
		$curntDate=date("Y-m-d");
		$get_all=mysqli_query($this->connect,"select * from `stu_attendance` WHERE `class`='$cls' AND
		`section`='$sec' AND DATE(date)='$curntDate' "); 		
		$coun=mysqli_num_rows($get_all);
		return $coun;	       	
	}
	function addProgrmdAtten($cls,$sec,$user)
	{
		$curntDate=date("Y-m-d");
		$created_by=$user;
		$instime=time();
		$curntYear=date("Y");
		if(date("m")>=4)
		{
			$curntYear=$curntYear;
		}
		if(date("m")<=4)
		{
			$curntYear=$curntYear-1;
		}
		
		$get_all=mysqli_query($this->connect,"select * from `class_upgrading`
		WHERE class='$cls' AND section='$sec' AND year='$curntYear'
       	ORDER BY roll_no ASC	");
		while($fetch=mysqli_fetch_array($get_all))
		{
			$stuId=$fetch['admission_number'];
			$chkStuStat=$this->singelStuInfo($stuId);
			if($chkStuStat['status']==1)
			{		
         $in_cate=mysqli_query($this->connect,"INSERT INTO `stu_attendance`(`class`, `section`, `st_id`, `attendance`, `date`, `created_by`, `inserted`, `update_on`) VALUES ('$cls','$sec','$stuId','0','$curntDate','$created_by','$instime','$instime')");
		}
		}		
	}
	function singelStuInfo($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `student_registation` 
        where admission_number='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
	function singelAtendncInfo($cls,$sec,$stuId)
	{		
		$curntDate=date("Y-m-d");;
		$get_single=mysqli_query($this->connect,"select * from `stu_attendance` 
        where class='$cls' AND section='$sec' AND st_id='$stuId' AND
		DATE(date)='$curntDate' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 	
	}
    function updtStuAtten($class,$section,$stuId,$attendance,$createdBy)
	{
		$curntDate=date("Y-m-d");		
		$instime=time();	 
		$up_atte=mysqli_query($this->connect,"UPDATE `stu_attendance` SET 
		`attendance`='$attendance',`created_by`='$createdBy',`update_on`='$instime'
		WHERE class='$class' AND section='$section' AND st_id='$stuId' AND DATE(date)='$curntDate' ");
		return mysqli_affected_rows($this->connect);
		
	}
	function smsChkOD($cls,$sec)
	{		
		$get_single=mysqli_query($this->connect,"select * from `smsrecords` 
        where class='$cls' AND sec='$sec' AND DATE(FROM_UNIXTIME(in_time)) = DATE(CURDATE()) ");
		$fetch_singel=mysqli_num_rows($get_single);
		return $fetch_singel; 	
	}
	//End Attandance


    //Function End for Frontend Control panel
		

}
$object=new main();
?>