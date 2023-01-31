require(['jquery', 
  'Magento_Ui/js/modal/alert',
  'mage/translate'
],
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
                            $(".formdata").hide();
                            $(".box").show();
                            $("#name").append(name)
                            $("#message").append(response.message);
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