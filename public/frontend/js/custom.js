$(document).ready(function () {

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $('.addCartBtn').click(function (e) { 
            e.preventDefault();
            
            var prod_id = $(this).closest('.prod-data').find('.prod-id').val();
            var prod_qty = $(this).closest('.prod-data').find('.qty-input').val();

            
            $.ajax({
                type: "POST",
                url: "/add-to-cart",
                data: {
                    'prod_id' : prod_id,
                    'prod_qty' : prod_qty,
                }, 
                success: function (response) {
                    swal(response.status);
                    
                }
            });
        });

        $('.increment-btn').click(function (e) { 
            e.preventDefault();

            var inc_value = $(this).closest('.prod-data').find('.qty-input').val();
            var value = parseInt(inc_value);
            value = isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
                $(this).closest('.prod-data').find('.qty-input').val(value);
            }
            
        });

        $('.decrement-btn').click(function (e) { 
            e.preventDefault();

            
            var dec_value = $(this).closest('.prod-data').find('.qty-input').val();
            var value = parseInt(dec_value);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                $(this).closest('.prod-data').find('.qty-input').val(value);
            }
            
        });

        $('.delete-cart-item').click(function (e) { 
            e.preventDefault();

            var prod_id = $(this).closest('.prod-data').find('.prod-id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); 
            $.ajax({
                type: "POST",
                url: "delete-cart-item",
                data: {
                    'product_id' : prod_id,
                },
                success: function (response) {
                    window.location.reload();
                    swal("", response.status,"success");
                }
            });
            
        });

        $('.change-qty').click(function (e) { 
            e.preventDefault();
            var prod_id = $(this).closest('.prod-data').find('.prod-id').val();
            var prod_qty = $(this).closest('.prod-data').find('.qty-input').val();
            data = {
                'prod_id' : prod_id,
                'prod_qty' : prod_qty,
            };
            $.ajax({
                type: "POST",
                url: "update-cart",
                data: data,
                success: function (response) {
                    window.location.reload();
                    
                }
            });
        });

        $('.stock-out').click(function (e) { 
            e.preventDefault();
            swal("Out of stock!");
        });

        
    });
   