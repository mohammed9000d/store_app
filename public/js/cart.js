(function($) {
    $('#add-to-cart').on('submit', function(e){
        e.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function(items){
            $('.content').empty();
            for(i in items) {
                // console.log(items[i]);
                data = items[i]
                $('.content').append(`<div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="${data.product.image_url}" alt="${data.product.name}"/>
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">${data.product.name}</h4>
                        <p class="price">${data.product.price }</p>
                    </div>
                    <div class="controls">
                        <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-default btn-sm" type="button" data-action="minus"><i
                          class="ion-minus-round"></i></button>
                </span>
                            <input type="text" class="form-control input-sm" placeholder="Qty" value="${ data.quantity }" readonly="">
                            <span class="input-group-btn">
                  <button class="btn btn-default btn-sm" type="button" data-action="plus"><i class="ion-plus-round"></i></button>
                </span>
                        </div><!-- /input-group -->

                        <a href="#remove"> <i class="ion-trash-b"></i> Remove </a>
                    </div>
                </div>`);
            }
        });
    });
})(jQuery);
