<?php
include('header.php');
?>
<form action="usersrch.php" method="get" id="searchForm">
    <input type="text" name="uid" placeholder="Search By ID...">
    <input type="text" name="utitle" placeholder="Search By Name...">
    <input type="text" name="uphn" placeholder="Search By Phone Number...">
    <input type="text" name="ugrp" placeholder="Search By Group ID...">
    <button type="submit">Search</button>
</form>

<script>
// Retrieve the search keyword from the URL and set the search input value
document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("utitle");
    var searchParams = new URLSearchParams(window.location.search);
    var searchKeyword = searchParams.get("utitle");

    if (searchKeyword) {
        searchInput.value = searchKeyword;
    }
});

// Add an event listener to the form to handle search submission
document.getElementById("searchForm").addEventListener("submit", function(event) {
    // Retrieve the search keyword from the input field
    var searchKeyword = document.getElementById("utitle").value;

    // Modify the action attribute of the form to include the search query
    this.action = "?" + new URLSearchParams({ uname: searchKeyword }).toString();
});
</script>
<?php

// Retrieve the search query from the URL
$uid = isset($_GET['uid']) ? $_GET['uid']:0;
$utitle = isset($_GET['utitle']) ? $_GET['utitle']:'';
$uphn = isset($_GET['uphn']) ? $_GET['uphn']: '';
$grpid = isset($_GET['ugrp']) ? $_GET['ugrp'] : 0;


print_r($_GET);
$filter = ($uid > 0)?' AND uid ='. $uid.' ' :' ';
$filter  .= ($utitle > 0)?" AND uname LIKE '%$utitle%' " : ' ';
$filter  .= ($uphn > 0)?" AND phone LIKE '%$uphn%' " : ' ';
$filter .= ($grpid > 0) ? ' AND u.group_id =' . $grpid . ' ' : '';

// Perform the search query (modify the SQL query according to your database structure)
$sql = "SELECT u.*, g.group_tittle FROM users u
LEFT JOIN user_group g ON u.group_id = g.group_id WHERE 1=1 $filter ";
//die($sql);

$result = $conn->query($sql);

// Display search results
echo '<h2>Search Results:</h2>';

if (mysqli_num_rows($result) > 0) {
    // Create an HTML table
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>group Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Date Of Birth</th>
            <th>Phone</th>
            <th>Picture</th>
        </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["uid"] . "</td>";
        echo "<td>" . $row["uname"] . "</td>";
        echo "<td>" . $row["group_tittle"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td><img class='uimg' src='".$row["pp"]."' width='80'></td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>


