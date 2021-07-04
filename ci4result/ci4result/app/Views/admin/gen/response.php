<!-- 
Through this page 
We add student details in database and then go next page to upload student marks in database. 
-->

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
<!-- fontawesome 4.7 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous" />
   <title>Admin Page!</title>
</head>

<body>
   <div class="bg-primary text-light h1 py-3">
      <div class="container">Admin Panel</div>
   </div>
   <div style="max-width: 600px" class="mx-auto">
      <div class="container py-4">
         <div class="card">
         <div class="card-header">
               <div class="d-flex justify-content-between">
                  <!-- go to admin home -->
                  <a title="Go to Admin Home" class="btn btn-primary" href="<?= site_url('admin'); ?>"
                     data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-home">
                        <span class="d-none d-md-inline-block"> &nbsp; Home</span></i></a>
                  <!-- go to student list -->
                  <a title="Go to Students List" class="btn btn-success" href="<?= site_url('admin/all_stu'); ?>"
                     data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-list">
                        <span class="d-none d-md-inline-block"> &nbsp; Students List</span></i></a>
               </div>
            </div>
            <div class="card-body">
               <?php
              echo $response;
           ?></div>
         </div>
      </div>
   </div>

   <!-- Optional JavaScript; choose one of the two! -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
   </script>

   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  });
      </script></body>
      

</html>