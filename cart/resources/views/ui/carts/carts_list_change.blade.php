<div class="cart-table" >
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
									<th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><i class="ti-save" id="saveAll" data-url="{{ route('updateall_cart') }}"></i></th>

                                    <th><i class="ti-close"></i></th>

                                </tr>
                            </thead>
                            <tbody>
                                @if( session('cart') != null )
                                    @foreach (session()->get('cart')->products as $productItem)
                                        <tr>
                                            <td class="cart-pic first-row"><img src="{{ $productItem['productIfor']->feature_image_path }}" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5>{{ $productItem['productIfor']->name }}</h5>
                                            </td>
                                            <td class="p-price first-row">{{ number_format($productItem['productIfor']->price) }}</td>
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" id="quantity" data-id="{{ $productItem['productIfor']->id}}"
                                                        value="{{ $productItem['quantity'] }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total-price first-row">{{ number_format($productItem['price']) }} </td>
                                            <td class="close-td first-row"><i class="ti-save"
                                                data-url="{{ route('update_cart', ['id' => $productItem['productIfor']->id]) }}"
                                                id="update_cart">
                                            </i></td>
                                            <td class="close-td first-row"><i data-url="{{ route('delete_cart',['id' => $productItem['productIfor']->id ]) }}" id="delete_cart" class="ti-close"></i></td>

                                        </tr>
                                        
                                    @endforeach
                                @endif
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>{{ number_format(session('cart')->totalQuantity) }}</span></li>
                                    <li class="cart-total">Total <span>{{ number_format(session('cart')->totalPrice) }}</span></li>
                                </ul>
                                <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>