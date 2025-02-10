<?php

session_start();
// db connection
require '../../../Configs/db.config.php';


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movieName	= $_POST['moviename'];
    $discription	= $_POST['discription'];
    $imdb	= $_POST['imdb'];
    $playTime	= $_POST['playTime'];
    $topPick	= $_POST['picks'];
    $populer	= $_POST['populer'];
    $genorous	= $_POST['genarous'];
    $trending		= $_POST['trending'];
    $accotors	= $_POST['Accorss'];
    $derector	= $_POST['derector'];
    $recomanded	= $_POST['recomanded'];
    $enabllelity	= $_POST['enabled'];
    $movieLink	= $_POST['mLink'];
    $category	= $_POST['category'];



    if(isset($_FILES['movieImage'])){


        $image = $_FILES['movieImage'];
        $Imgname = $image['name'];
        $imgfiletemp = $image['tmp_name'];
        $filename_separate = explode('.',$Imgname);
        $fileextention = strtolower($filename_separate[1]);
        $extensions = array('jpeg','jpg','png');


        if(in_array($fileextention,$extensions)){
            $uploadimage = '../../../MovieImages/'.$Imgname; // Corrected path
            move_uploaded_file($imgfiletemp,$uploadimage);
            $pathToImg = "./MovieImages/".$Imgname;

            $sql = "INSERT INTO `movies` 
            (`movieName`, `discription`, `imdb`, `playTime`, `topPick`, `populer`, `trending`, `genorous`, `accotors`, `derector`, `recomanded`, `enabllelity`, `movieLink`, `moviImage`, `category`) 
            VALUES 
            (:movieName, :discription, :imdb, :playTime, :topPick, :populer, :trending, :genorous, :accotors, :derector, :recomanded, :enabllelity, :movieLink, :moviImage, :category)";


            $stmt = $conn -> prepare($sql);
            $stmt->execute([
                ':movieName' => $movieName,
                ':discription' => $discription,
                ':imdb' => $imdb,
                ':playTime' => $playTime,
                ':topPick' => $topPick,
                ':populer' => $populer,
                ':trending' => $trending,
                ':genorous' => $genorous,
                ':accotors' => $accotors,
                ':derector' => $derector,
                ':recomanded' => $recomanded,
                ':enabllelity' => $enabllelity,
                ':movieLink' => $movieLink,
                ':moviImage' => $pathToImg,
                ':category' => $category
            ]);

            $_SESSION['Added'] = 1;
            header("Location: ../AddMovie.php");
            echo "Movie added successfully!";


            
        }

    }
}
?>