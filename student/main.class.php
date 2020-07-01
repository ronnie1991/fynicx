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
	function login()
	{
		$user=mysqli_real_escape_string($this->connect,$_POST['user_id']);
		$rwPassword=mysqli_real_escape_string($this->connect,$_POST['password']);				
		$password=md5($rwPassword);				
		$login=mysqli_query($this->connect,"select * from `student_registation` where 
		user_id='$user' and password='$password' AND status='1' ");
		$rowcount=mysqli_num_rows($login);
		if($rowcount>0)
		{
		
		$fetch_singel=mysqli_fetch_array($login);		
		session_start();
		$_SESSION['user_id'] = $fetch_singel['user_id'];		
		$_SESSION['user_name'] = $fetch_singel['stu_full_nm'];
		
           echo "
            <script type=\"text/javascript\">           
		   window.location='dashboard';
            </script>
        ";		
		
		}
		else
		return"<span style='color: red'><b>Email Or Password is Incorrect</b></span>"; 
	}
	function logout()
	{		
		session_destroy();
	}
	//Function Start for Student Information	
	function studentInfo()
	{ 
	    $user=$_SESSION["user_id"];	
		$get_all=mysqli_query($this->connect,"select * from `student_registation`
        WHERE admission_number='$user' ");
		$fetch_singel=mysqli_fetch_array($get_all);
		return $fetch_singel;	 	
	}
	function studentCurntClass()
	{ 
	    $user=$_SESSION["user_id"];	
	    $curntYear=date("Y");
		if(date("m")>=3)
		{
			$curntYear=$curntYear;
		}
		if(date("m")<=3)
		{
			$curntYear=$curntYear-1;
		}		
		$get_all=mysqli_query($this->connect,"select * from `class_upgrading`
        WHERE admission_number='$user' AND year=$curntYear ");
		$fetch_singel=mysqli_fetch_array($get_all);
		return $fetch_singel;	 	
	}
	//Function End for Student Information
	
	//Function start for Attendance
	 function stuAtten()
	{	
        $user=$_SESSION["user_id"];			
		$get_all=mysqli_query($this->connect,"select * from `stu_attendance`
        WHERE st_id='$user' AND YEAR(FROM_UNIXTIME(inserted)) = YEAR(CURDATE()) ");
		$container=array(); 
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;	
	}
	//Function End for Attendance
	//Function start for Study Materials
	
	function findAllStudyMaterial()
	{
		$get_all=mysqli_query($this->connect,"select * from `study_materials`");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
		
	}
		public function downloadStudMate($id)
	{
		$sql=mysqli_query($this->connect,"select * from study_materials where id='$id'");
		$query=mysqli_fetch_array($sql);
		$fname=$query['study_file'];		
		header('Content-Description:FileTransfer');
		header('Content-Type:application/octet-stream');		
		header('Content-Disposition:attachment;filename='.basename('../images/studymaterials/'."$fname"));
		header('Expires:0');
		header('Cache-Control:must-revalidate');
		header('Pragma:public');
		header('Content-aLength:'.filesize('../images/studymaterials/'."$fname"));
		ob_clean();
		flush();
		readfile('../images/studymaterials/'."$fname");
		exit;				
		
	}
	
	//Function End for Study Materials	
	//Function Start for Class
     function singleClass($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `class` 
		where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
	}	
	//Function End for Class	
	//Function Start for Subject	
	  function singleSubject($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `subject` 
		where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
	}	
	
	//Function End for Subject	
	//Function Start for Class Time Table
     function singelClTT($id)
		{		
			$get_single=mysqli_query($this->connect,"select * from `class_tt` 
			where id='$id' ");
			$fetch_singel=mysqli_fetch_array($get_single);
			return $fetch_singel; 	
		}	
	//Function End for Class Time Table	
	//Function start for Result	
	function allResult()
	{		
	  $user=$_SESSION["user_id"];	
		$get_all=mysqli_query($this->connect,"select * from `student_result` 
		where student_id='$user' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;		
	}
	//Function End for Result	
	//Function Start for Exam Time Table
        function ajaxExmTt($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `exm_tt` 
		where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
	}	
	//Function End for Exam Time Table	
	//Function Start for Exam Type
     function ajaxExmType($id)
	{		
		$get_single=mysqli_query($this->connect,"select * from `exam_type` 
		where id='$id' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
	}
	//Function End for Exam Type	
	//Function Start for Holidays
   	function allHolidays()
	{		
		$get_all=mysqli_query($this->connect,"select * from `holidays` ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;		
	}
	//Function End for Holidays	
	//Function Start for General Admission Ledger
    function genrelAdmisChrges()
	{	
        $crc=$this->studentCurntClass();
		$class=$crc['class'];		
		$get_single=mysqli_query($this->connect,"select * from `general_admission_charges` 
		where class='$class' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
	}	
	function stuGenAdmLedger()
	{ 
	    $user=$_SESSION["user_id"];
        $crc=$this->studentCurntClass();
		$class=$crc['class'];
		$section=$crc['section'];	        	
		$get_all=mysqli_query($this->connect,"select * from `student_general_admission_charges`
        WHERE class='$class' AND section='$section' AND student_id='$user'  ");
		$fetch_singel=mysqli_fetch_array($get_all);
		return $fetch_singel;	 	
	}
	//Function End for General Admission Ledger
	//Function Start for Hostel Admission Charges
	function hostelAdmisChrges()
	{	
        $crc=$this->studentCurntClass();
		$class=$crc['class'];	
		$get_single=mysqli_query($this->connect,"select * from `hostel_admission_charges` 
		where class='$class' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
	}	
	 function hostelAdmissionLedger()
	{		
	    $user=$_SESSION["user_id"];
        $crc=$this->studentCurntClass();
		$class=$crc['class'];		
		$section=$crc['section'];	        
		$get_single=mysqli_query($this->connect,"select * from `student_hostel_admission_charges` 
		where class='$class' and section='$section' and student_id='$user' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
	}
	//Function End for Hostel Admission Charges	
	//Function Start for Re-Admission Charges
	function reAdmisChrges($year)
	{	
        $crc=$this->studentCurntClass();
		$class=$crc['class'];		
		$get_single=mysqli_query($this->connect,"select * from `general_re_admission_charges` 
		where year='$year' AND class='$class' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
	}	
	 function reAdmissionLedger()
	{		
	    $user=$_SESSION["user_id"];
        $crc=$this->studentCurntClass();
		$class=$crc['class'];		
		$section=$crc['section'];
		$get_all=mysqli_query($this->connect,"select * from `receive_stud_readmison_charges` 
		where class='$class' and section='$section' and student_id='$user' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;	
	}
	//Function End for Re-Admission Charges
    //Function Start for Hostel Fees Ledger
	function hostelFeesAdmin()
	{	
        $class=$_SESSION['class'];		
		$get_single=mysqli_query($this->connect,"select * from `hostel__fees` 
		where  class='$class' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
	}	
	 function hostelFeesLedgerStudent()
	{		
	    $user=$_SESSION["user_id"];
        $class=$_SESSION['class'];		
        $section=$_SESSION['section'];
        $curntYear=date('Y');		
		$get_all=mysqli_query($this->connect,"select * from `receive_student_hostel_fees` 
		where class='$class' and section='$section' and student_id='$user' AND payment_year='$curntYear' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
	}
	//Function End for Hostel Fees Ledger
	//Function Start for Other Anual Charges Ledger
	function othrAnulChrgsAdmin($particular)
	{	
        $crc=$this->studentCurntClass();
		$class=$crc['class'];       		
		$get_single=mysqli_query($this->connect,"select * from `other_annual_charges` 
		where  class='$class' AND id='$particular' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel;  		
	}	
	 function otherAnulChrgsLedgerStudent()
	{		
	    $user=$_SESSION["user_id"];
        $crc=$this->studentCurntClass();
		$class=$crc['class'];
		$section=$crc['section'];
        $curntYear=date('Y');		
		$get_all=mysqli_query($this->connect,"select * from `receive_stud_other_annual_charges` 
		where class='$class' and section='$section' and student_id='$user' AND year='$curntYear' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
	}
	//Function End for Other Anual Charges Ledger
	//Function Start for Session / Monthly Tution Fees
	 function monthlyFeesAdmin()
	{	
        $crc=$this->studentCurntClass();
		$class=$crc['class'];		
		$get_single=mysqli_query($this->connect,"select * from `tution_fees` 
		where  class='$class' ");
		$fetch_singel=mysqli_fetch_array($get_single);
		return $fetch_singel; 		
	}	
	 function monthlyFeesLedgerStudent()
	{		
	    $user=$_SESSION["user_id"];
        $crc=$this->studentCurntClass();
		$class=$crc['class'];
		$section=$crc['section'];
        $curntYear=date('Y');		
		$get_all=mysqli_query($this->connect,"select * from `recived_student_tution_fees` 
		where class='$class' and section='$section' and student_id='$user' AND payment_year='$curntYear' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;
	}  
	//Function End for Session / Monthly Tution Fees
	//Function Start for Hall Of Fame	
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
	//Function Start for Daily report
	function studailyFeedbk()
	{	
        $user=$_SESSION["user_id"];	
		$crc=$this->studentCurntClass();
		$class=$crc['class'];
		$get_all=mysqli_query($this->connect,"select * from `student_daily_feedback`
        WHERE student_roll='$user' AND class='$class' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;		
	}
	//Function End for Daily report
	//Function Start for Parents Meeting
	function pt_meetings_schedule()
	{	
        $crc=$this->studentCurntClass();
		$classId=$crc['class'];
		$get_all=mysqli_query($this->connect,"select * from `pt_meetings_schedule`
        WHERE  meeting_for='$classId' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;		
	}
	function pt_meetings_fedbk()
	{	
        $crc=$this->studentCurntClass();
		$classId=$crc['class'];	
		$get_all=mysqli_query($this->connect,"select * from `pt_meetings_feedback`
        WHERE  meeting_for='$classId' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;		
	}
	//Function End for Parents Meeting
	//Function Start for Class Diary
	function findAllClassDiary()
	{	
        $crc=$this->studentCurntClass();
		$classId=$crc['class'];
		$section=$crc['section'];
		$get_all=mysqli_query($this->connect,"select * from `class_diary`
        WHERE  class='$classId' AND section='$section' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;		
	}
	public function downloadClassDiary($id)
	{
		$sql=mysqli_query($this->connect,"select * from class_diary where id='$id'");
		$query=mysqli_fetch_array($sql);
		$fname=$query['file'];		
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
	//Function Start for Monthly Calendar
	function findAllMonthlyCalendar()
	{	
        $crc=$this->studentCurntClass();
		$classId=$crc['class'];
		$section=$crc['section'];
		$get_all=mysqli_query($this->connect,"select * from `monthly_clndr`
        WHERE  class='$classId' AND section='$section' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;		
	}
	public function downloadMonthlyCalendar($id)
	{
		$sql=mysqli_query($this->connect,"select * from monthly_clndr where id='$id'");
		$query=mysqli_fetch_array($sql);
		$fname=$query['file'];		
		header('Content-Description:FileTransfer');
		header('Content-Type:application/octet-stream');		
		header('Content-Disposition:attachment;filename='.basename('../common/monthlyclndr/'."$fname"));
		header('Expires:0');
		header('Cache-Control:must-revalidate');
		header('Pragma:public');
		header('Content-aLength:'.filesize('../common/monthlyclndr/'."$fname"));
		ob_clean();
		flush();
		readfile('../common/monthlyclndr/'."$fname");
		exit;				
		
	}
	//Function End for Monthly Calendar
	//Function Start for Lesson Plan
	function findAllLessonPlan()
	{	
        $crc=$this->studentCurntClass();
		$classId=$crc['class'];
		$section=$crc['section'];
		$get_all=mysqli_query($this->connect,"select * from `lessionplan`
        WHERE  class='$classId' AND section='$section' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;		
	}
	public function downloadLessonPlan($id)
	{
		$sql=mysqli_query($this->connect,"select * from lessionplan where id='$id'");
		$query=mysqli_fetch_array($sql);
		$fname=$query['file'];		
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
	//Function Start for Exam Report Card
	function findAllExamReportCard()
	{	
        $crc=$this->studentCurntClass();
		$classId=$crc['class'];
		$section=$crc['section'];
		$get_all=mysqli_query($this->connect,"select * from `examreportcard`
        WHERE  class='$classId' AND section='$section' ");
		$container=array();
		while($fetch=mysqli_fetch_array($get_all))
		{
			$container[]=$fetch;
		}
		return $container;		
	}
	public function downloadExamReportCard($id)
	{
		$sql=mysqli_query($this->connect,"select * from examreportcard where id='$id'");
		$query=mysqli_fetch_array($sql);
		$fname=$query['file'];		
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
}
$object=new main();
?>