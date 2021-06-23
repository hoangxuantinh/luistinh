@if( session('cart') != null )

<div class="select-items">
    <table>
        <tbody>
            @foreach (session()->get('cart')->products as $cart)
                
            
            <tr>
                <td class="si-pic"><img
                        src="{{ $cart['productInfor']->feature_image_path }}"
                        class="img-card"></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p>{{$cart['quantity']}}
                            * {{ number_format($cart['productInfor']->price) }}</p>
                        <h6>{{ $cart['productInfor']->name }}</h6>
                    </div>
                </td>
                <td class="si-close">
                    <i class="ti-close delete-cart"
                    data-url="{{ route('delete-cart', ['id' => $cart['productInfor']->id]) }}"></i>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
<div class="select-total">
    <span>total:</span>
        @if(session('cart') != null)
            <h5>{{ number_format(session()->get('cart')->totalPrice) }}</h5>
        @else 
            <h5>0</h5>
            <h1>không có mặt hàng nào</h1>
        @endif
    <input type="number" hidden id="quantity_global" value="{{ session()->get('cart')->totalQuantity }}" >

</div>
@endif