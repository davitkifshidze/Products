$(document).on('click', '#apply__btn', function(e) {
    e.preventDefault();

    const card = document.getElementById("delete__switcher");

    if(card.selectedIndex === 0) {
        swal("Warning", "Please select an action", "warning");
    }
    else {
        const selected = card.options[card.selectedIndex].value;

        if(selected === 'delete'){

            let checked__items__sku = [];

            $('input[type=checkbox]').each(function () {
                if (this.checked) {
                    let current__checked__box__sku = $(this).data('sku')
                    checked__items__sku.push(current__checked__box__sku);
                }
            });

            if (checked__items__sku.length !== 0){
                $.ajax({
                    type: 'POST',
                    url: '/products/list/delete',
                    data: {sku__data:checked__items__sku},
                    success: function(sku__data) {
                        let sku = jQuery.parseJSON(sku__data);
                        $.each(sku, function(key,value) {
                            $("#" + value).fadeIn(500).delay(1000).fadeOut(500).remove();
                        });
                        swal("Delete", "The product has been successfully removed", "success");
                    }
                });
            }else{
                swal("Warning", "Please select a product to remove", "warning");
            }

        }
    }

})