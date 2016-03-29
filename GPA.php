
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Duboard </title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->
 <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>

    <!-- END: load jquery -->
    <!-- BEGIN: load jqplot -->
     <link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="js/jqPlot/jquery.jqplot.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>

    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    
    <!-- END: load jqplot -->
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupDashboardChart('chart1');
            setupLeftMenu();
			setSidebarHeight();


        });
		

    </script>

    
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
          <div id="branding">
                <div class="floatleft">
                    <img src="img/duBlogo.png" alt="Logo" width="232" height="67" margin-top="10" /></div>
                <div class="floatright">
                    <div class="floatleft">
                  </div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello </li>
                            
                            <li><a href="index.php">Logout</a></l
                        </ul>
                        <br />
                       
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-form-style"><a href="Overview.php?id=<?php echo $_GET['id'];?>"><span>Overview</span></a></li>
                <li class="ic-dashboard"><a href="PicChart.php?id=<?php echo $_GET['id'];?>"><span>Category Chart</span></a></li>
                <li class="ic-typography"><a href="TestGraph.php?id=<?php echo $_GET['id'];?>"><span>Test Graph</span></a></li>
		  <li class="ic-charts"><a href="HWGraph.php?id=<?php echo $_GET['id'];?>"><span>Homework graph</span></a></li>
               <li class="ic-gpa"><a href="GPA.php?id=<?php echo $_GET['id'];?>"><span>GPA Calculator</span></a></li>
                
             
            </ul>
        </div>
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                  
        
              
                       
                </div>
            </div>
        </div>
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    GPA Calculator</h2>
					
					
					
					
					
					
					
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html
xmlns="http://www.w3.org/1999/xhtml" lang="en-US"><head
profile="http://gmpg.org/xfn/11"><meta
http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>College GPA Calculator</title><meta
name="robots" content="noodp, noydir" /><meta
name="description" content="Want to calculate your study grades? Our free college GPA calculator can help you calculate your grade point average and stay on top of your grades." /><link
rel="stylesheet" href="css/layout1.css" type="text/css" media="screen, projection" /> <!--[if lte IE 8]><link
rel="stylesheet" href="http://cdn.gpacalculator.net/wp-content/themes/thesis_184/lib/css/ie.css" type="text/css" media="screen, projection" /><![endif]--><link
rel="stylesheet" href="http://cdn.gpacalculator.net/wp-content/themes/thesis_184/custom/custom.css" type="text/css" media="screen, projection" /><link
rel="shortcut icon" href="http://cdn.gpacalculator.net/wp-content/uploads/2013/02/gpa-calculator.png" /><link
rel="canonical" href="http://gpacalculator.net/college-gpa-calculator/" /><link
rel="alternate" type="application/rss+xml" title="GPA Calculator RSS Feed" href="http://gpacalculator.net/feed/" /><link
rel="pingback" href="http://gpacalculator.net/xmlrpc.php" /><link
rel="EditURI" type="application/rsd+xml" title="RSD" href="http://gpacalculator.net/xmlrpc.php?rsd" /><link
rel="stylesheet" type="text/css" href="http://cdn.gpacalculator.net/wp-content/plugins/gpa/style.css" media="screen" /><meta
name="google-site-verification" content="DK1GEvaGhzG_E-f65ReuPrJqp2Pzp7gqnRHkPR6IJZY" /><script type='text/javascript' src='http://cdn.gpacalculator.net/wp-content/plugins/gpa/jquery.js?ver=1.7.1'></script><meta
name="msvalidate.01" content="4385507AE6B751A88C7D31FD8D858696" /><link
rel="alternate" type="application/rss+xml" title="GPA Calculator &raquo; College GPA Calculator Comments Feed" href="http://gpacalculator.net/college-gpa-calculator/feed/" /><link
rel='stylesheet' id='digg-digg-css'  href='http://cdn.gpacalculator.net/wp-content/plugins/digg-digg/css/diggdigg-style.css?ver=5.3.6' type='text/css' media='screen' /><script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script><script type='text/javascript'>try{jQuery.noConflict();}catch(e){};</script><script type='text/javascript' src='http://cdn.gpacalculator.net/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script><script type='text/javascript' src='http://cdn.gpacalculator.net/wp-content/plugins/adrotate/library/jquery.clicktracker.js?ver=0.6'></script>
<script type="text/javascript">
var tracker_url = 'http://gpacalculator.net/wp-content/plugins/adrotate/library/clicktracker.php';
</script><meta
name="_awb_version" content="2.0.3" /><style type="text/css" media="all">

</style></head><body
class="custom college-gpa-calculator">

<div
align="center"><p><script type="text/javascript" src="http://cdn.gpacalculator.net/wp-content/plugins/gpa/collegecalc.js"></script></p><div
id="calcframe"></div><p></p>

  
  </div></p>
   
                <div class="block">
                    <div id="chart1">
                    </div>
                </div>
            </div>
           
        </div>
     
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
            You are logged in <a href="#"></a> 
        </p>
    </div>
</body>
</html>						