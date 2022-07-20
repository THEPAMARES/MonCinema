<?php 
include_once "inc/head.inc.php";
include_once "inc/header.inc.php"; 
// echo "<pre>";
//     print_r($_POST);
//     print_r($_FILES);
// echo "</pre>";
?>

<div class= container>
  <form method="post" action="" enctype="multipart/form-data">
    <fieldset>

      <div class="form-group">
          <label class="col-form-label mt-4" for="inputDefault">Titre</label>
          <input type="text" class="form-control" id="inputDefault" name="title">
      </div>  
    
      <div class="form-group">
          <label class="col-form-label mt-4" for="inputDefault">Date de réalisation</label>
          <input type="text" class="form-control" id="inputDefault" name="date_release">
      </div>  

      <div class="form-group">
        <label for="Textarea" class="form-label mt-4">Resumé</label>
        <textarea class="form-control" id="Textarea" rows="3" name="summary"></textarea>
      </div>

      <div class="form-group">
        <label for="formFile" class="form-label mt-4">Affiche</label>
        <input class="form-control" type="file" id="file" name="poster">
      </div>

      <div class="mt-5">
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <input type="submit" class="btn btn-info">
      </div>

    </fieldset>
  </form>
</div>


<?php 
include_once("inc/footer.inc.php"); ?>
