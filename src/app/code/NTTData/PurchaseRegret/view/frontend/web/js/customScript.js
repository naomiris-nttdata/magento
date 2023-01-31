/* require(['jquery', 
  'Magento_Ui/js/modal/alert'],
   function($,alert){
    $(document).ready( function() {
            $("form").on("submit",function (event) { 
                event.preventDefault()
                var name = $("#name").val();
                var form_data = $("#addData").serialize();

               let formdata = $('#addData');
                if(formdata.valid()){
                        jQuery.ajax({
                         url: "formdata",
                         showLoader: true,
                        type: "POST",
                         data: form_data,
                         dataType: "json",
                         success:  function (response) {
                          if(response.success === true){
                             alert({
                                title:`Hi ${name}:`,
                            content: response.message,
                            actions: {
                                always: function(){}
                            }

                             })
      
                          }if (response.success == 'error'){
                            alert({
                                title:`Hi ${name}:`,
                            content: response.message,
                            actions: {
                                always: function(){}
                            }
                             })
                          }
                         }
                     })
                }

                      


            }); 
        
    });
  });
/*   require(["jquery", "jquery/ui",'Magento_Ui/js/modal/alert'
  ],
   function($){
    jQuery(document).ready( function() {
            $("#addData").on("submit",function (event) { 
                event.preventDefault()
                const form_data = $("#addData").serialize()
                const form = $("#addData");
                if(form.validate()){
                    jQuery.ajax({
                     url: "formdata",
                     showLoader: true,
                    type: "POST",
                     data: form_data,
                     dataType: "json",
                     success:  function (response) {      
                        if(response.success === true){
                            alert({
                                title:'hola',
                            content: response.message,
                            actions: {
                                always: function(){}
                            }

                             })
                        }
                    }
                 })

                }

            }); 
        
    });
  }); */



