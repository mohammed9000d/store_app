<div class="cart" data-toggle="inactive">
    <div class="label">
        <i class="ion-bag"></i> {{ $total }}
    </div>

    <div class="overlay"></div>

    <div class="window">
        <div class="title">
            <button type="button" class="close"><i class="ion-android-close"></i></button>
            <h4>Shopping cart</h4>
        </div>

        <div class="content">
            @foreach($cart as $item)
                <div class="media">
                    <div class="media-left">
                        <a href="{{ route('product-details', $item->product->id) }}">
                            <img class="media-object" src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}"/>
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $item->product->name }}</h4>
                        <p class="price">${{ $item->product->price }}</p>
                    </div>
                    <div class="controls">
                        <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-default btn-sm" type="button" data-action="minus"><i
                          class="ion-minus-round"></i></button>
                </span>
                            <input type="text" class="form-control input-sm" placeholder="Qty" value="{{ $item->quantity }}" readonly="">
                            <span class="input-group-btn">
                  <button class="btn btn-default btn-sm" type="button" data-action="plus"><i class="ion-plus-round"></i></button>
                </span>
                        </div><!-- /input-group -->

                        <a href="#remove"> <i class="ion-trash-b"></i> Remove </a>
                    </div>
                </div>
            @endforeach


        </div>

        <div class="checkout container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 align-right">
                    <a class="btn btn-primary" href="checkout/"> Checkout order </a>
                </div>
            </div>
        </div>
    </div>
</div>
