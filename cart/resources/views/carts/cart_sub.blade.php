@if (session('cart') != null)

<style>
    .si-pic img{
        width: 100px;
        height: 50px;
    }    
</style>   


    
<div class="select-items">
    <table>
        <tbody>
            @foreach (session()->get('cart')->products as $cartItem)
            
            <tr>
                <td class="si-pic"><img src="{{ $cartItem['productIfor']->feature_image_path}}" alt=""></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p>{{ number_format($cartItem['productIfor']->price)}}đ * {{$cartItem['quantity']}}</p>
                        <h6>{{ $cartItem['productIfor']->name }}</h6>
                    </div>
                </td>
                <td class="si-close">
                    <i class="ti-close" data-url="{{ route('delete-cart',['id' => $cartItem['productIfor']->id])}}"></i>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="select-total">
    <span>total:</span>
    @if (session('cart')->totalQuantity > 0)
        <h5>{{ number_format(session('cart')->totalPrice) }}</h5>
        
    @else
        
        <h5></h5>
    @endif
    <input type="number" hidden id="quantity_global" value="{{ session('cart')->totalQuantity }}">
    
</div>

@endif