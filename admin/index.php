<?php
session_start();
//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
include "dbcon.php";
$qry="SELECT services, count(*) as number FROM members GROUP BY services";
$result=mysqli_query($con,$qry);
$qry="SELECT gender, count(*) as enumber FROM members GROUP BY gender";
$result3=mysqli_query($con,$qry);
$qry="SELECT designation, count(*) as snumber FROM staffs GROUP BY designation";
$result5=mysqli_query($con,$qry);
?>
<!-- Visit codeastro.com for more projects -->
<!DOCTYPE html>

<html lang="en">
<head>
<title>Sache System Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />

<!-- Modern Google Fonts (Montserrat & Inter) -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --bg-canvas: #f8fafc; /* Crisp light gray background */
        --panel-border: #e2e8f0; /* Thin gray borders */
        --text-dark: #0f172a; /* Rich slate charcoal */
        --text-muted: #64748b;
        --pf-purple: #522b7a; /* Planet Fitness Purple */
        --pf-purple-dark: #371a53; /* Darker Purple */
        --pf-yellow: #ffcc00; /* Planet Fitness Yellow */
        --sidebar-dark: #0f172a; /* Professional dark sidebar */
    }

    body {
        background-color: var(--bg-canvas) !important;
        font-family: 'Inter', sans-serif !important;
        color: var(--text-dark) !important;
        -webkit-font-smoothing: antialiased;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: 'Montserrat', sans-serif;
        font-weight: 800;
        letter-spacing: -0.2px;
        color: var(--text-dark);
    }

    /* Top Header Bar */
    #header {
        background-color: var(--sidebar-dark) !important;
        border-bottom: 4px solid var(--pf-yellow) !important;
        height: 60px !important;
    }

    #header h1 {
        top: 12px !important;
        left: 20px !important;
    }

    #header h1 a {
        color: #ffffff !important;
        font-family: 'Montserrat', sans-serif !important;
        font-weight: 900;
        text-transform: uppercase;
        font-size: 18px !important;
        letter-spacing: 0.5px;
    }

    /* Top User Nav Menu */
    #user-nav {
        background-color: var(--sidebar-dark) !important;
        border-bottom: 1px solid rgba(255,255,255,0.05) !important;
        top: 0 !important;
    }

    #user-nav > ul > li > a {
        color: #94a3b8 !important;
        font-weight: 600 !important;
        font-family: 'Inter', sans-serif !important;
    }

    #user-nav > ul > li > a:hover {
        color: #ffffff !important;
        background-color: rgba(255,255,255,0.05) !important;
    }

    /* Modern Dark Sidebar with Perfect Contrast */
    #sidebar {
        background: var(--sidebar-dark) !important;
        border-right: 1px solid var(--panel-border) !important;
        padding-top: 20px;
    }

    #sidebar > ul > li {
        border-bottom: 1px solid rgba(255,255,255,0.03) !important;
        border-top: 1px solid rgba(0,0,0,0.1) !important;
    }

    #sidebar > ul > li > a {
        color: #94a3b8 !important; /* High contrast clean grey */
        font-family: 'Montserrat', sans-serif !important;
        font-weight: 700;
        font-size: 11px;
        letter-spacing: 0.5px;
        padding: 15px 20px !important;
        transition: all 0.2s ease;
    }

    #sidebar > ul > li.active > a, #sidebar > ul > li:hover > a {
        background-color: rgba(255,255,255,0.05) !important;
        color: #ffffff !important;
        border-left: 4px solid var(--pf-yellow) !important;
    }

    /* Main Content Styling */
    #content {
        background: var(--bg-canvas) !important;
    }

    #content-header {
        background-color: #ffffff !important;
        border-bottom: 1px solid var(--panel-border) !important;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    #breadcrumb {
        background-color: #ffffff !important;
        border-bottom: 1px solid var(--panel-border) !important;
    }

    #breadcrumb a.current {
        color: var(--pf-purple) !important;
        font-weight: 700;
    }

    /* Quick Action Buttons (Upper Row) */
    .quick-actions li {
        border: 1px solid var(--panel-border) !important;
        border-radius: 12px !important;
        box-shadow: 0 4px 15px rgba(82, 43, 122, 0.05) !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease !important;
    }

    .quick-actions li:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 24px rgba(82, 43, 122, 0.12) !important;
    }

    .quick-actions li a {
        color: #ffffff !important;
        font-family: 'Montserrat', sans-serif !important;
        font-weight: 700 !important;
        font-size: 13px !important;
    }

    /* Custom PF Theme assignments for quick actions */
    .quick-actions li.bg_ls { background-color: var(--pf-purple) !important; }
    .quick-actions li.bg_lo { background-color: #5c30b5 !important; } /* Alternate purple */
    .quick-actions li.bg_lg { background-color: #7c3aed !important; } /* Violet */
    .quick-actions li.bg_lb { background-color: var(--pf-yellow) !important; }
    .quick-actions li.bg_lb a { color: var(--text-dark) !important; }

    .quick-actions li .label-important {
        background-color: var(--pf-yellow) !important;
        color: var(--text-dark) !important;
        font-weight: 800 !important;
    }
    .quick-actions li.bg_lb .label-important {
        background-color: var(--pf-purple) !important;
        color: #ffffff !important;
    }

    /* Widget Boxes (SaaS Flat Card Style) */
    .widget-box {
        background: #ffffff !important;
        border: 1px solid var(--panel-border) !important;
        border-radius: 16px !important;
        box-shadow: 0 10px 30px rgba(82, 43, 122, 0.03) !important;
        overflow: hidden !important;
        margin-bottom: 30px !important;
    }

    .widget-title {
        background-color: #faf9fc !important; /* Modern off-white header */
        border-bottom: 1px solid var(--panel-border) !important;
        color: var(--text-dark) !important;
        padding: 12px 15px !important;
    }

    .widget-title h5 {
        color: var(--text-dark) !important;
        font-family: 'Montserrat', sans-serif !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        font-size: 13px !important;
        margin: 0 !important;
        line-height: 20px !important;
    }

    .widget-title span.icon {
        border-right: 1px solid var(--panel-border) !important;
        color: var(--pf-purple) !important;
        padding: 12px 15px !important;
    }

    /* Redesigned Site Stats Grid (High Contrast KPI Cards) */
    .site-stats {
        margin: 0 !important;
        padding: 0 !important;
        list-style: none !important;
        display: grid !important;
        grid-template-columns: 1fr 1fr !important;
        gap: 15px !important;
    }

    .site-stats li {
        background: #fdfbfe !important;
        border: 1px solid var(--panel-border) !important;
        border-radius: 12px !important;
        padding: 20px 10px !important;
        margin: 0 !important;
        text-align: center !important;
        transition: all 0.2s ease;
    }

    .site-stats li:hover {
        border-color: var(--pf-purple);
        transform: translateY(-2px);
    }

    .site-stats li i {
        font-size: 24px !important;
        color: var(--pf-purple) !important;
        margin-bottom: 8px !important;
        display: block !important;
    }

    .site-stats li strong {
        font-family: 'Montserrat', sans-serif !important;
        font-size: 24px !important;
        color: var(--text-dark) !important;
        display: block !important;
        margin-bottom: 3px !important;
    }

    .site-stats li small {
        color: var(--text-muted) !important;
        font-size: 11px !important;
        text-transform: uppercase !important;
        font-weight: 700 !important;
        letter-spacing: 0.5px !important;
        display: block !important;
    }

    /* To-Do & Post Lists */
    .todo ul li {
        border-bottom: 1px solid var(--panel-border) !important;
        background: #ffffff !important;
    }

    .recent-posts li {
        border-bottom: 1px solid var(--panel-border) !important;
    }

    .label-success {
        background-color: var(--pf-purple) !important;
        color: #ffffff !important;
        font-weight: 800;
    }

    .label-info {
        background-color: var(--pf-yellow) !important;
        color: var(--text-dark) !important;
        font-weight: 800 !important;
    }

    /* Footer matching the main website footer */
    #footer {
        background-color: var(--sidebar-dark) !important;
        color: #94a3b8 !important;
        border-top: 4px solid var(--pf-yellow) !important;
        padding: 25px 0 !important;
        font-size: 13px !important;
    }
</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Services', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["services"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      pieHole: 0.4,
                      colors: ['#522b7a', '#ffcc00', '#7c3aed', '#0099a8', '#64748b'],
                      backgroundColor: 'transparent',
                      chartArea: { width: '90%', height: '80%' },
                      legend: { textStyle: { color: '#230842', fontName: 'Inter' } }
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>
<!-- Visit codeastro.com for more projects -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Services', 'Total Numbers'],
          <?php
            $query="SELECT services, count(*) as number FROM members GROUP BY services";
            $res=mysqli_query($con,$query);
            while($data=mysqli_fetch_array($res)){
              $services=$data['services'];
              $number=$data['number'];
           ?>
           ['<?php echo $services;?>',<?php echo $number;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          width: 710,
          legend: { position: 'none' },
          colors: ['#522b7a'], /* Purple Bars */
          bars: 'vertical', 
          axes: {
            x: {
              0: { side: 'top', label: 'Total'} 
            }
          },
          bar: { groupWidth: "80%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Terms', 'Total Amount',],
          <?php
          $query1 = "SELECT gender, SUM(amount) as numberone FROM members; ";
            $rezz=mysqli_query($con,$query1);
            while($data=mysqli_fetch_array($rezz)){
              $services='Earnings';
              $numberone=$data['numberone'];
           ?>
           ['<?php echo $services;?>',<?php echo $numberone;?>,],   
           <?php   
            }
           ?> 

      <?php
          $query10 = "SELECT quantity, SUM(amount) as numbert FROM equipment";
            $res1000=mysqli_query($con,$query10);
            while($data=mysqli_fetch_array($res1000)){
              $expenses='Expenses';
              $numbert=$data['numbert'];
           ?>
           ['<?php echo $expenses;?>',<?php echo $numbert;?>,],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          width: "1050",
          legend: { position: 'none' },
          colors: ['#7c3aed'], /* Violet/Purple Bars */
          bars: 'horizontal', 
          axes: {
            x: {
              0: { side: 'top', label: 'Total'} 
            }
          },
          bar: { groupWidth: "80%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_y_div'));
        chart.draw(data, options);
      };
    </script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row["gender"]."', ".$row["enumber"]."],";  
                          }  
                          ?>  
                     ]); 

        var options = {
          pieHole: 0.4,
          colors: ['#522b7a', '#ffcc00', '#7c3aed'],
          backgroundColor: 'transparent',
          legend: { textStyle: { color: '#230842', fontName: 'Inter' } }
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

    <script>
       google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([  
                          ['Designation', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result5))  
                          {  
                               echo "['".$row["designation"]."', ".$row["snumber"]."],";  
                          }  
                          ?>  
                     ]); 

        var options = {
          pieHole: 0.4,
          colors: ['#522b7a', '#ffcc00', '#7c3aed', '#0099a8'],
          backgroundColor: 'transparent',
          legend: { textStyle: { color: '#230842', fontName: 'Inter' } }
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart2022'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Sache Fitness</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php include 'includes/topheader.php'?>
<!--close-top-Header-menu-->

<!-- Visit codeastro.com for more projects -->
<!--sidebar-menu-->
  <?php $page='dashboard'; include 'includes/sidebar.php'?>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="fa fa-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_ls span"> <a href="index.php" style="font-size: 16px;"> <i class="fas fa-user-check"></i> <span class="label label-important"><?php include'actions/dashboard-activecount.php'?></span> Active Members </a> </li>
        <li class="bg_lo span3"> <a href="members.php" style="font-size: 16px;"> <i class="fas fa-users"></i></i><span class="label label-important"><?php include'dashboard-usercount.php'?></span> Registered Members</a> </li>
        <li class="bg_lg span3"> <a href="payment.php" style="font-size: 16px;"> <i class="fa fa-dollar-sign"></i> Total Earnings: $<?php include'income-count.php' ?></a> </li>
        <li class="bg_lb span2"> <a href="announcement.php" style="font-size: 16px;"> <i class="fas fa-bullhorn"></i><span class="label label-important"><?php include'actions/count-announcements.php'?></span>Announcements </a> </li>
      </ul>
    </div>
<!--End-Action boxes-->    

<!--Chart-box-->    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="fas fa-file"></i></span>
          <h5>Services Report</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span8">
              <!-- <div id="piechart"></div>   -->
              <div id="top_x_div" style="width: 700px; height: 290px;"></div>
            </div>
            <div class="span4">
              <!-- Site Stats List Grid -->
              <ul class="site-stats">
                <li class="bg_lh"><i class="fas fa-users"></i> <strong><?php include 'dashboard-usercount.php';?></strong> <small>Total Members</small></li>
                <li class="bg_lg"><i class="fas fa-user-clock"></i> <strong><?php include 'actions/dashboard-staff-count.php';?></strong> <small>Staff Users</small></li>
                <li class="bg_ls"><i class="fas fa-dumbbell"></i> <strong><?php include 'actions/count-equipments.php';?></strong> <small>Available Equipments</small></li>
                <li class="bg_ly"><i class="fas fa-file-invoice-dollar"></i> <strong>$<?php include 'actions/total-exp.php';?></strong> <small>Total Expenses</small></li>
                <li class="bg_lr"><i class="fas fa-user-ninja"></i> <strong><?php include 'actions/count-trainers.php';?></strong> <small>Active Gym Trainers</small></li>
                <li class="bg_lb"><i class="fas fa-calendar-check"></i> <strong><?php include 'actions/count-attendance.php';?></strong> <small>Present Members</small></li>
              </ul>
            </div>
          </div>
        </div>
      </div><!-- Visit codeastro.com for more projects -->
    </div><!-- End of row-fluid -->

    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="fas fa-file"></i></span>
          <h5>Earnings & Expenses Reports</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span12">
              <!-- <div id="piechart"></div>   -->
              <div id="top_y_div" style="width: 700px; height: 180px;"></div>
            </div>
            
          </div>
        </div>
      </div>
    </div><!-- End of row-fluid -->

    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="fas fa-chevron-down"></i></span>
            <h5>Registered Gym Members by Gender: Overview</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              
              <div id="donutchart" style="width: 600px; height: 300px;"></div>

            </ul>
          </div>
        </div>
      </div>

      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="fas fa-chevron-down"></i></span>
            <h5>Staff Members by Designation: Overview</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              
            <div id="donutchart2022" style="width: 600px; height: 300px;"></div>
            </ul>
          </div>
        </div>   
      </div>
      </div>
	
<!--End-Chart-box--> <!-- Visit codeastro.com for more projects -->
    <!-- <hr/> -->
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="fas fa-chevron-down"></i></span>
            <h5>Gym Announcement</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>

              <?php
                // Fixed DB connection variable mismatch bug ($conn -> $con)
                include "dbcon.php";
                $qry="SELECT * FROM announcements";
                $result=mysqli_query($con,$qry);
                  
                while($row=mysqli_fetch_array($result)){
                  echo"<div class='user-thumb'> <img width='70' height='40' alt='User' src='../img/demo/av1.jpg'> </div>";
                  echo"<div class='article-post'>"; 
                  echo"<span class='user-info'> By: System Administrator / Date: ".$row['date']." </span>";
                  echo"<p><a href='#'>".$row['message']."</a> </p>";
                }

                echo"</div>";
                echo"</li>";
              ?>

              <a href="manage-announcement.php"><button class="btn btn-warning btn-mini">View All</button></a>
              </li>
            </ul>
          </div>
        </div><!-- Visit codeastro.com for more projects -->
       
         
      </div>
      <div class="span6">
       
      <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="fas fa-tasks"></i></span>
            <h5>Customer's To-Do Lists</h5>
          </div>
          <div class="widget-content">
            <div class="todo">
              <ul>
              <?php

                include "dbcon.php";
                $qry="SELECT * FROM todo";
                $result=mysqli_query($con,$qry);

                while($row=mysqli_fetch_array($result)){ ?>

                <li class='clearfix'> 
                                                                        
                    <div class='txt'> <?php echo $row["task_desc"]?> <?php if ($row["task_status"] == "Pending") { echo '<span class="by label label-info">Pending</span>';} else { echo '<span class="by label label-success">In Progress</span>'; }?></div>
                
               <?php }
                echo"</li>";
              echo"</ul>";
              ?>
            </div>
          </div>
        </div>
       
                </div>
       
      </div> <!-- End of ToDo List Bar -->
    </div><!-- End of Announcement Bar -->
  </div><!-- End of container-fluid -->
</div><!-- End of content-ID -->

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date("Y");?> &copy; Sache Fitness Admin Portal</a> </div>
</div>

<style>
#footer {
  color: white;
}

#piechart {
  width: 800px; 
  height: 280px;  
  margin-left:auto; 
  margin-right:auto;
}
</style>

<!--end-Footer-part-->

<script src="../js/excanvas.min.js"></script> <!-- Visit codeastro.com for more projects -->
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.flot.min.js"></script> 
<script src="../js/jquery.flot.resize.min.js"></script> 
<script src="../js/jquery.peity.min.js"></script> 
<script src="../js/fullcalendar.min.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.dashboard.js"></script> 
<script src="../js/jquery.gritter.min.js"></script> 
<!-- <script src="../js/matrix.interface.js"></script>  -->
<script src="../js/matrix.chat.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/matrix.form_validation.js"></script> 
<script src="../js/jquery.wizard.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/matrix.popover.js"></script> 
<script src="../js/jquery.dataTables.min.js"></script> 
<script src="../js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>