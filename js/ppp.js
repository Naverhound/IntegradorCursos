$(document).ready(function () {
    $('.ppp').on('click', initializePPP);
});

function initializePPP(e) {
    /*Basic selector in the first two alerts, to verify the id of the course
    and also the id of the current user*/ 
    //alert('fuegooo '+ $('#shopCart').attr('data-id'))//we verfy the id of the product we are attempting to buy
    //alert('usuarioo '+ $('.logo :last-child').attr('data-idu'))//very the id of the user in case of need
    var idc=$('#shopCart').attr('data-id'),
    idu=$('.logo :last-child').attr('data-idu');
    //alert(idc+' '+idu);
    /** Need to generate a "form" to send in the ajax petition
     * to get all the infomation about the product
     * such as name, price, and stuff to prevent the user from changen the data
     * in the browser...
     */
    $.ajax({
        type: "GET",
        url: `./models/productC.php?idc=${idc}&action=search`,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (xhr,status) {
            var response= xhr;
            //console.log(response.respuesta);
            console.log(response);
            if(response.respuesta==='founded'){
                //store in variables all the data retrieved from the db
            $name=response.name;
            $cost=response.cost;
            $cat=response.cat;
            $descript=response.descript;
            $imgOld=response.img;
            //alert('ajas las barajas')
          /**Manually submmit the hidden form in the modal
           * first fill all the input with the data retrived from the db
           * */ 
            var form=$(e.target).closest('.modal-body').find('form');
            //console.log(form);
            $(form).find('#name').val($name);
            $(form).find('#cost').val($cost);
            $(form).find('#descript').val($descript);
            $(form).submit();
            
        }
            
        // console.log($(e.target).parent().attr('data-name'));//tests to find correct selector
            

        
        },
        error: function (xhr,error,status) { 
            var response= xhr;
            console.log('Error' ,response.error);
            
            
          }
    });
}