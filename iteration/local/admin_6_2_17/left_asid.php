<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Name Of The Admin</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            
            <li class="active treeview">
              <a href="dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>              
            </li>
			<li class="header">Student Official</li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-child"></i>
                <span>Student</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_student"><i class="fa fa-plus"></i> Register A Student</a></li>
                <li><a href="stu_register"><i class="fa fa-circle-o"></i>Student Register</a></li>
                <li><a href="obycs_vsa"><i class="fa fa-circle-o"></i>Student By Year & Class</a></li>
                <li><a href="upgrade_student"><i class="fa fa-upload"></i> Upgrade Student </a></li>
              </ul>
            </li>
			<li class="header">Class, Section & Subject.</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Class</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_class"><i class="fa fa-plus"></i> Add Class</a></li>
                <li><a href="all_student_class"><i class="fa fa-search-plus"></i> View All Class</a></li>
               </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-object-ungroup"></i>
                <span>Section</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_cl_section"><i class="fa fa-plus-square"></i> Add Class Section</a></li>
                <li><a href="all_class_section"><i class="fa fa-search-plus"></i> View All Section</a></li>
               
              </ul>
            </li> 
			<li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Subject</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_subject"><i class="fa fa-plus-square"></i> Add Subject</a></li>
                <li><a href="all_subject"><i class="fa fa-search-plus"></i> View All Subject</a></li>
               
              </ul>
            </li> 
             <li class="treeview">
              <a href="#">
                <i class="fa fa-hourglass-start"></i>
                <span>Class time table</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_class_tt"><i class="fa fa-circle-o"></i> Add Time Table</a></li>
                <li><a href="all_class_timetable"><i class="fa fa-circle-o"></i> View Class Time Table</a></li>
              </ul>
            </li>
			<li class="header">Student Academic</li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-user-plus"></i>
                <span>Student attendance record</span>
                
              </a>
              <ul class="treeview-menu">               
                <li><a href="add_periodic_attendance"><i class="fa fa-circle-o"></i> Take Daily Attendance</a></li>
                <li><a href="obymcs_vst"><i class="fa fa-circle-o"></i> View Student Attendance</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-user-secret"></i>
                <span>Student Activity</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_feedback"><i class="fa fa-circle-o"></i> Send Feed back</a></li>
                <li><a href="all_daily_feedback"><i class="fa fa-circle-o"></i> View All Feed Back</a></li>
              </ul>
            </li>
			
			<li class="header">Admission charges for new student </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i>
                <span>General Admission Charges</span>                
              </a>
              <ul class="treeview-menu">
                <li><a href="add_gead_charges"><i class="fa fa-circle-o"></i> Add General Admission</a></li>
				<li><a href="all_general_admission_charges"><i class="fa fa-circle-o"></i> View General Admission</a></li>
                <li><a href="receiv_genadmissionchar"><i class="fa fa-circle-o"></i> Receive General Admission</a></li>
                <li><a href="all_recvd_genadmichr"><i class="fa fa-circle-o"></i> View Received Charges</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i>
                <span>Hostel Admission Charges</span>                
              </a>
              <ul class="treeview-menu">
                <li><a href="add_hoad_charges"><i class="fa fa-circle-o"></i> Add Hostel Admission </a></li>
				<li><a href="all_hostel_admission_charges"><i class="fa fa-circle-o"></i> View Hostel Admission</a></li>
                <li><a href="receiv_hostladmissionchar"><i class="fa fa-circle-o"></i> Receive Hostel Admission </a></li>
                <li><a href="all_recvd_hostladmchr"><i class="fa fa-circle-o"></i> View Received Hostel</a></li>
                
              </ul>
            </li>			
			
			<li class="header">Re-Admission charges for old student </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-inr"></i>
                <span>Re-Admission charges</span>                
              </a>
              <ul class="treeview-menu">
                <li><a href="add_readmi_charges"><i class="fa fa-circle-o"></i> Add Re-Admission charges</a></li>
                <li><a href="all_readmis_charges"><i class="fa fa-circle-o"></i> View Re-Admission</a></li>
				<li><a href="receiv_readmis_charges"><i class="fa fa-circle-o"></i> Receive Re-Admission</a></li>
                <li><a href="all_recvd_readmis"><i class="fa fa-circle-o"></i> View Receive Re-Admission</a></li>
              </ul>
            </li> 
			<li class="header">Hostel Fees </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i>
                <span>Hostel Fees</span>                
              </a>
              <ul class="treeview-menu">
                <li><a href="add_hofe"><i class="fa fa-circle-o"></i> Add Hostel Fees</a></li>
				<li><a href="all_hostel_fees"><i class="fa fa-circle-o"></i> View Hostel Fees</a></li>
                <li><a href="receive_hoste_fees"><i class="fa fa-circle-o"></i> Receive  Hostel Fees</a></li>
                <li><a href="all_stuhos_fees"><i class="fa fa-circle-o"></i> All Student Hostel Fees</a></li>
                
              </ul>
            </li>
			<li class="header">Other Annual Charges</li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i>
                <span>Other Annual Charges</span>                
              </a>
              <ul class="treeview-menu">
                <li><a href="add_otan_charges"><i class="fa fa-circle-o"></i> Add Other Annual Charges</a></li>
				<li><a href="all_otan_fees"><i class="fa fa-circle-o"></i> View Other Annual Charges</a></li>
                <li><a href="receive_otan_charges"><i class="fa fa-circle-o"></i> Receive Annual Charges</a></li>
                <li><a href="all_otan_charges"><i class="fa fa-circle-o"></i>View Received Charges</a></li>
                
              </ul>
            </li>
			<li class="header">Monthly Tuition Fees- 2016 - 17</li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i>
                <span>Monthly Tuition Fees</span>                
              </a>
              <ul class="treeview-menu">
                <li><a href="add_setu_fees"><i class="fa fa-circle-o"></i> Add Monthly Tuition</a></li>
				<li><a href="all_setu_fees"><i class="fa fa-circle-o"></i> View Monthly Tuition Fee</a></li>
                <li><a href="receive_setu_fees"><i class="fa fa-circle-o"></i> Receive Monthly Tuition</a></li>
                <li><a href="all_setufee_ledg"><i class="fa fa-circle-o"></i> View Receive Tuition Fees</a></li>
                
              </ul>
            </li>
			<li class="header">Exams Operations</li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-balance-scale"></i>
                <span>Exam Type </span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_exm_type"><i class="fa fa-circle-o"></i> Add Exam Type </a></li>
                <li><a href="all_exm_type"><i class="fa fa-circle-o"></i> View Exam Type </a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-times-o"></i>               
                <span>Exam Time table</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="ad_exm_tmtb"><i class="fa fa-circle-o"></i> Add Exam Time Table</a></li>
                <li><a href="all_exm_tt"><i class="fa fa-circle-o"></i> View Time Table</a></li>
              </ul>
            </li>			
			
			<li class="treeview">
              <a href="#">
                <i class="fa fa-graduation-cap"></i>
                <span>Student Result </span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_stu_result"><i class="fa fa-circle-o"></i> Add Student Result </a></li>
                <li><a href="all_stu_result"><i class="fa fa-circle-o"></i> View Student Result </a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-graduation-cap"></i>
                <span>Exam Report Card</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_stu_result"><i class="fa fa-circle-o"></i> Upload Exam Report Card    </a></li>
                <li><a href="all_stu_result"><i class="fa fa-circle-o"></i> View Report Card </a></li>
              </ul>
            </li>
			<li class="header">Employee</li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-gavel"></i>
                <span>Employee Department</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_emp_dept"><i class="fa fa-circle-o"></i> Add Employee Department</a></li>
                <li><a href="all_emp_dept"><i class="fa fa-circle-o"></i> View Employee Department </a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-link"></i>
                <span>Employee Designation</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_emp_desg"><i class="fa fa-circle-o"></i> Add Employee Designation </a></li>
                <li><a href="all_emp_desg"><i class="fa fa-circle-o"></i> View Employee Designation  </a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-tag"></i>
                <span>Employee Induction</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_employee"><i class="fa fa-circle-o"></i> Add A Employee</a></li>
                <li><a href="all_employee"><i class="fa fa-circle-o"></i> View Employee</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Employee Attendance</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_emp_attendence"><i class="fa fa-circle-o"></i> Add Employee Attendance</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> View Employee Attendance</a></li>
              </ul>
            </li>			
            </li>
            </li>
            </li>
			 <li class="header">Parents Teacher Meetings </li>
			 <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Create Meeting</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_pt_meetings"><i class="fa fa-circle-o"></i>Schedule a Meeting</a></li>
                <li><a href="all_pt_meetings"><i class="fa fa-circle-o"></i> View All Meetings</a></li>               
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Create Feedback</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_ptmeetings_feedback"><i class="fa fa-circle-o"></i>Create Meeting Feedback </a></li>
                <li><a href="all_ptmeetings_feedback"><i class="fa fa-circle-o"></i> View All Feedback</a></li>               
              </ul>
            </li>			
			
			<li class="header">Library Management</li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Books Management</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_lib_books"><i class="fa fa-circle-o"></i> Add Books </a></li>
                <li><a href="all_lib_books"><i class="fa fa-circle-o"></i> View Books </a></li>               
              </ul>
            </li>
			
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Enrollment Of Books</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_enrol_stbk"><i class="fa fa-circle-o"></i> Enroll Book To Student  </a></li>
                 <li><a href="all_enrold_bk"><i class="fa fa-circle-o"></i>All Enrolled Book</a></li> 				              
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Returning Of Books</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="return_stu_books"><i class="fa fa-circle-o"></i>Take Back Books</a></li>                             
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Books Inventory</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="all_enbok_history"><i class="fa fa-circle-o"></i>Enrolled Books History </a></li>                          
              </ul>
            </li>
			<li class="header">Hall Of Fame</li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Achievements</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_achievements"><i class="fa fa-circle-o"></i>Add Achievements Of Students</a></li>               
                <li><a href="all_achiever"><i class="fa fa-circle-o"></i>All Achiver</a></li>               
              </ul>
            </li>
            <li class="header">Study Blogs</li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Material Of study</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_study_material"><i class="fa fa-circle-o"></i>Add study Material</a></li>               
              </ul>
            </li>
			<li class="header">Daily Diary</li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Class Diary</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="upload_diary"><i class="fa fa-circle-o"></i>Upload Diary</a></li>               
              </ul>
			  <ul class="treeview-menu">
                <li><a href="all_class_diary"><i class="fa fa-circle-o"></i>View Diary</a></li>               
              </ul>
            </li>
			<li class="header">Plan Of Lesson</li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Lesson Plan</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_study_material"><i class="fa fa-circle-o"></i>Upload Lesson Plan</a></li>               
              </ul>
			  <ul class="treeview-menu">
                <li><a href="add_study_material"><i class="fa fa-circle-o"></i>View Lesson Plan</a></li>               
              </ul>
            </li>
			<li class="header">School Callender</li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Holiday Management</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_holiday"><i class="fa fa-circle-o"></i>Add Holiday</a></li>               
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Event Management</span>
                <span class="label label-primary pull-right">2</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_events"><i class="fa fa-circle-o"></i>Add Events</a></li>               
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Meetings  Management</span>
                <span class="label label-primary pull-right">1</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_study_material"><i class="fa fa-circle-o"></i>Add Meeting</a></li>               
              </ul>
            </li>
			<li class="header">Student Career</li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Student Interest</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_study_material"><i class="fa fa-circle-o"></i>Add Interest</a></li>               
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Student Performance</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_study_material"><i class="fa fa-circle-o"></i>Add Performance</a></li>               
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Career Grooming</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_study_material"><i class="fa fa-circle-o"></i>View Career</a></li>               
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Student Scholarship</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_study_material"><i class="fa fa-circle-o"></i>Add Performance</a></li>               
              </ul>
            </li>
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>