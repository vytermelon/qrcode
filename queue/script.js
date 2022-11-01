// Event handling
document.addEventListener("DOMContentLoaded",
  function (event) {
    
    // Unobtrusive event binding
    document.querySelector("#queue")
      .addEventListener("click", function () {

        // Call server to get the name
        $ajaxUtils
          .sendGetRequest("queuelist.php", 
            function (request) {
              var queuearray =  JSON.parse(request.responseText)
              var rnum = Object.keys(queuearray.result).length;
              var s="";
              for (var i=0; i < rnum; i++) { 
                if (queuearray.result[i]) {
                  s+="<label class='l1'>Name</label><input class='i' name='n_home[]' value='" + queuearray.result[i][0]+"' readonly></input><label class='l2'>URL</label><input class='i'  name='n_away[]' value='" + queuearray.result[i][1]+"' readonly>"; 
                
              document.getElementById("list").innerHTML=s;}
}
            });

        
      });

  

  }
);