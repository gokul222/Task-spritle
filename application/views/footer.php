<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>

 <script type="text/javascript">
  $('.other-div').hide();

  $(document).ready(function() {
  $("#FileuploadDoc_change").click(function(){
      $("#image_upload").trigger("click");
   });
  });

  $("input[name='salutation']").change(function(){
   if($(this).val() == 'others')
   {
   	  $('.other-div').show();
   }
   else 
   {
   	   $('.other-div').hide();
   }
});
  //image temp store

  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.card-img-top').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);

    }
}

$("#image_upload").change(function(){
    readURL(this);
});


</script>

 
</body>
</html>