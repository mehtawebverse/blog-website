
        $(document).ready(function () {

            // submit even on adding and updating blog
            $('#blogForm').submit(function (e) {
                e.preventDefault();
                var addButton = $('#abutt');
                addButton.prop('disabled',true);
                // Get form data
                var formData = new FormData($(this)[0]);




                var url = $(this).attr('action');
                // Retrieves the 'action' attribute from the form, which contains the URL for the form submission.
        
                if ($(this).data('updatemode')) {

                   url = window.blogRoute;
                }


                

                // Make AJAX request
                $.ajax({
                    type: 'POST',
                    // url: $(this).attr('action'),
                    url:url,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        addButton.prop('disabled',false);
                        // alert('data saved')
                        console.log(data.success);
                    },
                    error: function (data) {
                        // Handle error response
                        addButton.prop('disabled',false);
                        console.log(data.error);
                    }
                });
            });


          
            // ajax request for submit delete request on blogs and see results after delete without reloading it

            $('.test').submit(function(e){

                e.preventDefault();
                var delData = new FormData(this);
                var $form = $(this);
                // var url = window.blogRoute;
                $.ajax({

                    type: 'POST',
                    url:   $(this).attr('action'),
                    data : delData,
                    cache: false,
                    contentType:false,
                    processData:false,

                    success:function(data){
                        // console.log(data.success);
                       
                        var blogId = $form.data('id');

                        $('#tableId #blog-' + blogId).remove();
                         console.log(data.success);
                    },
                    error:function(data){
                        console.log(data);
                    }

                });

            });

       




        });
   
       