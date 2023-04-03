<html>
<head>
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />

<!-- <style>
p.inline {display: inline-block;}
span { font-size: 13px;}
</style> -->
<style type="text/css" media="print">
    @page 
    {
        size: auto;   
        margin: auto; 
        display: flex;
    }
</style>
<style>
    html,
    body {
      height: 100%;
      width: 100%;
      margin: 0;
    }

    body {
      display: flex;
    }

    div {
      margin: auto;
    }
  </style>
</head>
<body onload="window.print();">

	<div>

    <?php
    session_start();
    if(isset($_SESSION['src'])){
    $src=$_SESSION['src'];
    echo'<img src="'.$src.'">';}
    ?>
	</div>

</body>
</html>