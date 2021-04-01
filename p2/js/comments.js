var coll = document.getElementById("collapsible");

  coll.addEventListener("click", function() {
    this.classList.toggle("active");
    var comments = document.getElementById("comments")
    
    if (comments.style.display === "block") {
      comments.style.display = "none";
    } else {
      comments.style.display = "block";
    }
  });
