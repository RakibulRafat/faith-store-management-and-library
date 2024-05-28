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
    $sql = "SELECT COUNT(uid) as totalUsers, users.group_id, user_group.group_tittle FROM users LEFT JOIN user_group ON users.group_id=user_group.group_id GROUP BY users.group_id;";
    $result = mysqli_query($conn, $sql);

    while($row=mysqli_fetch_array($result))   
    {
        $test[$count]["group_tittle"]=$row["group_tittle"];
        $test[$count]["y"]=$row["totalUsers"];
        $count=$count+1;

    }

    ?>
  
    <script>
    window.onload = function() {
     
    var chart = new CanvasJS.Chart("userlist", {
    	animationEnabled: true,
    	theme: "Dark",
    	title:{
    		text: "Users"
    	},
    	axisY: {
    		title: "User Quantity"
    	},
    	data: [{
    		type: "column",
    		yValueFormatString: "#,##0.## Peoples",
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
  xhttp.open("GET", "userReport.php", true);
  xhttp.send();
}
    </script>
    
    <div id="userlist" style="height: 370px; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    <div id="demo">
   <button type="button" onclick="loadtable()">Table</button>
      
    <?php include('footer.php');?>          
   

              