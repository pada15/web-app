<nav class="navbar navbar-inverse navbar-static-top no-margin colorClass" role="navigation">
	<div class="container-fluid" style="max-width: none">
		<div class="navbar-header">
		    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand">			<?php
				if($teacher == 1) {
					echo "<h2boot>Teacher: <span>". $_SESSION['username'] ."</span></h2boot>";
				}
				else {
					echo "<h2boot>Student: <span>". $_SESSION['username'] ."</span></h2boot>";
				}
			?>	</a>
		</div>
		
		<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li id="start"><a href='start.php'>Start</a></li>
				<li id="course"><a href="/course.php?user=<?php echo $_SESSION['user_id']; ?>&course=<?php echo $_GET['course']; ?>">Course</a></li>
				
				<?php if($teacher == 1): ?>
				<li id="viewWaitingStudents"><a href="viewWaitingStudents.php?user=<?php echo $_SESSION['user_id']; ?>&course=<?php echo $_GET['course']; ?>">Waiting students 
				<span id="waitingNr" data-user="<?php echo $_SESSION['user_id']; ?>" data-course="<?php echo $_GET['course']; ?>" style="color: red; font-weight: bold"></span></a></li>
				<li id="addStudents"><a href="addStudents.php?user=<?php echo $_SESSION['user_id']; ?>&course=<?php echo $_GET['course']; ?>">Add Students</a></li>
				<li id="addLecture"><a href="#form_wrapper_video" class="addVideoButton">Add Lecture</a></li>
				<li id="dropdownCourse" class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Edit Course <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#form_wrapper_editC" class="editCourseButton">Edit Course info</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#form_wrapper_closeC" class="closeCourseButton">Close Course</a></li>
					</ul>
				</li>
				<li id="editLecture" class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Edit Lecture <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li id="editVideo"><a href="#form_wrapper_editVideo" class="editVideoButton">Edit Video</a></li>
						<li role="separator" class="divider"></li>
						<li id="editSlide"><a href="#form_wrapper_slide" class="editSlideButton">Edit Slides</a></li>
					</ul>
				</li>
				<?php endif; ?>
				<li><a href='php/logout.php'>Logout</a></li>
			</ul>
		</div>
	</div>
</nav>

<div id="form_wrapper_video" class="form_wrapper lightboxWrap" style="display:none">
	<form id="createVideo-form" class="vid active" data-user="<?php echo $_SESSION['user_id']; ?>" data-course="<?php echo $_GET['course']; ?>">
	<h3>Upload Lecture <i class="fa fa-eject"></i></h3>
		<div>
			<label>Title</label> 
			<input type="text" name="video_title" required="required" maxlength="45" />
		</div>
		<div>
			<label>Description</label> 
			<textarea id="styled" rows="5" cols="40" name="video_description" placeholder="Write a short video description" maxlength="250"></textarea>
		</div>
		<div>
			<label>YouTube-Link</label> 
			<input type="text" name="url" required="required" maxlength="255" />
		</div>
		<div class="bottom">
			<div id="createVideo_error" class="edit_error"></div>
			<input type="submit" name="setVideo" value="Add video"/>
			<div class="clear"></div>
		</div>
	</form>
</div>

<div id="form_wrapper_editC" class="form_wrapper lightboxWrap" style="display:none">					
	<form id="editCourse-form" class="edit active" data-courseid="<?php echo $course_id; ?>" data-userid="<?php echo $_SESSION['user_id']; ?>">
		<?php echo '<h3>Edit course: '.$course_code.' <i class="fa fa-book"></i></h3>'; ?>
		<div>
			<label>Course code<em class="reqfield"> *</em></label>
			<input type="text" name="edit_course_code" required="required" maxlength="45"/>
			<span class="error">This is an error</span>
		</div>
		<div>
			<label>Course name<em class="reqfield"> *</em></label>
			<input type="text" name="edit_course_name" required="required" maxlength="45"/>
			<span class="error">This is an error</span>
		</div>
		<div>
			<label>Course description</label>
			<textarea rows="5" cols="40" name="edit_course_description" placeholder="Write a short course description" maxlength="250"></textarea>
		</div>
		<div class="bottom">
			<div id="editCourse_error" class="edit_error"></div>
			<input type="submit" name="editCourse" value="Apply changes" />
			<a href="#form_wrapper_closeC" rel="edit" class="linkform closeCourseButton">You wish to close this course?</a>
			<div class="clear"></div>
		</div>
	</form>
</div>

<div id="form_wrapper_closeC" class="form_wrapper lightboxWrap" style="display:none">					
	<form id="closeCourse-form" class="edit active" data-courseid="<?php echo $course_id; ?>" data-userid="<?php echo $_SESSION['user_id']; ?>">
		<?php echo '<h3>Close course '.$course_code.' <i class="fa fa-trash"></i></h3>'; ?>
		<div id="close_course_confirm">
			<label>Confirm with password<em class="reqfield"> *</em></label>
			<input type="password" name="close_course_password" maxlength="45"/>
			<span class="error">This is an error</span>
		</div>
		<div class="bottom">
			<div id="closeCourse_error" class="edit_error"></div>
			<input type="submit" name="closeCourse" value="Close course" />
			<a href="#form_wrapper_editC" rel="edit" class="linkform editCourseButton">You wish to edit the course instead?</a>
			<div class="clear"></div>
		</div>
	</form>
</div>

<div id="form_wrapper_editVideo" class="form_wrapper lightboxWrap" style="display:none">
	<form id="editVideo-form" class="vid active" data-lectureid="<?php echo $_GET['lecture_id'];?>">
	<h3>Edit Lecture <i class="fa fa-eject"></i></h3>
		<div>
			<label>Title</label> 
			<input type="text" name="edit_video_title" required="required" maxlength="45" />
		</div>
		<div>
			<label>Description</label> 
			<textarea id="styled" rows="5" cols="40" name="edit_video_description" placeholder="Write a short video description" maxlength="250"></textarea>
		</div>
		<div>
			<label>YouTube-Link</label> 
			<input type="text" name="edit_url" required="required" maxlength="255" />
		</div>
		<div class="bottom">
			<div id="editVideo_error" class="edit_error"></div>
			<input type="submit" name="editVideo" value="Edit video"/>
			<div class="clear"></div>
		</div>
	</form>
	<div id="editVideo_error" class="edit_error"></div>
</div>

<div id="form_wrapper_slide" class="" style="display:none; margin-right: 15px">					
	<h2 class="tableHeader" style="padding: 0">Add or remove <span>slides</span></h2>
	<table id="slides" class="display" cellspacing="0" width="100%" data-lectureid="<?php echo $_GET['lecture_id']; ?>" data-userid="<?php echo $_SESSION['user_id'] ?>">
		<thead>
			<tr>
				<th>Start Time</th>
				<th>Slide</th>
				<th>Action</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Start Time</th>
				<th>Slide</th>
				<th>Action</th>
			</tr>
		</tfoot>
	</table>
	<div>
		<div id="slides_error"></div>
		<div class="pagedivider"></div>
		<form id="add_slide" style="display: block" enctype="multipart/form-data">
			<input type="number" name="start_sec" placeholder="Enter start time" required="required">
			<input type="file" name="fileToUpload" id="fileToUpload" required="required">
			<input type="hidden" name="lect_id" value="<?php echo $_GET['lecture_id']; ?>">
			<input type="submit" class="tableButton" style="float: right; margin-top: -45px" value="Upload" name="submit">
		</form>
	</div>
</div>

<script type="text/javascript">
    $(".addVideoButton").fancybox({
		"scrolling":"no",
		"arrows":false,
		"padding":[0,15,15,15]
	});
</script>

<script type="text/javascript">
    $(".editCourseButton").fancybox({
		"scrolling":"no",
		"arrows":false,
		"padding":[0,15,15,15]
	});
</script>

<script type="text/javascript">
    $(".closeCourseButton").fancybox({
		"scrolling":"no",
		"arrows":false,
		"padding":[0,15,15,15]
	});
</script>

<script type="text/javascript">
    $(".editSlideButton").fancybox({
		"scrolling":"yes",
		"arrows":false,
		"width": "80%",
		"height": "80%",
		"autoSize": false,
		"padding":[0,15,15,15]
	});
</script>

<script type="text/javascript">
    $(".editVideoButton").fancybox({
		"scrolling":"no",
		"arrows":false,
		"padding":[0,15,15,15]
	});
</script>