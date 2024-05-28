<?php
include('header.php');
?>

    
<div>
        <h1 class="text-center">Users Are Bellow!!!</h1>
    </div> 
    <button id="loaduser" class="btn btn-danger">Load Users</button>
    <div id="userList">
        <h1 class="text-center">To see the products History Please Click The Button!!!</h1>
    </div> 

    <script>
        $(document).ready(function () {
            $("#loaduser").click(function () {
                $.ajax({
                    url: "userview.php",
                    type: "GET",
                    success: function (data) {
                        $("#userList").html(data);
                    },
                    error: function () {
                        console.log("Error fetching product list");
                    }
                });
            });
        });
    </script>
   



<?php
include('footer.php');
?>