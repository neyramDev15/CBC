<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>

body{
    font-family: Arial, sans-serif;
}

.header{
    display:flex;
    justify-content:space-between;
    margin-bottom:30px;
}

.store{
    font-size:20px;
    font-weight:bold;
}

.invoice{
    text-align:right;
}

table{
    width:100%;
    border-collapse:collapse;
}

table, th, td{
    border:1px solid #000;
}

th{
    background:#f2f2f2;
}

th, td{
    padding:8px;
    text-align:center;
}

.total{
    margin-top:20px;
    text-align:right;
    font-size:18px;
}

.footer{
    margin-top:40px;
    text-align:center;
    font-size:14px;
}

</style>

</head>

<body>

<div class="header">

<div>

<div class="store">PC STORE</div>

<p>
Lomé - Togo<br>
Tel : 90 00 00 00
</p>

</div>

<div class="invoice">

<h3>FACTURE</h3>

<p>
N° FACT-{{ str_pad($sale->id,4,'0',STR_PAD_LEFT) }} <br>
Date : {{ $sale->created_at->format('d/m/Y') }}
</p>

</div>

</div>


@if($sale->client)

<p>
<strong>Client :</strong> {{ $sale->client->name }}
</p>

@endif


<table>

<thead>

<tr>
<th>Produit</th>
<th>Quantité</th>
<th>Prix</th>
<th>Total</th>
</tr>

</thead>

<tbody>

@foreach($sale->saleItems as $item)

<tr>

<td>{{ $item->product->name }}</td>

<td>{{ $item->quantity }}</td>

<td>{{ $item->price }}</td>

<td>{{ $item->price * $item->quantity }}</td>

</tr>

@endforeach

</tbody>

</table>


<div class="total">

<strong>Total : {{ $sale->total }} FCFA</strong>

<br><br>

Mode paiement : {{ $sale->payement_method }}

</div>


<div class="footer">

Merci pour votre achat

</div>

</body>
</html>