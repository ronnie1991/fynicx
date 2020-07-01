<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AGPN | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
	
	<style>
		body {
		margin-top: 20px;
		}
	</style>
  </head>
  
   <?php
include("main.class.php");
$singstuin=$object->ajaxStuTutnFes(base64_decode($_GET['id']));
$singStuDtls=$object->singelStuInfo($singstuin['student_id']);   
$singClsDe=$object->singelClass($singstuin['class']);   
$singSecDe=$object->singelClassSect($singstuin['section']);   
$singMonth=$object->numrcMonth($singstuin['payment_month']);   
$singTufe=$object->ajaxSessionfees($singstuin['class']);  
$balance=$singTufe['fees']-$singstuin['paid_amount']; 
$html='
    <div class="row" style=" height:70%; border: 3px solid black;">
	<h3 style="text-align:center;margin-top: 15px;margin-bottom: 10px;">
	AGPN Convent & ER School
	</h3>
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3" >
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left: 26%;   ">
                    <address>
                        <strong>AGPN Convent & Eklabya Residential</strong>
                        <br>
                        Chakda, Purulia * CBSC - 56096 
                        <br>
                         Affilation Number - 2430143
                        <br>
                        <abbr title="Phone">P:</abbr> (+91) 9679432190 / 9832254783
                    </address>
                </div>
               <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left: 59%; margin-top:-7% ; ">
                    <p>
                        <em>Date: '.date('M d Y',$singstuin['in_time']).'</em>
                    </p>
                    <p>
                        <em>Receipt #: '.base64_decode($_GET['id']).'</em>
                    </p>					
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <img src="dist/img/agpn_logo.png" alt="allytees-500-trans.png" style="margin-left: 43%;">
                    <h4 style="margin-left: 41%;margin-top:-5px;">Tuition Fees - Session (2017-2018)</h4>
                </div>
                </span>
                <table class="table table-hover" style="margin-left: 36%;margin-top:-5px;">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th >Class</th>
                            <th class="text-center">Section</th>
                            <th class="text-center">Month</th>
                            <th class="text-center">Fees</th>
                            <th class="text-center">Paying</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em>'.$singStuDtls['stu_full_nm'].'</em></h4></td>
                            <td class="col-md-1" style="text-align: center"> '.$singClsDe['class'].' </td>
                            <td class="col-md-1 text-center">'.$singSecDe['section'].'</td>
                            <td class="col-md-1 text-center">'.$singMonth.'</td>
                            <td class="col-md-1 text-center">'.$singTufe['fees'].'</td>
                            <td class="col-md-1 text-center"> &#8377 '.$singstuin['paid_amount'].'</td>
                        </tr>
                        
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Balance </strong>
                            </p>
                            <p>
                                <strong>Paid</strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>&#8377 '.$balance.'</strong>
                            </p>
                            <p>
                                <strong>'.$singstuin['paid_amount'].'</strong>
                            </p></td>
                        </tr>
                        
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>'
;
?>
<div id="divToPrint" style="display:none;">
  <div style="width:100%;height:100%;">
           <?php echo $html; ?>      
  </div>
</div>
<div class="container">
<div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                  <h3 style="text-align:center;padding:0px;margin-top: -10px;margin-bottom: 21px;">
                       AGPN Convent & ER School
                    </h3>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>AGPN Convent & Eklabya Residential</strong>
                        <br>
                        Chakda, Purulia * CBSC - 56096 
                        <br>
                         Affilation Number - 2430143
                        <br>
                        <abbr title="Phone">P:</abbr> (+91) 9679432190 / 9832254783
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: <?= date('M d Y',$singstuin['in_time']);?></em>
                    </p>
                    <p>
                        <em>Receipt #: 0000015</em>
                    </p>
					<p>
					<div>
						<input type="button" value="print" onclick="PrintDiv();" />
					</div>
					</p>
                </div>
            </div>
            <div class="row">
			
                <div class="text-center">
                    <img src="dist/img/agpn_logo.png" alt="allytees-500-trans.png" >
                    <h4>Tuition Fees - Session (2017-2018)</h4>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th class="text-center">Class</th>
                            <th class="text-center">Section</th>
                            <th class="text-center">Month</th>
                            <th class="text-center">Fees</th>
                            <th class="text-center">Paying</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em><?= $singStuDtls['stu_full_nm'];?></em></h4></td>
                            <td class="col-md-1" style="text-align: center"> <?= $singClsDe['class'];?> </td>
                            <td class="col-md-1 text-center"><?= $singSecDe['section'];?></td>
                            <td class="col-md-1 text-center"><?= $singMonth;?></td>
                            <td class="col-md-1 text-center"><?= $singTufe['fees'];?></td>
                            <td class="col-md-1 text-center">&#8377 <?= $singstuin['paid_amount'];?></td>
                        </tr>
                         <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Balance</strong>
                            </p>
                            </td>
                            <td class="text-center">
                            <p>
                                <strong>&#8377 <?= $balance;?></strong>
                            </p>
                           </td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Paid &#8377 </strong></h4></td>
                            <td class="text-center"><h4><strong><?= $singstuin['paid_amount'];?></strong></h4></td>
                        </tr>
                    </tbody>
                </table>
              
            </div>
        </div>
   
    </div>
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
   
  </body>
</html>
