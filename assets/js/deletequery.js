window.addEventListener('load', function (event) {
 
   
    const delete_btn = document.getElementsByClassName('btn-delete')[0];
    delete_btn.addEventListener("click", function (event) {
      if (!confirm("Are you sure you want to delete this Product?")) {
        event.preventDefault();
      }
    });
   
  })
  