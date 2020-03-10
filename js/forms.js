$(document).ready(function () {

$('#newC-Form').on('submit', courseC);

$('#register-form').on('submit', insU);
});
//Courses control insert,update delete 
function courseC(e){
e.preventDefault();
//console.log($(e.target).attr('data-action'));//gets the actions of the form who trigered this method

        var n=$('#name').val(),
        c=$('#cost').val(),
        ca=$('#cat').val(),
        i=$('#img')[0].files[0],
        d=$('#des').val(),
        action=$(e.target).attr('data-action');
      if(action==='insert'){//actions to insert a new product
          if(n==''||c==''||ca==''||i==''){//valida que alguno venga vacio(actua cuando alguno de los mencionados SI está vacio)
            alert('Datos sin llenar correctamente')
            }else{
                var df=new FormData();//formulario serializado que se le agregarán los datos del form del HTML
                    df.append('name',n);
                    df.append('cost',c);
                    df.append('category',ca);
                    df.append('image',i);
                    df.append('description',d);
                    df.append('action',action);
                    df.append('idcreator',3);
                  //  console.log(...df);//se confirmó que los datos están agregandose correctamente
                  //console.log(df.get('action'));
                  /*for (var value of df.values()) {//check content in form data
                        console.log(value);
                    }*/
                  
                    $.ajax({
                        type: "POST",
                        url: "./models/productC.php",
                        data: df,
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        success: function (xhr,response) {
                          var response= xhr;
                          console.log(response);
                        },
                        error: function (xhr,error,status) { 
                          var response= xhr;
                          console.log('Error' ,response);
                          
                        }
                    });
            }
      }else if(action==='update'){//actions to update a product//TODO: captura de datos despues de la consulta de cursos

      }
}

//control de usuarios insert,update delete
function insU(e) {
    var df;//variable que serán los datos del formulario
    e.preventDefault();
    var n=$('#name').val(),
        a=$('#lname').val(),
        em=$('#email').val(),
        p1=$('#pass').val(),
        p2=$('#re_pass').val(),
        i=$('#img')[0].files[0];//es posible que esté vacia
        if(n!=''&&a!=''&&em!=''&&p1!=''&&p2!=''){//esta vez validamos solo por probar, QUE NO vengan vacios (actuará cuando estne todos llenos)
            if(p1!=p2){
            alert('Contraseñas no coinciden')
            }else{
            df=new FormData();//crear formulario para mandar datos por ajax
            df.append('name',n);
            df.append('lname',a);
            df.append('em',em);
            df.append('pass',p2);
            df.append('img',i);
            df.append('status','estudiante');
            df.append('action','insert');

           /* for (var value of df.values()) {//check content in form data
                console.log(value);
             }*/

            //now you have the data in a pseudo JSON you start the AJAX petition
           $.ajax({
                type: "post",
                url: "./models/usersC.php",
                data: df,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (xhr,status) {
                    var response= xhr;
                    console.log(response);


                  },
                  error: function (xhr,error,status) { 
                    var response= xhr;
                    console.log('Error',response);
                    
                   }
            });
            }

        }else{
            alert('Faltan datos importantes')
        }
}

function checkU(e){
  e.preventDefault();
  var email = $('#mail').val(),
  pass=$('#pass').val();
  if(email==' '||pass==' '){
    alert("Datos sin llenar")
  }else{
    var datos=new FormData();//formulario serializado que se le agregarán los datos del form del HTML
            datos.append('email',email);
            datos.append('pass',pass);
            datos.append('action','check');
  }

}
