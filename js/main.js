$(document).ready(function () {
    $(".btnEdit").on('click', loadData);
    $(".btnN").on('click', newCourse);
});

function loadData(e) {
    $('#newC').find('.modal-title').text('Editar Curso');
    $('#newC-Form').attr('data-action','update');
    $idC= $(e.target).closest('.Course').attr('data-id');
    
    $('#newC-Form').find('#idC').val($idC);
    var df=new FormData();//formulario serializado que se le agregarán los datos del form del HTML
                    df.append('idc',$idC);
                    df.append('action','search');
                   // console.log(...df);//se confirmó que los datos están agregandose correctamente
                  //console.log(df.get('action'));
                  /*for (var value of df.values()) {//check content in form data
                        console.log(value);
                    }*/
    $.ajax({
        type: "GET",
        url: "./models/productC.php",
        data: df,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (xhr,status) {
            var response= xhr;
            console.log(response);
            /*$name= $(e.target).parent().attr('data-name');
            $cost= $(e.target).parent().attr('data-cost');
            $cat= $(e.target).parent().attr('data-cat');
            $descript= $(e.target).parent().attr('data-desc');
            $id=;
            $imgOld=;*/
        // console.log($(e.target).parent().attr('data-name'));//tests to find correct selector
            

        /* $('#newC-Form').find('#name').val($name);
            $('#newC-Form').find('#cost').val($cost);
            $('#newC-Form').find('#cat').val($cat);
            $('#newC-Form').find('#des').val($descript);*/
        },
        error: function (xhr,error,status) { 
            var response= xhr;
            console.log('Error' ,response.error);
            if(response==='nullID'){
                alert('Id de producto inexistente')
            }
            
          }
    });

 
}
function newCourse(e){
    $('#newC').find('.modal-title').text('Nuevo Curso');
    $('#newC-Form').attr('data-action','insert');
    $('#newC-Form').find('#name').val('');
    $('#newC-Form').find('#cost').val('');
    $('#newC-Form').find('#cat').val('');
    $('#newC-Form').find('#des').val('');
}