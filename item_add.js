function validateForm() {
    var ititle = document.getElementById("iname");
    var icat = document.getElementById("icg");
    var tarea = document.getElementById("ta");
    var price = document.getElementById("prc");
    var g = document.getElementById("Gift");
    var h = document.getElementById("Homemade");
    var o = document.getElementById("Others");
    var Quatity = document.getElementById("Quantity");
    var comment = document.getElementById("com");
    var location = document.getElementById("loc");
   


    if (ititle.value == "" || icat.value == "" || tarea.value == "" || p.value =="" || g.value =="" || h.value =="" || o.value =="" ||comment.value ==""|| location.value=="") {
      alert("Every field must be filled out");
      return false;
    }
    else{
        true; 
    }
  }