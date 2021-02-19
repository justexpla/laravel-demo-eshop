$(document).ready(function () {

    /* Add to cart action*/
    $('[data-action="add_to_cart"]').click(function (event) {
        let productId = $(this).data('product-id');

        axios.post(`/cart/add/`, {
            'product_id': productId
        }).then((response) => {
            if (response.data.status) {
                $('#cart_items_total').html(response.data.cart_items_total);
                $('#cart_total').html(response.data.cart_total_sum);

                $(`#quantity-${productId}`).html(
                    parseInt($(`#quantity-${productId}`).text()) + 1
                );
            }
        });
    });

    /* Remove to cart action*/
    $('[data-action="remove_from_cart"]').click(function (event) {
        let productId = $(this).data('product-id');

        axios.post(`/cart/remove`, {
            'product_id': productId
        }).then((response) => {
            if (response.data.status) {
                $('#cart_items_total').html(response.data.cart_items_total);
                $('#cart_total').html(response.data.cart_total_sum);

                $(`#row-${productId} td:not(.action-row)`).css({'opacity' : 0.3});

                $(`#row-${productId} [data-action="remove_from_cart"]`).hide();
                $(`#row-${productId} [data-action="restore_cart_item"]`).show();
            }
        });
    });

    /* Remove to cart action*/
    $('[data-action="restore_cart_item"]').click(function (event) {
        let productId = $(this).data('product-id');
        let quantity = $(this).data('quantity');

        axios.post(`/cart/add`, {
            'product_id': productId,
            'quantity': quantity
        }).then((response) => {
            if (response.data.status) {
                $('#cart_items_total').html(response.data.cart_items_total);
                $('#cart_total').html(response.data.cart_total_sum);

                $(`#row-${productId} td:not(.action-row)`).css({'opacity' : 1});

                $(`#row-${productId} [data-action="remove_from_cart"]`).show();
                $(`#row-${productId} [data-action="restore_cart_item"]`).hide();
            }
        });
    });

    /* Reset cart action*/
    $('#reset_cart').click(function (event) {
        axios.post(`/cart/reset`).then((response) => {
            document.location = '/';
        });
    });

    $('[data-action="update_quantity"]').change(function (event) {
        var quantity = $(this).val();

        if(quantity < 1) {
            event.preventDefault();
            $(this).val(1);
            return false;
        }

        var productId = $(this).data('product-id');

        axios.post(`/cart/update`, {
            'quantity': quantity,
            'product_id': productId
        }).then((response) => {
            if (response.data.status) {
                $('#cart_items_total').html(response.data.cart_items_total);
                $('#cart_total').html(response.data.cart_total_sum);

                $(`#quantity-${productId}`).html(
                    response.data.new_quantity
                );

                $('[data-action="restore_cart_item"]').data('quantity', response.data.new_quantity);
            }
        });
    });
});
