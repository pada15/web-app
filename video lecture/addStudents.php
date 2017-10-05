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
        <?php echo "<title>$course_name - Add Students</title>" ?>
		<?php include($_SERVER['DOCUMENT_ROOT']."/php/headerIncluder.php"); ?>
		<script src="/js/createVideo.js"></script>
		<script src="/js/addStudents.js"></script>
		<script src="/js/login_register.js"></script>
		<script src="/js/getWaitingNr.js"></script>
		<script src="/js/editCourse.js"></script>
		<script src="/js/closeCourse.js"></script>
    </head>
    <body>
		<?php include($_SERVER['DOCUMENT_ROOT']."/php/headermenuCourse.php"); ?>
		<script>
			// Highlights the page in the menu
			$( "#addStudents" ).addClass( "active" );
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
								In this page you can view all students able to join your course. 
								If a student for instance is unable to enroll themselves you, as a teacher, can add them to the course. 
								You can search for students by name or perhaps find all students in a certain program.
							</p>
						</div>
					</div>
				</div>
			</div>
		
			<div class="container-fluid">
				<h2 class="tableHeader">View all <span>students</span> you can add to the course</h2>
				<table id="addStudents_list" class="display" cellspacing="0" width="100%" data-course="<?php echo $_GET['course']; ?>">
					<thead>
						<tr>
							<th></th>
							<th>Username</th>
							<th>Add to Course</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th>Username</th>
							<th>Add to Course</th>
						</tr>
					</tfoot>
				</table>
				<div id="addStudents_error"></div>
			</div>
		
		<div class="pagedivider"></div>
		
		</div>
		<footer class="site-footer no-margin">
			<?php include($_SERVER['DOCUMENT_ROOT']."/php/footermenu.php"); ?>
		</footer>
    </body>
</html>