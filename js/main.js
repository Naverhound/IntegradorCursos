    $(document).ready(function () {
    console.log($('.logo :last-child()').attr('data-idu'));
    $(".btnEdit").on('click', loadData);
    $(".btnDelete").on('click', deleteData);
    $(".btnN").on('click', newCourse);
    $(".delete").on('click', sendId);
    $(".cart").on('click', sendId);
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
            
            
          }
    });

 
}
function sendId(e) {
    var trigger=$(e.target).parent();//the one who fired the event/function
    //console.log(e.target);
    
    if(trigger.hasClass('delete')){
        //alert('entrando ando')
        console.log(trigger.closest('.Course').attr('data-id'));
        $("#delete").find(".btn-danger").attr('data-id', $(e.target).closest('.Course').attr('data-id'));
    }else if(trigger.hasClass('cart')){
        console.log(trigger.closest('.Course').attr('data-id'));
        $("#shopCart").attr('data-id', $(e.target).closest('.Course').attr('data-id'));//add the course Id to the shopCart modal, in the principal div container, where the modal Id is.
    }    
     
   }
function deleteData(e){
    
    const idC=($(e.target).attr('data-id'));
    console.log(idC);
 $.ajax({
        type: "GET",
        url: `./models/productC.php?idc=${idC}&action=eliminate`,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (xhr,status) {
            var response= xhr;
            console.log(response.respuesta);
            if(response.respuesta==='eliminated'){
                window.open('./mycourses.php',"_self");
            }  
        },
        error: function (xhr,error,status) { 
            var response= xhr;
            console.log('Error' ,response);
            if(response==='nullID'){
                alert('Id de producto inexistente')
            }
            
          }
    });
}
function newCourse(e){
    //some actions here
}