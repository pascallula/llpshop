/*
Theme Name: My Online Shop Product
Description: Used to add function to Toggle Switch Button on Admin Customizer.
*/
jQuery(document).ready(function($){

    $(".my_online_shop_product_toggle_switch_input_value").on("change" , function(e){

        e.preventDefault();
        let item = {
            top_bar_status: $(this).prop('checked'),
        };

        my_online_shop_product_toggle_switch_sendAjax(item);
      
    });

    function my_online_shop_product_toggle_switch_sendAjax(data){
        
        let ajax_url = my_online_shop_product_toggle_button_object.ajax_url;
        let nonce    = $("#my_online_shop_product_toggle_switch_nonce_name").val();

        let transfer_data = {
            action: "my_online_shop_product_toggle_button_setting",
            nonce: nonce,
            values: data,
        }
        $.ajax({
            method: "POST",
            url: ajax_url,
            data: transfer_data,
        }).done(res => {
            if(res){
                $("#my_online_shop_product_toggle_switch_value").val(res);
                $("#my_online_shop_product_toggle_switch_value").change();
            }
        })
    }
});
