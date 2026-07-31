<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.0.943/build/pdf.min.js"></script>
    </head>
    <body>
        <div id="holder"></div>
<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=questionpaper','root','prajesh');

$id=$_GET['id'];
$stmt=$db->prepare("select * from questions where id=$id");
$stmt->execute();
$row=$stmt->fetch();
//header('Content-Type:'.$row['filetype']);
echo "<script>
           
            pdfjsLib.getDocument(\"data:".$row['filetype'].";base64,".base64_encode($row['data'])."\").then(doc =>{
        
        var canvasContainer=document.getElementById(\"holder\");
        for(var num = 1; num <= doc._pdfInfo.numPages; num++)
        {
         doc.getPage(num).then(page => {
            
             
             var myCanvas= document.createElement(\"canvas\");
             var context= myCanvas.getContext(\"2d\");
             
             var viewport=page.getViewport(1);
             myCanvas.width=750;
             myCanvas.height=1090;
             
             canvasContainer.appendChild(myCanvas);
             page.render({
                canvasContext:context,
                viewport: viewport
             });
         });
        }
        });
        </script>";
?>
    </body>
    
</html>


<p>
                
                </p>