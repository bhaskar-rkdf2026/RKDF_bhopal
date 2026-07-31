<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.0.943/build/pdf.min.js"></script>
    </head>
    <body>
<?php   
  $msg="";
// setup PDO connection 
$db = new PDO('mysql:host=127.0.0.1;dbname=questionpaper','root','prajesh');  
  
if(isset($_POST['btn'])){
    
    $target= "../images/".basename($_FILES['image']['name']);
    
 $image=$_FILES['image']['name'];
 
 $name=basename($_FILES['image']['name']);
 echo $name;
 
 $type=$_POST['detail'];
    
$stmt = $db->prepare("insert into gallery(image,name,type) values(?,?,?)"); 
  
// Use bindValue function 
$stmt->bindValue(1,$image);
$stmt->bindValue(2,$name);
$stmt->bindValue(3,$type); 
$stmt->execute(); 

if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
{
    $msg="Image moved successfully";
}else
{
    $msg="There was a problem uploading image.";
}
}
?>

 
<form method="post" enctype="multipart/form-data">
    <label for="detail">Select Type:</label>
    <select name="detail" id="detail">
        <option>Background</option>
        <option>Questions</option>
        <option>Books</option>
        <option>Syllabus</option>
    </select>
    <input type="file" name="image"><br><br>
    <button name="btn">Upload</button>
</form>

<?php
$stmt = $db->prepare("SELECT * FROM gallery");
   $stmt->execute() ;
   while($row =$stmt->fetch())
   {
       echo $row[0];
   echo '<img src="../images/'.$row['image'].'" alt="cant show image" style="width:200px;">';
   }
   ?>
    </body>
</html>