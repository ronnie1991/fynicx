<?php 

class main
{
	protected $name='agpnconventer';
	protected $localhost='localhost';
	protected $root='root';
	protected $password='';
	protected $connect;
	public $db;
	
	 function __construct()
	 {
		 session_start();
		 $this->connect();
	 }
	
	public function connect()
	{
		$this->db=new PDO("mysql:host=$this->localhost;dbname=$this->name",$this->root,$this->password);
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
	public function fetchAllSlidrImage()
	{
		$sql=$this->db->query("select * from `frontnd_slider` WHERE `status`='1' ORDER BY id DESC");
		return $fetch=$sql->fetchAll();
	}

	public function fetchAllFrontGalleryImage()
	{
		$sql=$this->db->query("select * from site_gallery WHERE status='1'");
		return $fetch=$sql->fetchAll();
	}
	public function fetchAllParentsWord()
	{
		$sql=$this->db->query("select * from parents_review WHERE status='1'");
		return $fetch=$sql->fetchAll();
	}
	public function fetchAllNoticeBoard()
	{
		$sql=$this->db->query("select * from site_noticeboard WHERE status='1'");
		return $fetch=$sql->fetchAll();
	}
	function actvStudentCount()
	{
		$get_count=$this->db->query("select * from student_registation WHERE status='1' ");		
		return $get_count->rowCount();
	}
	function actvStudentCountByCurrentYear()
	{
		$currentYear=$this->academicYear();
		$get_count=$this->db->query("select * from `class_upgrading` WHERE `year`='$currentYear' ");		
		return $get_count->rowCount();
	}
	public function allAchieverStu()
	{
		$sql=$this->db->query("select * from stu_achievement WHERE status=1");
		return $fetch=$sql->fetchAll();
		
	}
	public function singlStuInfoDtls($stuAdmNo)
	{
		$sql=$this->db->query("select * from student_registation WHERE admission_number='$stuAdmNo'");
		return $fetch=$sql->fetch();
		
	}
	public function allEvents()
	{
		$sql=$this->db->query("select * from event_banner WHERE status=1");
		return $fetch=$sql->fetchAll();
		
	}	
    public function singlEventMultiImg($evntId)
	{
		$sql=$this->db->query("select * from event_banner WHERE id='$evntId'");
		return $fetch=$sql->fetch();
		
	}
	public function allCoCurricular()
	{
		$sql=$this->db->query("select * from `add_co-curricular` WHERE status=1");
		return $fetch=$sql->fetchAll();
		
	}	
	public function singlCoCuriCuMultiImg($coCuriCuId)
	{
		$sql=$this->db->query("select * from `add_co-curricular` WHERE id='$coCuriCuId'");
		return $fetch=$sql->fetch();
		
	}
	public function allGamesNSports()
	{
		$sql=$this->db->query("select * from `gamsnsports` WHERE status=1");
		return $fetch=$sql->fetchAll();
		
	}	
	public function singlGNSMultiImg($gNsId)
	{
		$sql=$this->db->query("select * from `gamsnsports` WHERE id='$gNsId'");
		return $fetch=$sql->fetch();
		
	}
	public function allFacultyByDept($deptId)
	{
		$sql=$this->db->query("select * from `employee` WHERE `department`='$deptId' AND status=1 ");
		return $fetch=$sql->fetchAll();
		
	}
	public function singlDesignation($deptId)
	{
		$sql=$this->db->query("select * from emp_designatio WHERE department='$deptId'");
		return $fetch=$sql->fetch();
		
	}
}
$main=new main();
?>