<?php 
include '../inc/functions/conection.php';


if(isset($_POST['action'])){//ser invocado por POST
$action=$_POST['action'];
 
    if($action==='insert'){
        $name=$_POST['name'];
        $cost=$_POST['cost'];
        $category=$_POST['category'];
        $description =$_POST['description'];
        $idcreator=filter_var($_POST['idcreator'], FILTER_SANITIZE_NUMBER_INT);
        if($name!=''||$cost!=''||$category!=''||$description!=''){
            if(isset($_FILES['image']['name'])){//start to treat the image
            $temp = explode(".", $_FILES['image']['name']);
            $extension = end($temp);
            $mime = $_FILES['image']['type'];

                if($mime == 'image/jpg' || $mime == 'image/jpeg' || $mime == 'image/pjpg' || $mime == 'image/png' || $mime == 'image/x-png' || $mime == 'image/gif'){
                        if(!is_dir("../img/coursesP")){
                            mkdir("../img/coursesP");
                        }
                        $random1 = rand(1, 999999999);
                        $random2 = rand(1, 999999999);
                        $sdate = date("Y_m_d_H_i_s");
                        $Fname = $sdate . '_' . $random1 . '_' . $random2 . '.' . $extension;
                            if(move_uploaded_file($_FILES['image']['tmp_name'], '../img/coursesP/' . $Fname)){
                                $statement=$conn->prepare('INSERT INTO courses (name,idcreator,cost,img,cat,descript) values (?,?,?,?,?,?)');
                                $statement->bind_param('sissss',$name,$idcreator,$cost,$Fname,$category,$description);
                                $statement->execute();

                                $respuesta=array(
                                    'resultado'=>'done'
                                    );  
                                    $statement->close();
                                    $conn->close();
                            }//end if of moving the file into the server path (route)
                            else{
                                $respuesta=array(
                                    'resultado'=>'noImageUploaded'
                                    );
                            }
                }//end if of Mime evaluation
                else{
                    $respuesta=array(
                        'resultado'=>'Uncompatible mime'
                        );
                }
            }//end if there is no image set by the user
            else{
                $respuesta=array(
                    'resultado'=>'noImageSet'
                    ); 
            } 
        }else{
            $respuesta=array(
                'resultado'=>'empty'
                );  
        }    
        echo json_encode($respuesta);
    }else if($action==='update'){
        $id=$_POST['idcourse'];
        $name=$_POST['name'];
        $cost=$_POST['cost'];
        $category=$_POST['category'];
        $description =$_POST['description'];
        if($name!=''||$id!=''||$cost!=''||$category!=''||$description!=''){
            $statement=$conn->prepare('UPDATE courses name=? cost=? cat=? descript=? SET  WHERE id=?');
            $statement->bind_param('ssssi',$name,$cost,$category,$description,$id);
            $statement->execute();


            if(isset($_FILES['image']['name'])){//if the image changed, make an update
                $temp = explode(".", $_FILES['image']['name']);
                $extension = end($temp);
                $mime = $_FILES['image']['type'];

                if($mime == 'image/jpg' || $mime == 'image/jpeg' || $mime == 'image/pjpg' || $mime == 'image/png' || $mime == 'image/x-png' || $mime == 'image/gif'){
                        $random1 = rand(1, 999999999);
                        $random2 = rand(1, 999999999);
                        $sdate = date("Y_m_d_H_i_s");
                        $Fname = $sdate . '_' . $random1 . '_' . $random2 . '.' . $extension;
                            if(move_uploaded_file($_FILES['image']['tmp_name'], '../img/coursesP/' . $Fname)){
                                $statement=$conn->prepare('UPDATE courses SET img=? WHERE id=?');
                                $statement->bind_param('si',$Fname,$id);
                                $statement->execute();
                            }//end if of moving the file into the server path (route)
                            else{
                                $respuesta=array(
                                    'resultado'=>'noImageUploaded'
                                    );
                            }
                }//end if of Mime evaluation
                else{
                    $respuesta=array(
                        'resultado'=>'Uncompatible mime'
                        );
                }
            }
            $respuesta=array(
                'resultado'=>'updated'
                );  
            $statement->close();
            $conn->close();
        }else{
            $respuesta=array(
                'resultado'=>'empty'
                ); 
        }
        echo json_encode($respuesta);
    }
}//end IF for POST petitions
if(isset($_GET['action'])){//ser invocado por get//TODO:consulta de los cursos existentes
$action=$_GET['action'];
    if($action==='search'){
        $idc=filter_var($_GET['idc'], FILTER_SANITIZE_NUMBER_INT);
        try {
            $statement=$conn->prepare('SELECT name,cost,img,cat,descript FROM courses WHERE id=?');
            $statement->bind_param('i',$idc);
            $statement->execute();
            $statement->bind_result($name,$cost,$img,$cat,$descript);
            $statement->fetch();
            
            $respuesta= array(
                'respuesta'=>'founded',
                'name'=>$name,
                'cost'=>$cost,
                'img'=>$img,
                'cat'=>$cat,
                'descript'=>$descript
            );
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            $respuesta = array(
                'error' => $e->getMessage()
            );
        }
    echo json_encode($respuesta);
    }
    else if($action==='eliminate'){

    }
}//end IF for GET petitions