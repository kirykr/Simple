<script type="text/javascript">

	 $('#computer_brand').on('change', function(e) {
          var id = $(this).val();
          if(id) 
            var element = $('#type_id');
          var endpoint = '/admin/api/v1/brands/'+ id + '/types'
          getComputerCategories(element, endpoint);
        });

        $('#type_id').on('change', function(e) {
          var id = $(this).val();
          if(id) 
            var element = $('#category_id');
          var endpoint = '/admin/api/v1/types/'+ id + '/categories'
          getComputerCategories(element, endpoint);
        });

        $('#category_id').on('change', function(e) {
          var id = $(this).val();
          if(id) 
            var element = $('#model_id');
          var endpoint = '/admin/api/v1/categories/'+ id + '/modells'
          getComputerCategories(element, endpoint);
        });

        function getComputerCategories(element, endpoint) {
          $.ajax({
            method: 'GET',
            url: endpoint,
            success: function(response) {
              if(Array.isArray(response)) {
                element.empty();
                var option = "<option value=''>Choose Options</option>";
                element.append(option);
                response.map(function(item) {

                  var option = "<option value="+item.id+">"+ item.name +"</option>";
                  element.append(option);
                });
              }
            },
            error: function(error) {
              console.log(error)
            }
          })
        }

      // });
</script>