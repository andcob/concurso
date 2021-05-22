jQuery( document ).ready(function( $ ) {
        
    $('#play-button').click(function(){
        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: '../participantes/lottery',
            success: function(data){
                var newHtml = "";
                if(typeof data.winner.error !== 'undefined'){
                    newHtml = 'Código de Error: '+data.winner.error+' descripción: '+data.winner.error_msg;
                    $('#error').html(newHtml);
                    $('#error').css('visibility', 'visible');
                    console.log(data.winner.error_msg);
                }else {
                    newHtml = '<tr><td>'+data.winner.id+'</td><td>'+data.winner.dni+'</td><td>'+data.winner.name+'</td><td>'+data.winner.ciudade.name+'</td><td>'+data.winner.created+'</td><td>'+data.winner.modified+'</td></tr>';
                    $('#winners-table').append(newHtml);
                }                                   
            }                
        }).fail( function( jqXHR, textStatus, errorThrown ) {
            if (jqXHR.status === 0) {
              console.log('Not connect: Verify Network.');
            } else if (jqXHR.status == 404) {
              console.log('Requested page not found [404]');
            } else if (jqXHR.status == 500) {
              console.log('Internal Server Error [500].');
            } else if (textStatus === 'parsererror') {
              console.log('Requested JSON parse failed.');
            } else if (textStatus === 'timeout') {
              console.log('Time out error.');
            } else if (textStatus === 'abort') {
              console.log('Ajax request aborted.');
            } else {
              console.log('Uncaught Error: ' + jqXHR.responseText);
            }
          });
    });
    
});