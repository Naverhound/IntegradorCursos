$(document).ready(function () {

$('#formC').on('submit', insC);


});

function insC(e){
e.preventDefault();
        var n=$('#name').val(),
        c=$('#cost').val(),
        ca=$('#cat').val(),
        i=$('#img')[0].files[0],
        d=$('#descript').val();


    if(n==''||c==''||ca==''||i==''){
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
                dataType: "dataType",
                success: function (response) {
                    
                }
            });
    }
}