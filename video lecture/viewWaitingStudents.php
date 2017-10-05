<?php
include($_SERVER['DOCUMENT_ROOT']."/php/courseHeader.php");
if($teacher != 1) {
	header('Location: http://localhost:8080/index.php');
	die();
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php echo "<title>$course_name - Waiting Students</title>" ?>
		<link rel="icon" href="images/favicon.ico">
		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/style.css" rel="stylesheet">
		<link href="css/master.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="/js/viewWaitingStudents.js"></script>
		<script src="/js/login_register.js"></script>
		<script src="/js/getWaitingNr.js"></script>
		<script src="/js/editCourse.js"></script>
		<script src="/js/closeCourse.js"></script>
		<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    </head>
    <body>
		<?php include($_SERVER['DOCUMENT_ROOT']."/php/headermenuCourse.php"); ?>
		<script>
			$( "#viewWaitingStudents" ).addClass( "active" );
		</script>
		
		<script>
			$( "#editLecture" ).addClass( "hidden" );
		</script>
		<script>
			$( "#editSlide" ).addClass( "hidden" );
		</script>
		
		<div id="startdiv" class="startdiv">
			<div class="page-header">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<img src="bootstrap/images/logo.png" class="img-responsible pull-left" >
						</div>
						<div class="col-lg-6" style="font-family:'Trebuchet MS', 'Myriad Pro', sans-serif font-size: 14px;font-weight: bold">
							<p>
								Here you can see a list of students that have enrolled to your course and are waiting to be accepted or rejected by you, the teacher. 
								This page can only be visited when there are students awaiting approval.
							</p>
						</div>
					</div>
				</div>	
			</div>
		
			<div class="container-fluid">
				<h2 class="tableHeader">View all <span>students</span> waiting to be accepted</h2>
				<table id="waitingStudents_list" class="display" cellspacing="0" width="100%" data-course="<?php echo $_GET['course']; ?>">
					<thead>
						<tr>
							<th></th>
							<th>Username</th>
							<th>Accept</th>
							<th>Reject</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th>Username</th>
							<th>Accept</th>
							<th>Reject</th>
						</tr>
					</tfoot>
				</table>
				<div id="viewWaitingStudents_error"></div>
			</div>
		
		<div class="pagedivider"></div>
		
		</div>
		<footer class="site-footer no-margin">
			<?php include($_SERVER['DOCUMENT_ROOT']."/php/footermenu.php"); ?>
		</footer>
    </body>
</html>