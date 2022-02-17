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
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>PET CLINIC ACCOUNT</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="PET-CLINIC-ACCOUNT.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.2.6, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="PET CLINIC ACCOUNT">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body"><header class="u-clearfix u-header u-palette-1-base u-header" id="sec-c7a2"><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse u-custom-font u-font-roboto" style="font-size: 1.125rem; letter-spacing: 0px; text-transform: uppercase; font-weight: 700;">
            <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-border-radius u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link" href="#" style="padding: 0px; font-size: calc(1em + 0.5px);">
              <svg viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</symbol>
</defs></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-custom-font u-font-roboto u-nav u-spacing-30 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-2 u-border-active-white u-border-hover-grey-75 u-border-no-bottom u-border-no-left u-border-no-right u-button-style u-hover-grey-50 u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-grey-90" href="DASHBOARD.php" style="padding: 10px 0px;"><i class="bi bi-house"></i> DASHBOARD</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-white u-border-hover-grey-75 u-border-no-bottom u-border-no-left u-border-no-right u-button-style u-hover-grey-50 u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-grey-90" href="" style="padding: 10px 0px;"><i class="bi bi-people"></i> ACCOUNTS</a><div class="u-nav-popup"><ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="PET-OWNER-ACCOUNT.php"><i class="bi bi-person"></i> PET OWNER ACCOUNT</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="PET-CLINIC-ACCOUNT.php"><i class="bi bi-clipboard-heart"></i> PET CLINIC ACCOUT</a>
</li></ul>
</div>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-white u-border-hover-grey-75 u-border-no-bottom u-border-no-left u-border-no-right u-button-style u-hover-grey-50 u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-grey-90" href="ADMINMESSAGES.php" style="padding: 10px 0px;"><i class="bi bi-chat"></i> MESSAGES</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-white u-border-hover-grey-75 u-border-no-bottom u-border-no-left u-border-no-right u-button-style u-hover-grey-50 u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-grey-90" href="logout.php" style="padding: 10px 0px;"><i class="bi bi-box-arrow-right"></i> LOGOUT</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="DASHBOARD.php" style="padding: 10px 0px;"><i class="bi bi-house"></i> DASHBOARD</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="" style="padding: 10px 0px;"><i class="bi bi-people"></i> ACCOUNTS</a><div class="u-nav-popup"><ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-4"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="PET-OWNER-ACCOUNT.php"><i class="bi bi-person"></i> PET OWNER ACCOUNT</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="PET-CLINIC-ACCOUNT.php"><i class="bi bi-clipboard-heart"></i> PET CLINIC ACCOUT</a>
</li></ul>
</div>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="ADMINMESSAGES.php" style="padding: 10px 0px;"><i class="bi bi-chat"></i> MESSAGES</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="logout.php" style="padding: 10px 0px;"><i class="bi bi-box-arrow-right"></i> LOGOUT</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header> 
    <section class="u-align-center u-clearfix u-section-1" id="sec-6d9f">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-expanded-width u-table u-table-responsive u-table-1">
          <table class="u-table-entity u-table-entity-1">
            <colgroup>
              <col width="11.4%">
              <col width="26.5%">
              <col width="10.6%">
              <col width="12.2%">
              <col width="8.8%">
            </colgroup>
            <thead class="u-palette-4-base u-table-header u-table-header-1">
              <tr style="height: 21px;">
                <th class="u-border-1 u-border-palette-4-base u-table-cell">Clinic Name</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell">Location</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell">Clinic Hours</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell">Services offered</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell">Owner</th>
                <th class="u-border-1 u-border-palette-4-base u-table-cell">Contact Details</th>
              </tr>
            </thead>
            <tbody class="u-table-body">
			<?php
			
 
				$sql = "SELECT * FROM `clinicowner`";
				
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				// verify
					while($row = $result->fetch_assoc()) {
						$Open = date_create($row['CH-Open']);
						$Close = date_create($row['CH-Close']);
						echo '<tr style="height: 75px;">
                <td class="u-border-1 u-border-grey-30 u-first-column u-grey-5 u-table-cell u-table-cell-8">'.$row['ClinicName'].'</td>
                <td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['Address'].'</td>
                <td class="u-border-1 u-border-grey-30 u-table-cell">'.date_format($Open,"g:i A"). " to ".date_format($Close,"g:i A").'</td>
                <td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['ServicesOffered'].'</td>
                <td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['owner'].'</td>
                <td class="u-border-1 u-border-grey-30 u-table-cell">'.$row['ContactDetails'].'</td>
              </tr>';
					}
				} else {
					echo '<tr style="height: 75px;"><td colspan="4">No Accounts found</td></tr>';
				}
			?>
            </tbody>
          </table>
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
  </body>
</html>