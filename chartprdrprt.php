    <?php
    include('header.php');
     
    $dataPoints = array( 
    	array("y" => 3373.64, "label" => "Germany" ),
    	array("y" => 2435.94, "label" => "France" ),
    	array("y" => 1842.55, "label" => "China" ),
    	array("y" => 1828.55, "label" => "Russia" ),
    	array("y" => 1039.99, "label" => "Switzerland" ),
    	array("y" => 765.215, "label" => "Japan" ),
    	array("y" => 612.453, "label" => "Netherlands" )
    );
     $test=array();

    $count=0; 
    $sql = "SELECT COUNT(pid) as totalProduct, product.catid, catagory.cat_title FROM product LEFT JOIN catagory ON product.catid=catagory.catid GROUP BY product.catid;";
    $result = mysqli_query($conn, $sql);

    while($row=mysqli_fetch_array($result))   
    {
        $test[$count]["cat_title"]=$row["cat_title"];
        $test[$count]["y"]=$row["totalProduct"];
        $count=$count+1;

    }

    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
    <script>
    window.onload = function() {
     
    var chart = new CanvasJS.Chart("chartContainer", {
    	animationEnabled: true,
    	theme: "Dark",
    	title:{
    		text: "Products"
    	},
    	axisY: {
    		title: "Product Quantity"
    	},
    	data: [{
    		type: "column",
    		yValueFormatString: "#,##0.## Items",
    		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
    	}]
    });
    chart.render();
     
    }
    function loadtable() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "Report.php", true);
  xhttp.send();
}
    </script>
    </head>
    <body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    <div id="demo">
   <button type="button" onclick="loadtable()">Table</button>
       
    <?php include('footer.php');?>                          