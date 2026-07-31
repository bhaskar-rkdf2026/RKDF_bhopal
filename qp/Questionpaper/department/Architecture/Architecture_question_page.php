<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
 <link rel="icon" type="image/jpg" href="../../images/rkdflogo.jpg">
        <title>RKDF Question Paper</title>
        <link rel="stylesheet" href="../../css/jquery-ui.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.0.943/build/pdf.min.js"></script>
    <style>
     @media (min-width:300px){
     .questionContent{
          zoom: 33%;
      }
     }
     @media (min-width:375px){
     .questionContent{
          zoom: 38%;
      }
     }
     @media (min-width:425px){
     .questionContent{
          zoom: 50%;
      }
     }
     @media (min-width:768px){
     .questionContent{
          zoom: 65%;
      }
     }
     @media (min-width:1024px){
     .questionContent{
          zoom: 100%;
      }
     }
 </style>
    </head>
    
    <body>
        <!-- This part contains the header section-->
       <?php include '../../include/header.php';
       include '../../include/common.php';
       $branch='';
       $year='';
       $sem='';
        if(isset($_POST['branch'])){
        $branch=$_SESSION['branch']=$_POST['branch'];
        $year=$_SESSION['year']=$_POST['year'];
        $sem=$_SESSION['sem']=$_POST['sem'];
        }if(isset($_SESSION['branch'])){
        $branch=$_SESSION['branch'];
        $year=$_SESSION['year'];
        $sem=$_SESSION['sem'];
       ?>
        <div class="section bg-white">
            <div class="container" >
                <div hidden id="sem"><?php echo $sem;?></div>
                <div hidden id="year"><?php echo $year;?></div>
                <div hidden id="branch"><?php echo $branch;?></div>
                <div class="row" style="box-shadow: 0 2px 10px rgba(0,0,0,0.5); margin-top: 70px; padding:20px;">
                    <div class="col-md-3">
                        <h3 style="text-align: center; font-size: 1.5rem !important;" class="display-4"><?php echo $_SESSION['branch']."-".$_SESSION['year'];?></h3>
                        <ol id="selectable" class="list-group"> 
                            <li class="btn list-group-item list-group-item-action active">Semester 1<sup>st</sup></li>
                            <li class="btn list-group-item list-group-item-action">Semester 2<sup>nd</sup></li>
                            <li class="btn list-group-item list-group-item-action">Semester 3<sup>rd</sup></li>
                            <li class="btn list-group-item list-group-item-action">Semester 4<sup>th</sup></li>
                            <li class="btn list-group-item list-group-item-action">Semester 5<sup>th</sup></li>
                            <li class="btn list-group-item list-group-item-action">Semester 6<sup>th</sup></li>
                            <li class="btn list-group-item list-group-item-action">Semester 7<sup>th</sup></li>
                            <li class="btn list-group-item list-group-item-action">Semester 8<sup>th</sup></li>
                            <li class="btn list-group-item list-group-item-action">Semester 9<sup>th</sup></li>
                            <li class="btn list-group-item list-group-item-action">Semester 10<sup>th</sup></li>
                        </ol>
                    </div>
                    <div class="col-md-9">
                        <div class="accordion" id="accordionExample">
                            <?php $query="select * from questions where branchname LIKE '$branch' AND year LIKE '$year' AND semester LIKE '$sem'"; 
                                  $result= mysqli_query($link, $query);
                                  $count=0;
                                  $semVal=0;
                                  if($sem%2==1)
                                     {
                                         $semVal=1;
                                     }elseif ($sem%2==0) {
                                         $semVal=2;
                                     }
                                  while($row= mysqli_fetch_array($result))
                                  { $count++;
                                     
                            ?> 
                           
                            <div class="card" >
                              <div class="card-header" id="heading<?php echo $row['id'] ; ?>">
                                <h2 class="mb-0">
                                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row['id'] ; ?>" aria-expanded="false" aria-controls="collapse<?php echo $row['id'] ; ?>">
                                    <?php echo $branch.$sem.$semVal.$count; ?>
                                  </button>
                                </h2>
                              </div>
                              <div id="collapse<?php echo $row['id'] ; ?>" class="collapse <?php $show=$count; if($show=='1'){echo "show";}else{echo "";} ?>" aria-labelledby="heading<?php echo $row['id'] ; ?>" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="questionContent">
                                 <?php echo "<div id=\"holder".$row['id']."\"></div> <script>
           
            pdfjsLib.getDocument(\"data:".$row['filetype'].";base64,".base64_encode($row['data'])."\").then(doc =>{
        
        var canvasContainer=document.getElementById(\"holder".$row['id']."\");
        for(var num = 1; num <= doc._pdfInfo.numPages; num++)
        {
         doc.getPage(num).then(page => {
            
             
             var myCanvas= document.createElement(\"canvas\");
             var context= myCanvas.getContext(\"2d\");
             
             var viewport=page.getViewport(1);
             myCanvas.width=565;
             myCanvas.height=820;
             
             canvasContainer.appendChild(myCanvas);
             page.render({
                canvasContext:context,
                viewport: viewport
             });
         });
        }
        });
        </script>";?>        </div>
                                </div>
                              </div>
                            </div>
                                  <?php }if($count==0){?>  
                             <!--Displayed when no data is found from database-->
                              <div class="jumbotron alert-warning" role="alert">
                                 <h3 class="mb-0">No data found!</h3>
                             </div>
                            <?php } ?>
                        </div>
                      </div>    
                    </div>
                </div>
            </div>
        </div>
           
           <?php include '../../include/footer.php'; ?>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <script type="text/javascript">
    $(document).ready(function () {
    //Disable full page
    $("body").on("contextmenu",function(e){
        return false;
    })
     });
    </script>
    <script type="text/javascript">
      var header = document.getElementById("selectable");
   var btns = header.getElementsByClassName("list-group-item-action");
    for (var i = 0; i < btns.length; i++) {
     btns[i].addEventListener("click", function() {
     var current = document.getElementsByClassName("active");
     current[1].className = current[1].className.replace("active", "");
      this.className += " active";
  });
}
    $(document).ready(function(){
        $("li").on("click",function(){
            var sem=$("#sem").html();
            var year=$("#year").html();
            var branch=$("#branch").html();
         var semno= $(this).html();
         var semvalue=1;
         if(semno =='Semester 1<sup>nd</sup>'){
             semvalue=1;
         }else if(semno =='Semester 2<sup>nd</sup>'){
             semvalue=2;
         }else if(semno =='Semester 3<sup>rd</sup>'){
             semvalue=3;
         }else if(semno =='Semester 4<sup>th</sup>'){
             semvalue=4;
         }else if(semno =='Semester 5<sup>th</sup>'){
             semvalue=5;
         }else if(semno =='Semester 6<sup>th</sup>'){
             semvalue=6;
         }else if(semno =='Semester 7<sup>th</sup>'){
             semvalue=7;
         }else if(semno =='Semester 8<sup>th</sup>'){
             semvalue=8;
         }
          $("#accordionExample").load("../fetchquestion.php",{
              branch:branch,
              sem:semvalue,
              year:year
          });
        });
    });
    </script>
<script>
 
     document.addEventListener('keydown',anyKey);
     
 function anyKey(ev){
    ev.preventDefault();
    
 }
</script>
</body>
</html>
        <?php }else{ header('location:../../index.php');}?>