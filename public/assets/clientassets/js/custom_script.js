 $(function () {


          $( '.to_ck').each( function() {

    CKEDITOR.replace( $(this).attr('id') );
  });

         
         
/********************************************************************************/
         $('.service_delete').click(function()
            {
              
             if (confirm("Press a button!")) 
             {
              var sr_id=$(this).attr('name');

             var sr_delete= $.get( "deleteservice/"+sr_id);
                 sr_delete.done(function( data ) {
                 $('#show_service_list').html(data);
                 });
               }
           
           });

         $('.service_edit').click(function()
            {
              
             
              var sr_id_edit=$(this).attr('name');

             var sr_edit= $.get( "editservice/"+sr_id_edit);
                 sr_edit.done(function( data ) {
                 $('#show_service_list').hide();
                 $('#show_service_list_edit').html(data);
                 });
            
           
           });
/********************************************************************************/ 
 $('.loyalty_delete').click(function()
            {
              
             if (confirm("Press a button!")) 
             {
              var lt_id=$(this).attr('name');

             var lt_delete= $.get( "deleteloyalty/"+lt_id);
                 lt_delete.done(function( data ) {
                 $('#show_loyalty_list').html(data);
                 });
               }
           
           });

         $('.loyalty_edit').click(function()
            {
              
             
              var lt_id_edit=$(this).attr('name');

             var lt_edit= $.get( "editloyalty/"+lt_id_edit);
                 lt_edit.done(function( data ) {
                 $('#show_loyalty_list').hide();
                 $('#show_loyalty_list_edit').html(data);
                 });
            
           
           });
/********************************************************************************/

         
/********************************************************************************/     

      });