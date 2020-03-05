<?php
include '../inc/functions/conection.php';
if(isset($_POST['action'])){
  $action=$_POST['action'];
    if($action==='insert'){
    $nr=$_POST['name'];
    $lnr=$_POST['lname'];
    $er=$_POST['em'];
    $pr=$_POST['pass'];
    $s=$_POST['status'];
        if($nr!=''||$lnr!=''||$er!=''||$pr!=''){

            //start verifying the email existence
                $statement=$conn->prepare("SELECT email FROM users WHERE email=?");
                $statement->bind_param('s',$er);//send the param to the query
                $statement->execute();
                $statement->bind_result($Femail);//catch the query result per param need a variable
                $statement->fetch();
                //after consulting the BD you start verifying if something was found
                if($Femail){//if the mail exists...
                    $respuesta= array(
                        'resultado'=> 'exists'
                    );
                    $statement->close();
                    $conn->close();
                }else{
                //aqui se hace el insert
                $times = array(//amount of times is gonna encrypt the pass
                    'cost' => 12
                );
                $hash_password = password_hash($pr, PASSWORD_BCRYPT, $times);

                $statement=$conn->prepare('INSERT INTO users (name,last_name,password,email,status) VALUES (?,?,?,?,?)');
                $statement->bind_param('sssss',$nr,$lnr,$hash_password,$er,$s);//send the param to the query
                $statement->execute();
                $lastStmtId= $statement->insert_id;
                    $respuesta=array(
                    'resultado'=>'inserted'
                    );

                }//end of else when the user is new

                if(isset($_FILES['img']['name'])){//check if the user sent an image to upload

                    $temp = explode(".", $_FILES['img']['name']);
                    $extension = end($temp);
                    $mime = $_FILES['img']['type'];

                    if($mime == 'image/jpg' || $mime == 'image/jpeg' || $mime == 'image/pjpg' || $mime == 'image/png' || $mime == 'image/x-png' || $mime == 'image/gif'){
                        if(!is_dir("../img/usersP")){
                            mkdir("../img/usersP");
                        }
                        $random1 = rand(1, 999999999);
                        $random2 = rand(1, 999999999);
                        $sdate = date("Y_m_d_H_i_s");
                        $Fname = $sdate . '_' . $random1 . '_' . $random2 . '.' . $extension;
                            if(move_uploaded_file($_FILES['img']['tmp_name'], '../img/usersP/' . $Fname)){
                                $statement=$conn->prepare('UPDATE users SET img = ? WHERE id = ?');
                                $statement->bind_param('si',$Fname,$lastStmtId);
                                $statement->execute();
                            }//end if of moving the file into the server path (route)
                            else{
                                $respuesta=array(
                                    'resultado'=>'noImage'
                                    );
                            }
                    }//end if of Mime evaluation
                }//end if when there is no file loaded by the user

            }

        $statement->close();
        $conn->close();
        echo json_encode($respuesta);
    }else if($action=='check'){
      $email=$_POST['email'];
      $pass=$_POST['pass'];
      if($email!=''||$pass!=''){

      }
    }//if login


}else if(isset($_GET['action'])){

}else{

}
