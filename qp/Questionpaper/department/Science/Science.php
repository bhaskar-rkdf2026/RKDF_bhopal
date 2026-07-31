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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.js"></script>
    </head>
    
    <body>
        <!-- This part contains the header section-->
       <?php include '../../include/header.php';
             include '../../include/common.php';
       ?>
        <div class="section bg-white">
            <div class="container" >
                <div class="row" style="box-shadow: 0 2px 10px rgba(0,0,0,0.5); margin-top: 70px; padding:20px;">
                    <div class="col-md-3">
                        <h3 style="text-align: center; font-size: 1.5rem !important;" class="display-4">Questions</h3>
                        <ol id="selectable" class="list-group">
                            <li class="list-group-item list-group-item-action"><a href="../../switchpage/switchmenu.php?page=Engineering">
                                    Engineering</a>
                                </li>
                                <li class="list-group-item list-group-item-action"><a href="../../switchpage/switchmenu.php?page=Pharmacy">Pharmacy</a></li>
                                <li class="list-group-item list-group-item-action"><a href="../../switchpage/switchmenu.php?page=Agriculture">Agriculture</a></li>
                                <li class="list-group-item list-group-item-action"><a href="../../switchpage/switchmenu.php?page=Polytechnic">Polytechnic</a></li>
                                <li class="list-group-item list-group-item-action"><a href="../../switchpage/switchmenu.php?page=M.Tech">M.Tech</a></li>
                               <li class="list-group-item list-group-item-action"><a href="../../switchpage/switchmenu.php?page=Computer-Application"><p>Comp.<br> Application</p></a></li>
                               <li class="list-group-item list-group-item-action"><a href="../../switchpage/switchmenu.php?page=Management">Management</a></li>
                               <li class="list-group-item list-group-item-action"><a href="../../switchpage/switchmenu.php?page=Architecture">Architecture</a></li>
                               <li class="list-group-item list-group-item-action active"><a  class="text-white" href="../../switchpage/switchmenu.php?page=Science">Science</a></li>
                               <li class="list-group-item list-group-item-action"><a href="../../switchpage/switchmenu.php?page=Commerce">Commerce</a></li>
                                <li class="list-group-item list-group-item-action"><a href="../../switchpage/switchmenu.php?page=Education">Education</a></li>
                        </ol>
                    </div>
                    <div class="col-md-9">
                         
                        <div class="accordion" id="accordionExampleParent">
                                  <button class="btn btn-block btn-primary" type="button" data-toggle="collapse" data-target="#collapseChildOne" aria-expanded="true" aria-controls="collapseChildOne">
                                    BSC
                                  </button>
                        <div  id="collapseChildOne" class="collapse show" aria-labelledby="headingChildOne" data-parent="#accordionExampleParent">
                            <div  class="accordion" id="accordionExample">
                            <div class="card wow fadeInUp" data-wow-delay="0.1s">
                              <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Physics
                                  </button>
                                </h2>
                              </div>

                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                        <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                while($row= $stmt->fetch())
                                {
                                          ?>
                                    <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="BPY" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                <?php } ?>
                                      </div>
                              </div>
                            <div class="card wow fadeInUp" data-wow-delay="0.3s">
                                <div class="card-header" id="headingTwo">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Zoology
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                       <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                                       <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="BSZ" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div>
                            <div class="card wow fadeInUp" data-wow-delay="0.7s">
                                <div class="card-header" id="headingFour">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                     Chemistry
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                  <div class="card-body">
                                   <ul>
                                        <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                                        <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="BCH" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                <?php } ?>
                                    </ul> 
                                  </div>
                                </div>
                              </div>
                                <div class="card wow fadeInUp" data-wow-delay="0.7s">
                                <div class="card-header" id="headingFive">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                      Electronics
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                  <div class="card-body">
                                  <ul>
                                        <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                              <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="BEC" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                <?php } ?>
                                    </ul>  
                                  </div>
                                </div>
                              </div>
                                <div class="card wow fadeInUp" data-wow-delay="0.7s">
                                <div class="card-header" id="headingSix">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                      Computer Science
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                  <div class="card-body">
                                   <ul>
                                        <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                                       <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="BCS" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                <?php } ?>
                                    </ul> 
                                  </div>
                                </div>
                              </div>
                                <div class="card wow fadeInUp" data-wow-delay="0.7s">
                                <div class="card-header" id="headingSeven">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                      Botony
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                  <div class="card-body">
                                   <ul>
                                        <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                                <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="BSB" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                <?php } ?>
                                    </ul>  
                                  </div>
                                </div>
                              </div>
                                <div class="card wow fadeInUp" data-wow-delay="0.7s">
                                <div class="card-header" id="headingEight">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                      Micro-Biology
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                  <div class="card-body">
                                   <ul>
                                        <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                                <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="BMB" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                <?php } ?>
                                    </ul>  
                                  </div>
                                </div>
                              </div>
                                <div class="card wow fadeInUp" data-wow-delay="0.7s">
                                <div class="card-header" id="headingNine">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                      Bio-Technology
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                  <div class="card-body">
                                   <ul>
                                        <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                                <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="BBT" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                <?php } ?>
                                    </ul>  
                                  </div>
                                </div>
                              </div>
                        </div>
                        </div>
                    </div>
                          
                        <button style="margin:10px 0px  0px 0px" class="btn btn-block btn-primary" type="button" data-toggle="collapse" data-target="#collapseChildTwo" aria-expanded="true" aria-controls="collapseChildTwo">
                                    MSC
                        </button>
                            <div  id="collapseChildTwo" class="collapse" aria-labelledby="headingChildTwo" data-parent="#accordionExampleParent">
                                <div  class="accordion" id="accordionExampleTwo" >
                                <div class="card wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card-header" id="headingTabOne">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTabOne" aria-expanded="false" aria-controls="collapseTabOne">
                                      Physics
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseTabOne" class="collapse show" aria-labelledby="headingTabOne" data-parent="#accordionExampleTwo">
                                  <div class="card-body">
                                       <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                                       <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="MPY" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div>
                            <div class="card wow fadeInUp" data-wow-delay="0.3s">
                                <div class="card-header" id="headingTabTwo">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTabTwo" aria-expanded="false" aria-controls="collapseTabTwo">
                                      Zoology
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseTabTwo" class="collapse" aria-labelledby="headingTabTwo" data-parent="#accordionExampleTwo">
                                  <div class="card-body">
                                       <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                                       <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="MSZ" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div>
                            <div class="card wow fadeInUp" data-wow-delay="0.7s">
                                <div class="card-header" id="headingTabThree">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTabThree" aria-expanded="false" aria-controls="collapseTabThree">
                                     Chemistry
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseTabThree" class="collapse" aria-labelledby="headingTabThree" data-parent="#accordionExampleTwo">
                                  <div class="card-body">
                                   <ul>
                                        <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                                        <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="MCH" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                <?php } ?>
                                    </ul> 
                                  </div>
                                </div>
                              </div>
                                <div class="card wow fadeInUp" data-wow-delay="0.7s">
                                <div class="card-header" id="headingTabFour">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTabFour" aria-expanded="false" aria-controls="collapseTabFour">
                                      Environment
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseTabFour" class="collapse" aria-labelledby="headingTabFour" data-parent="#accordionExampleTwo">
                                  <div class="card-body">
                                  <ul>
                                        <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                              <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="MES" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                <?php } ?>
                                    </ul>  
                                  </div>
                                </div>
                              </div>
                                <div class="card wow fadeInUp" data-wow-delay="0.7s">
                                <div class="card-header" id="headingTabFive">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTabFive" aria-expanded="false" aria-controls="collapseTabFive">
                                      Geology
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseTabFive" class="collapse" aria-labelledby="headingTabFive" data-parent="#accordionExampleTwo">
                                  <div class="card-body">
                                   <ul>
                                        <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                                       <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="MSG" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                <?php } ?>
                                    </ul> 
                                  </div>
                                </div>
                              </div>
                                <div class="card wow fadeInUp" data-wow-delay="0.7s">
                                <div class="card-header" id="headingTabSix">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTabSix" aria-expanded="false" aria-controls="collapseTabSix">
                                      Botony
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseTabSix" class="collapse" aria-labelledby="headingTabSix" data-parent="#accordionExampleTwo">
                                  <div class="card-body">
                                   <ul>
                                        <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                                <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="MSB" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                <?php } ?>
                                    </ul>  
                                  </div>
                                </div>
                              </div>
                                <div class="card wow fadeInUp" data-wow-delay="0.7s">
                                <div class="card-header" id="headingTabSeven">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTabSeven" aria-expanded="false" aria-controls="collapseTabSeven">
                                      Micro-Biology
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseTabSeven" class="collapse" aria-labelledby="headingTabSeven" data-parent="#accordionExampleTwo">
                                  <div class="card-body">
                                   <ul>
                                        <?php
                                $stmt=$db->prepare("select year from qpyear");
                                $stmt->execute();
                                        while($row= $stmt->fetch())
                                {
                                          ?>
                                <form method="POST" action="Science_question_page">
                                           <input hidden type="text" value="MMB" name="branch">
                                           <input hidden type="text" value="<?php echo $row['year'];?>" name="year">
                                           <input hidden type="text" value="1" name="sem">
                                           
                                           <button class="year btn btn-link" type="submit"><?php echo $row['year'];?></button>
                                       </form>
                                <?php } ?>
                                    </ul>  
                                  </div>
                                </div>
                              </div>
                          </div>
                            </div>
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
    <script>
       $(function(){
          $("#selectable").selectable({cancel: 'a'});
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
