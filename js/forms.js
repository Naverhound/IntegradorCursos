$(document).ready(function () {

$('#newC-Form').on('submit', courseC);

$('#register-form').on('submit', insU);

$('#login-form').on('submit', checkU);
});


//Courses control insert,update delete
function courseC(e){
e.preventDefault();
//console.log($(e.target).attr('data-action'));//gets the actions of the form who trigered this method

        var n=$('#name').val(),
        c=$('#cost').val(),
        ca=$('#cat').val(),
        i=$('#img')[0].files[0],
        i2=$('#img').val(),
        d=$('#des').val(),
        io=$('#imgOld').val(),
        action=$(e.target).attr('data-action');
        const id=$('#idC').val();
      if(action==='insert'){//actions to insert a new product
          if(n==''||c==''||ca==''||i2==''){//valida que alguno venga vacio(actua cuando alguno de los mencionados SI está vacio)
            alert('Datos sin llenar correctamente o falta imagen')
            }else{
              var idu=$('.logo :last-child').attr('data-idu');
                var df=new FormData();//formulario serializado que se le agregarán los datos del form del HTML
                    df.append('name',n);
                    df.append('cost',c);
                    df.append('category',ca);
                    df.append('image',i);
                    df.append('description',d);
                    df.append('action',action);
                    df.append('idcreator',idu);
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
                        success: function (xhr,status) {
                          var response= xhr;

                          console.log(response);
                          if(response.resultado==="done"){
                            
                            $('#newC').find('.modal-title').text('Nuevo Curso');
                            $('#newC-Form').attr('data-action','insert');
                            $('#newC-Form').find('#name').val('');
                            $('#newC-Form').find('#cost').val('');
                            $('#newC-Form').find('#cat').val('');
                            $('#newC-Form').find('#des').val('');
                            window.open('./mycourses.php',"_self");
                          }
                        },
                        error: function (xhr,error,status) {
                          var response= xhr;
                          console.log('Error' ,response);

                        }
                    });
            }
      }else if(action==='update'){//actions to update a product//TODO: captura de datos despues de la consulta de cursos
        
        if(n==''||c==''||ca==''){
          alert('Datos necesarios sin llenar correctamente o falta imagen')
        }else{
          var df=new FormData();//formulario serializado que se le agregarán los datos del form del HTML
            df.append('idc',id);
            df.append('name',n);
            df.append('cost',c);
            df.append('category',ca);
            df.append('image',i);
            df.append('imageOld',io);
            df.append('description',d);
            df.append('action',action);
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
                success: function (xhr,status) {
                  var response= xhr;
                  console.log(response);
                  if(response.resultado==='updated'){
                    window.open('./mycourses.php',"_self");
                  }
                },
                error: function (xhr,error,status) { 
                  var response= xhr;
                  console.log('Error' ,response);
                  
                }
            });
        }
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
  if(email===''||pass===''){
    alert("Datos sin llenar")
  }else{
    var datos=new FormData();//formulario serializado que se le agregarán los datos del form del HTML
            datos.append('email',email);
            datos.append('pass',pass);
            datos.append('action','check');
            $.ajax({
              type:'post',
              url: "./models/usersC.php",
              data: datos,
              dataType: "json",
              processData:false,
              contentType:false,
              success: function(xhr,status){
                var response=xhr;
                console.log(response);
                alert('hola');
                window.open('./index.php',"_self");
              },
              error: function(xhr,error,status){
                var response=xhr;
                console.log('Error',response);
                alert('adios');
              }
            });
  }

}
