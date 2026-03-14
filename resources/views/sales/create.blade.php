@extends('layouts.app')

@section('content')

    <div class="container">

        <h2>Nouvelle Vente</h2>

        <form method="POST" action="{{ route('sales.store') }}">
            @csrf

            <div class="row">

                <div class="col-md-6">

                    <h4>Produits</h4>

                    @foreach($products as $product)

                        <button type="button"
                            onclick="addProduct({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})"
                            class="btn btn-secondary m-1 p-1">

                            <b>{{ $product->name }}</b><br>

                            Prix : {{ $product->price }} <br>

                            @if($product->stock > 5)

                                <span style="color:green;">
                                    Stock : {{ $product->stock }}
                                </span>

                            @elseif($product->stock > 0)

                                <span style="color:orange;">
                                    Stock : {{ $product->stock }}
                                </span>

                            @else

                                <span style="color:red;">
                                    Rupture de stock
                                </span>

                            @endif

                        </button>

                    @endforeach
                </div>

                <div class="col-md-6">

                    <h4>Panier</h4>

                    <table class="table">

                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Qté</th>
                                <th>Prix</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody id="cart">

                        </tbody>

                    </table>

                    <h4>Total : <span id="total">0</span></h4>

                    <input type="hidden" name="products" id="products">

                    <div class="mb-3">

                        <label>Méthode paiement</label>

                        <select name="payement_method" class="form-control">

                            <option value="cash">Cash</option>
                            <option value="mobile_money">Mobile Money</option>

                        </select>

                    </div>

                    <button class="btn btn-primary">
                        Valider Vente
                    </button>

                </div>

            </div>

        </form>

    </div>

    <script>

        let cart = []

        function addProduct(id, name, price) {

            let product = cart.find(p => p.id === id)

            if (product) {

                product.quantity++

            } else {

                cart.push({
                    id: id,
                    name: name,
                    price: price,
                    quantity: 1
                })

            }

            renderCart()

        }

        function increaseQuantity(id) {

            let product = cart.find(p => p.id === id)

            if (product) {
                product.quantity++
            }

            renderCart()
        }

        function decreaseQuantity(id) {

            let product = cart.find(p => p.id === id)

            if (product) {

                product.quantity--

                if (product.quantity <= 0) {
                    cart = cart.filter(p => p.id !== id)
                }
            }

            renderCart()
        }

        function renderCart() {

            let cartTable = document.getElementById("cart")
            cartTable.innerHTML = ""

            let total = 0

            cart.forEach((product, index) => {

                let subtotal = product.price * product.quantity
                total += subtotal

                cartTable.innerHTML += `
                                <tr>

                                <td>${product.name}</td>

                                <td>
                                    <button onclick="decreaseQuantity(${product.id})" class="btn btn-sm btn-danger">-</button>
                                        ${product.quantity}
                                    <button onclick="increaseQuantity(${product.id})" class="btn btn-sm btn-success">+</button>
                                </td>

                                <td>${product.price}</td>

                                <td>${subtotal}</td>

                                <td>
                                <button type="button"
                                onclick="removeProduct(${index})"
                                class="btn btn-danger btn-sm">
                                X
                                </button>
                                </td>

                                </tr>
                                `

            })

            document.getElementById("total").innerText = total
            document.getElementById("products").value = JSON.stringify(cart)

        }

        function removeProduct(index) {

            cart.splice(index, 1)

            renderCart()

        }

    </script>

@endsection