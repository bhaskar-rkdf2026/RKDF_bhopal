<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.0.943/build/pdf.min.js"></script>
    </head>
    <body>
<?php   
  
// setup PDO connection 
$db = new PDO('mysql:host=127.0.0.1;dbname=questionpaper','root','prajesh');  
  
if(isset($_POST['btn'])){
    
    $target= "../department/QuestionFilesStorage/".basename($_FILES['myfile']['name']);
 //Get field
 $field=$_POST['field'];
 //Get branch
 $branch=$_POST['branch'];
 //Get year
 $year=$_POST['year'];
 //Get sem
 $sem=$_POST['sem'];
 //GET file of file to be uploaded
 $name=$_FILES['myfile']['name'];
 
 $type=$_FILES['myfile']['type'];
// GET data from the upload file
 $data=$_FILES['myfile']['name'];
//$data=file_get_contents($_FILES['myfile']['tmp_name']);
    
$stmt = $db->prepare("insert into questions(field,branchname,year,semester,filename,filetype,data) values(?,?,?,?,?,?,?)"); 
  
// Use bindValue function 
$stmt->bindValue(1,$field);
$stmt->bindValue(2,$branch);
$stmt->bindValue(3,$year);
$stmt->bindValue(4,$sem);
$stmt->bindValue(5,$name);
$stmt->bindValue(6,$type);
$stmt->bindValue(7,$data); 
  
    
$stmt->execute(); 

if(move_uploaded_file($_FILES['myfile']['tmp_name'], $target))
{
    $msg="Data moved successfully";
}else
{
    $msg="There was a problem uploading file.";
}

}


?>

 
<form method="post" enctype="multipart/form-data">
    <input type="text" name="field" placeholder="Enter field"><br><br>
    <input type="text" name="branch" placeholder="Enter branch"><br><br>
    <input type="text" name="year" placeholder="Enter year"><br><br>
    <input type="number" name="sem" placeholder="Enter semester"><br><br>
    <input type="file" name="myfile"><br><br>
    <button name="btn">Upload</button>
</form>

<?php
 $stmt=$db->prepare("select * from questions");
 $stmt->execute();
 while($row = $stmt->fetch())
 {
//     echo "<li><a target='_blank' href='data:".$row['filetype'].";base64,".base64_encode($row['data'])."' download >".$row['filename']."</a><br><embed src='data:".$row['filetype'].";base64,".base64_encode($row['data'])."' height='400' width='400'></embed></li>";
echo "<li><a target='_blank' href='../department/QuestionFilesStorage/".$row['data']."' download >".$row['filename']."</a><br><embed src='../department/QuestionFilesStorage/".$row['data']."' height='400' width='400'></embed></li>";

 }
?>
    </body>
</html>