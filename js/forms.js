$(document).ready(function () {

$('#formC').on('submit', insC);

$('#register-form').on('submit', insU);
});
//para control de cursos, insert,update,delete
function insC(e){
e.preventDefault();
        var n=$('#name').val(),
        c=$('#cost').val(),
        ca=$('#cat').val(),
        i=$('#img')[0].files[0],
        d=$('#descript').val();


    if(n==''||c==''||ca==''||i==''){//valida que alguno venga vacio(actua cuando alguno de los mencionados SI está vacio)
            alert('Datos sin llenar correctamente')
    }else{
        var df=new FormData();//formulario serializado que se le agregarán los datos del form del HTML
            df.append('name',n);
            df.append('cost',c);
            df.append('category',ca);
            df.append('image',i);
            df.append('description',d);
          //  console.log(...df);//se confirmó que los datos están agregandose correctamente
            
            $.ajax({
                type: "POST",
                url: "url",
                data: "data",
                dataType: "json",
                success: function (response) {
                    
                }
            });
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
                    
                    
                }
            });  
            }
            
        }else{
            alert('Faltan datos importantes')
        }
}