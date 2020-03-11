$(document).ready(function () {
    $(".btnEdit").on('click', loadData);
    $(".btnN").on('click', newCourse);
});

function loadData(e) {
    $('#newC').find('.modal-title').text('Editar Curso');
    $('#newC-Form').attr('data-action','update');
    const idC=$(e.target).closest('.Course').attr('data-id');
    
    $('#newC-Form').find('#idC').val(idC);
    $.ajax({
        type: "GET",
        url: `./models/productC.php?idc=${idC}&action=search`,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (xhr,status) {
            var response= xhr;
            console.log(response.respuesta);
            if(response.respuesta==='founded'){
            $name=response.name;
            $cost=response.cost;
            $cat=response.cat;
            $descript=response.descript;
            $imgOld=response.img;
            $('#newC-Form').find('#name').val($name);
            $('#newC-Form').find('#cost').val($cost);
            $('#newC-Form').find('#cat').val($cat);
            $('#newC-Form').find('#des').val($descript);
            $('#newC-Form').find('#imgOld').val($imgOld);
        }
            
        // console.log($(e.target).parent().attr('data-name'));//tests to find correct selector
            

        
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