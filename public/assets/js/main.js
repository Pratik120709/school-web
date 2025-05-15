       
       $(function () {
           $('[data-toggle="tooltip"]').tooltip()
         })

         function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#blah')
                      .attr('src', e.target.result);
              };

              reader.readAsDataURL(input.files[0]);
          }
      }
//permisssion 
         function allcheck() {
           // Get the checkbox
           var checkBox = document.getElementById("all");
           if (checkBox.checked == true){
         	$('.all').prop('checked', 'checked');
         	$('.add-all').prop('checked', 'checked');
         	$('.edit-all').prop('checked', 'checked');
         	$('.view-all').prop('checked', 'checked');
         	$('.delete-all').prop('checked', 'checked');
           } else {
         	$('.all').prop('checked', '');
         	$('.add-all').prop('checked', '');
         	$('.edit-all').prop('checked', '');
         	$('.view-all').prop('checked', '');
         	$('.delete-all').prop('checked', '');
           }
         } 
         function addallcheck() {
           // Get the checkbox
           var checkBox = document.getElementById("add-all");
           if (checkBox.checked == true){
         	$('.add').prop('checked', 'checked');
           } else {
         	$('.add').prop('checked', '');
           }
         } 
         function editallcheck() {
           // Get the checkbox
           var checkBox = document.getElementById("edit-all");
           if (checkBox.checked == true){
         	$('.edit').prop('checked', 'checked');
           } else {
         	$('.edit').prop('checked', '');
           }
         } 
         function viewallcheck() {
           // Get the checkbox
           var checkBox = document.getElementById("view-all");
           if (checkBox.checked == true){
         	$('.view').prop('checked', 'checked');
           } else {
         	$('.view').prop('checked', '');
           }
         } 
         function deleteallcheck() {
           // Get the checkbox
           var checkBox = document.getElementById("delete-all");
           if (checkBox.checked == true){
         	$('.delete').prop('checked', 'checked');
           } else {
         	$('.delete').prop('checked', '');
           }
         } 

         $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
//user
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
   
   
    /*$(".btn-danger").on('click', function(){
       Swal.fire({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, delete it!'
       }).then((result) => {
         if (result.isConfirmed) {
         Swal.fire(
           'Deleted!',
           'Your record has been deleted.',
           'success'
         )
         }
       })
     });*/
     
  
