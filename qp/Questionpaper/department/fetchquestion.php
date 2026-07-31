<?php
 include '../include/common.php';
        $branch=$_POST['branch'];
        $year=$_POST['year'];
        $sem=$_POST['sem'];
        $semVal=0;
        if($branch=='AR')
        {
           if($sem%2==1)
           {
               $semVal=1;
           }elseif ($sem%2==0) {
               
             $semVal=2;
             }
        }
        if(isset($_POST['find']))
        {
            $sem=$_POST['search'];
        }
                                $stmt=$db->prepare("select * from questions where branchname LIKE '$branch' AND year LIKE '$year' AND semester LIKE '$sem'");
                                $stmt->execute();
        $count=0; while($row = $stmt->fetch())
        {               $count++;
              echo          '<div class="card" >
                              <div class="card-header" id="heading'.$row['id'].'"'.'
                                <h2 class="mb-0" style="text-align:center;">
                                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$row['id'].'" aria-expanded="false" aria-controls="collapse'.$row['id'].'">'
                                      .$branch.$sem.$semVal.$count.'
                                  </button></h2>
                              </div>';
                               $show=$count; 
                             echo '<div id="collapse'.$row['id'].'"'; 
                             echo 'class="collapse '; if($show==1){echo 'show';} echo '"';
                             echo 'aria-labelledby="heading'.$row['id'].'" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="questionContent">';
                                 echo "<div id=\"holder".$row['id']."\"></div> <script>
           
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
        </script>";
                                echo ' </div>
                                </div>
                              </div>
                            </div>';
        }if($count==0){
                            echo ' <!--Displayed when no data is found from database-->
                              <div class="jumbotron alert-warning" role="alert">
                                 <h3 class="mb-0">No data found!</h3>
                             </div>';
        } ?>