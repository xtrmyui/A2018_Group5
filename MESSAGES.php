<?php
 session_start();
 date_default_timezone_set("Asia/Manila");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petvaccination";
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}else{
	if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
		
		header("Location: SIGN-IN.php?loginfirst");
		exit();
	}else{
		if($_SESSION["Acc"]!="PetOwner"){
			header("Location: SIGN-IN.php?loginfirst");
		exit();
		}
	}
}
$ID = $_SESSION["ID"];
//$ShowThis = $_COOKIE['RS'];
if(@$_COOKIE['RS']==null){
	$getThis = "";
}else{
	$ID = $_SESSION["ID"];

	$verifyFirst = explode(" ",$_COOKIE['RS']);
	$SenderID = $verifyFirst[0];
	$ReceiverID = $verifyFirst[1];
	if(($SenderID==$ID)or($ReceiverID==$ID)){
		
		$getThis = $_COOKIE['RS'];
	}else{
			$getThis = "";
	}
}

						$sql = "SELECT * FROM `messages` WHERE SenderID='".$ID."' or ReceiverID='".$ID."' order by DateTimeSort desc";
						$result = $conn->query($sql);
						$MessageListID= array();
						$MessageFinal = array();
						if ($result->num_rows > 0) {
							$rowcnt = 0;
							
							while($row = $result->fetch_assoc()) {
								$tmpVar = $row['SenderID']." ".$row['ReceiverID'];
								
								if($row['SenderID']==$ID ){
									
									if(in_array($row['ReceiverID'],$MessageListID)){
										
									}else{
										$MessageListID[$rowcnt] = $row['ReceiverID'];
										$MessageFinal[$rowcnt] = $tmpVar;
										$rowcnt++;
										
									}
								}else{
									if(in_array($row['SenderID'],$MessageListID)){
									}else{
										$MessageListID[$rowcnt] = $row['SenderID'];
										$MessageFinal[$rowcnt] = $tmpVar;
										$rowcnt++;
										
										//	echo '<div class="messagelist" style="" id=""><text style="font-size:18px" class="txt">Pet Paws</text><br>
									//	<text style="color:gray;font-size:14px" class="txt">'.$row['Message'].'</text>
									//	</div>';
									}
								}
								
							}
						}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$ToName = trim($_POST["toname"]);
	$ToID = trim($_POST["toID"]);
	$TMessage = addslashes(trim($_POST["message"]));
	$FromID= $_SESSION["ID"];
	$FromName= $_SESSION["NAME"];
	$MID = $FromName[0]. date("Ymd").$ToName[0]. date('His');
	$Date = date("Ymd");
		$Time = date("His");
		$DateTimeSort= date("Y-m-d") ." ".date("H:i:s");
	$sql = "INSERT INTO `messages`(`FromName`, `SenderID`, `ToName`, `ReceiverID`, `Message`, `Date`, `Time`,`DateTimeSort`, `MessageID`, `Seen`) VALUES 
		('".$FromName."','".$FromID."','".$ToName."','".$ToID."','".$TMessage."','".$Date."','".$Time."','".$DateTimeSort."','".$MID."','Unseen')";
					
		if ($conn->query($sql) === TRUE) {
			echo "<script>window.location='MESSAGES.php';</script>";
		} else {
			echo "Error updating record: " . $conn->error;
		}

$conn->close();
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="PET OWNER 1">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>MESSAGES</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="MESSAGES.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.4.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <style>
	.messagelist{
		padding:5px;margin-bottom;10px;border-top:1px solid gray;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;cursor:pointer;

	}
	.eachline{
		width:100%;
		float:left;;
	}
	.messagelist:hover{
		background-color:lightgray;
	}
	.speechbubbleleft{max-width:80%;background-color:lightgray;padding:10px;border-radius:10px;float:left;margin:15px;}
	.speechbubbleright{max-width:80%;background-color:#00b2ff;padding:10px;border-radius:10px;float:right;margin:15px	}
	
	</style>   
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="MESSAGES">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode"><header class="u-clearfix u-header u-palette-1-base u-header" id="sec-c7a2"><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="letter-spacing: 0px; font-size: 1.25rem; font-weight: 700;">
            <a class="u-button-style u-custom-active-color u-custom-left-right-menu-spacing u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-nav-link" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0173"></use></svg>
              <svg class="u-svg-content" version="1.1" id="svg-0173" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="PETOWNERHOME.php" style="padding: 10px 14px;">HOME</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="MY-PETS-PROFILE.php" style="padding: 10px 14px;">MY PETS PROFILE</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="MY-APPOINTMENTS.php" style="padding: 10px 14px;">MY APPOINTMENTS</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="MESSAGES.php" style="padding: 10px 14px;">MESSAGES</a>
</li><li class="u-nav-item"><a class="u-border-5 u-border-active-grey-75 u-border-hover-grey-75 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-black u-text-body-alt-color" href="LOGOUT.php" style="padding: 10px 14px;">LOGOUT</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="PETOWNERHOME.php" style="padding: 10px 14px;">HOME</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="MY-PETS-PROFILE.php" style="padding: 10px 14px;">MY PETS PROFILE</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="MY-APPOINTMENTS.php" style="padding: 10px 14px;">MY APPOINTMENTS</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="MESSAGES.php" style="padding: 10px 14px;">MESSAGES</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="LOGOUT.php" style="padding: 10px 14px;">LOGOUT</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-border-1  u-clearfix u-grey-10 u-section-1" id="sec-54f1">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-6 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-size-12-lg u-size-12-xl u-size-29-sm u-size-29-xs u-size-60-md">
                <div class="u-layout-row">
                  <div style="background-color:white;width:100%" src="">
                    <div  src="">
					<div style="padding:5px;margin-bottom;10px;"><text class="u-text-1" style="font-size:18px"><i class="bi bi-chat-left-dots-fill" style="color:blue;"> </i>Messages <i class="bi bi-plus-circle-fill" style="color:blue;float:right;cursor:pointer" onclick="addNew()"></i></text></div>
					<select style="width:100%;padding:5px;" id="selectNew" onchange="MessageThis()">
					<option selected disabled></option>
						<?php
							$sql = "SELECT * FROM `clinicowner`";
							$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										echo '<option value="'.$row['ClinicID'].'">'.$row['ClinicName'].'</option>';
									}
								}
						?>
					</select>
                       <?php
							for($cnt=0;$cnt < count($MessageFinal);$cnt++){
								$display = $MessageFinal[$cnt];
								$display = explode(" ",$display);
								$SenderID = $display[0];
								$ReceiverID = $display[1];
								$sql = "SELECT * FROM `messages` where SenderID in ('".$SenderID."','".$ReceiverID."') and ReceiverID in ('".$SenderID."','".$ReceiverID."') order by DateTimeSort desc";
								$result = $conn->query($sql);
								$ID = $_SESSION["ID"];
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										
										if($row['SenderID']==$ID){
											echo '<div class="messagelist" style="" id="'.$row['SenderID']." ".$row['ReceiverID'].'" onclick="viewMessage(this.id)"><span style="font-size:18px" class="u-span txt">'.$row['ToName'].'</span><br>
											<span style="color:gray;font-size:14px" class="txt">'.$row['Message'].'</span>
											</div>';
										}else{
											
											if($row['Seen']=='Unseen'){
												echo '<div class="messagelist" style="" id="'.$row['SenderID']." ".$row['ReceiverID'].'" onclick="viewMessage(this.id)"><span style="font-size:18px" class="u-span txt">'.$row['FromName'].'</span><br>
												<span style="color:gray;font-size:14px" class="txt"><b>'.$row['Message'].'</b></span>
												</div>';
											}else{
												echo '<div class="messagelist" style="" id="'.$row['SenderID']." ".$row['ReceiverID'].'" onclick="viewMessage(this.id)"><span style="font-size:18px" class="u-span txt">'.$row['FromName'].'</span><br>
											<span style="color:gray;font-size:14px" class="txt">'.$row['Message'].'</span>
											</div>';
											}
											
										}
										break;
									}
									
								}
							}
					   ?>
					  
					  
                    </div>
                  </div>
                </div>
              </div>
			  <?php
					if($getThis!=""){
						$getThis = explode(" ",$getThis);
						$SenderID = $getThis[0];
						$ReceiverID = $getThis[1];
						$sql = "SELECT * FROM `messages` where SenderID in ('".$SenderID."','".$ReceiverID."') 
						and ReceiverID in ('".$SenderID."','".$ReceiverID."') order by Date,Time asc";
						$role="Pet Clinic";
						$result = $conn->query($sql);
							$ID = $_SESSION["ID"];
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										if($row['SenderID']==$ID){
											$name = $row['ToName'];
										}else{
											$name = $row['FromName'];
											$sqlUp = "UPDATE `messages` SET `Seen`='Seen' WHERE SenderID='".$row['SenderID']."' and ReceiverID='".$row['ReceiverID']."'";
											if ($conn->query($sqlUp) === TRUE) {
											} else {
												echo "Error updating record: " . $conn->error;
											}
										}
									}
								}else{
									//echo $ReceiverID;
									$sql = "SELECT * FROM `clinicowner` where ClinicID='".$ReceiverID."'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											$name = $row['ClinicName'];
										}
									}
								}
								
					}else{
						$name = "";
						$role = "";
					}
				  ?>
              <div class="u-size-31-sm u-size-31-xs u-size-48-lg u-size-48-xl u-size-60-md">
                <div class="u-layout-col">
                  <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-40 u-white u-layout-cell-2">
                    <div class="" src="">
                      <div style="width:100%;height:100%;padding:10px">
						<text class="u-text" style="font-size:20px"><b><?php echo $name ?></b></text><br><text class="u-text"><i><?php echo $role ?></i></text>
						</div>
                    </div>
                  </div>
                  <div class=" u-container-style u-layout-cell u-size-20 u-white u-layout-cell-3" style="width:100%" src="">
                    <div class="" style="width:100%">
						<div style="overflow-y:auto;width:100%;max-height:90%;position:absolute;bottom:10%;">
						<?php
					if($getThis!=""){
						$SenderID = $getThis[0];
						$ReceiverID = $getThis[1];
						$sql = "SELECT * FROM `messages` where SenderID in ('".$SenderID."','".$ReceiverID."') 
						and ReceiverID in ('".$SenderID."','".$ReceiverID."') order by Date,Time asc";
						
						$result = $conn->query($sql);
							$ID = $_SESSION["ID"];
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										$addDate = $row['Date'];
						$addDate = date_create($addDate);
						$addDate = date_format($addDate,"F d, Y");
						$addTime = $row['Time'];
						$addTime = date_create($addTime);
						$addTime = date_format($addTime,"g:i A");
						if($addDate==date("F d, Y")){
							$DisplayTime = $addTime;
						}else{
							$DisplayTime = $addDate ." " . $addTime;;
						}
										if($row['SenderID']==$ID){
											echo '<div class="eachline u-text">
											<div class="u-text speechbubbleright" style="">
											'.$row['Message'].'<br>
											<span style="color:darkblue;font-size:14px;float:right;" class="txt">'.$DisplayTime.'</span><br>
											</div>
											</div>';
										}else{
											echo '<div class="eachline u-text">
								<div class="u-text speechbubbleleft" style="">
								'.$row['Message'].'<br>
								<span style="color:gray;font-size:14px;float:left;" class="txt">'.$DisplayTime.'</span>
								</div>
							</div>';
										}
									}
								}
					}else{
					}
					echo '<div class="eachline u-text" id="scrollTothis">
								<div class="u-text speechbubble" style="">
								</div>
							</div>';

				  ?>
							
							
						</div>
						<div class="u-text" style="overflow:hidden;width:100%;height:10%;position:absolute;bottom:0;">
						<form method="post">
						<?php
						if($getThis!=""){
						$SenderID = $getThis[0];
						$ReceiverID = $getThis[1];
						$to ="";
						if($SenderID==$ID){
							$to = $ReceiverID;
						}else{
							$to = $SenderID;
						}
						}
						?>
							<div class="u-text" style="overflow:hidden;width:94%;height:100%;position:absolute;bottom:0;float:left">
							<input class="u-text" type="hidden" name="toID" value="<?php echo $to ?>">
							<input class="u-text" type="hidden" name="toname" value="<?php echo $name ?>">
								<textarea style="width:100%;height:100%;resize:none;" placeholder="Type a message" name="message"></textarea>
							</div>
							<div class="u-text" style="overflow:hidden;width:6%;height:100%;float:right;">
								<button type="submit" style="height:100%;width:100%;"><i class="bi bi-send"></i><br></button>
						 </div></form>
						 </div>
					</div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    
    <!--
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-ad50"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
        <span>Website Templates</span>
      </a>
      <p class="u-text">
        <span>created with</span>
      </p>
      <a class="u-link" href="" target="_blank">
        <span>Website Builder Software</span>
      </a>. 
    </section> -->
	<script>
	document.getElementById('scrollTothis').scrollIntoView();
	document.getElementById('selectNew').style.display = "none";
	function viewMessage(id){
		document.cookie = "RS=" + id;
		window.location='MESSAGES.php';
	}
	function addNew(){
		document.getElementById('selectNew').style.display = "block";
	}
	function MessageThis(){
		var RecID = document.getElementById('selectNew').value;
		var SenID = '<?php echo $_SESSION["ID"] ?>';
		var id = SenID + " " + RecID;
		document.cookie = "RS=" + id;
		window.location='MESSAGES.php';
	}
	</script>
  </body>
</html>