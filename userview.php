<?php include('header.php');?>

    
<style>
        /* Style to display the input boxes and button side by side */
        form {
            display: flex;
            gap: 10px; /* Adjust the gap between input boxes */
        }
        ul.pagination {
        display: inline-block;
        padding: 0;
        margin: 20px 0;
        text-align: center; /* Center the pagination buttons */
    }

    ul.pagination li {
        display: inline;
        margin-right: 5px;

    }

    ul.pagination li a {
        color: #333;
        padding: 8px 12px;
        text-decoration: none;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 3px;
    }

    ul.pagination li a:hover {
        background-color: #ddd;
    }

    ul.pagination li.active a {
        background-color: #007bff;
        color: #fff;
    }
    </style> 
<form action="usersrch.php" method="get" id="searchForm">
    <input type="text" name="uid" placeholder="Search By ID...">
    <input type="text" name="utitle" placeholder="Search By Name...">
    <input type="text" name="uphn" placeholder="Search By Phone Number...">
    <input type="text" name="ugrp" placeholder="Search By Group ID...">
    <button type="submit">Search</button>
</form>

<?php

// Pagination variables
$limit = 5; // Number of records per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($current_page - 1) * $limit;

$sql = "SELECT u.*, GROUP_CONCAT(p.pname) AS product_names, g.group_tittle
FROM users u
LEFT JOIN user_group g ON u.group_id = g.group_id
LEFT JOIN assigned a ON a.uid = u.uid
LEFT JOIN product p ON p.pid = a.pid
GROUP BY u.uid
        LIMIT $start_from, $limit;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Create an HTML table
    echo "<table border='1'>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Profile Picture</th>
        <th>Role</th>
        <th>Email</th>
        <th>Address</th>
        <th>Date Of Birth</th>
        <th>Phone Number</th>
        <th>Assined Products</th>
        <th>View</th>
        <th>Delete</th>
        <th>Edit<th>
        </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["uid"] . "</td>";
        echo "<td>" . $row["uname"] . "</td>";
        echo "<td><img class='uimg' src='".$row["pp"]."' width='80'></td>";
        echo "<td>" . $row["group_id"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["product_names"] . "</td>";
        echo "<td><a href='javascript:void(0);' onclick=\"window.open('user.php?id=" . $row["uid"] . "', '_blank', 'width=800,height=500,scrollbars=yes,status=no,resizable=no,screenx='+(screen.width-800)/2+',screeny='+(screen.height-500)/2+'');\" class='fa fa-money text-size-12 text-primary-hover text-nblue' title='View'>View</a></td>";
        //echo "<td><a href='user.php?id=" . $row["uid"] . "'>View</a></td>";
        echo "<td><a href='deleteprod.php?id=" . $row["uid"] . "'>Delete</a></td>";
        echo "<td><a href='updatefrm.php?id=" . $row["uid"] . "'>Edit</a></td>";
        echo "</tr>";
    }
    
    


    echo "</table>";

    // Pagination links
    $sql1 = "SELECT COUNT(uid) AS total FROM users";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $total_records = $row1['total'];
    $total_pages = ceil($total_records / $limit);


    echo "<ul class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        $active_class = ($i == $current_page) ? 'active' : '';
        echo "<li class='$active_class'><a href='userview.php?page={$i}'>{$i}</a></li>";
    }
    echo "</ul>";

} else {
    echo "0 results";
}

mysqli_close($conn);
?>

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
    this.action = "?" + new URLSearchParams({ utitle: searchKeyword }).toString();
});
</script>


<?php include('footer.php'); ?>
