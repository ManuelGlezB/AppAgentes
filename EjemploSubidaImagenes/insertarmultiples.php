<head>
   <link rel="stylesheet" href="css/styles.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<?php 
if(isset($_POST['submit'])){
 
 // Count total files
 $countfiles = count($_FILES['file']['name']);

 // Looping all files
 for($i=0;$i<$countfiles;$i++){
  $filename = $_FILES['file']['name'][$i];
 
  // Upload file
  move_uploaded_file($_FILES['file']['tmp_name'][$i],'images/'.$filename);
 
 }
} 
?>

<form method='post' action='' enctype='multipart/form-data'>
 <input type="file" name="file[]" id="file" multiple accept=".gif,.jpg,.jpeg,.png">

 <input type='submit' name='submit' value='Upload'>
</form>


<h1>Thumbnail gallery</h1>
<p>Point to or tap any small image to see a larger version.</p>
<div class="gallery"></div>

<script>
   var folder = "images/";

   $.ajax({
      url : folder,
      success: function (data) {
         $(data).find("a").attr("href", function (i, val) {
            if( val.match(/\.(jpe?g|png|gif)$/) ) { 
               $(".gallery").append( "<div><img src='"+ folder + val +"'><img src='"+ folder + val +"'></div>" );
            } 
         });
      }
   });
</script>