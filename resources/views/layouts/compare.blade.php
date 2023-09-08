@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/compare.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="maintable">
            <table>
                @if ($product_1 !== null && $product_2 !== null)
                    <tr>
                        <th>
                            Image
                        </th>
                        <td id="img" style="background-image: url({{ $product_1->Main_IMG }});">
                            {{-- <img src="{{ $product_1->Main_IMG }}" width="250px" height="300px" alt=""> --}}
                        </td>
                        <td id="img" style="background-image: url({{ $product_2->Main_IMG }});">
                            {{-- <img src="{{ $product_2->Main_IMG }}" width="250px" height="300px" alt=""> --}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td id="nameProduct">
                            {{ $product_1->Name }}
                        </td>
                        <td id="nameProduct">
                            {{ $product_2->Name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Price
                        </th>
                        <td>
                            ${{ $product_1->Export_Price }}
                        </td>
                        <td>
                            ${{ $product_2->Export_Price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Color
                        </th>
                        <td>
                            <div class="color" style="background-color: {{ $product_1->Color }}"></div>
                        </td>
                        <td>
                            <div class="color" style="background-color: {{ $product_2->Color }}"></div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Materials
                        </th>
                        <td>
                            {{ $product_1->Material }}
                        </td>
                        <td>
                            {{ $product_2->Material }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Size
                        </th>
                        <td>
                            {{ $product_1->Size }}
                        </td>
                        <td>
                            {{ $product_2->Size }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                            <a href="{{ url('/client/wishlist/addtowishlist', $product_1->ID) }}"><ion-icon name="heart-outline"></ion-icon></a>
                            <a href="{{ url('/client/wishlist/addtocart', $product_1->ID) }}"><ion-icon name="cart-outline"></ion-icon></a>
                            <a href="{{ url('/client/products/deleteproduct1') }}"><ion-icon name="close-outline"></ion-icon></a>
                        </td>
                        <td>
                            <a href="{{ url('/client/wishlist/addtowishlist', $product_2->ID) }}"><ion-icon name="heart-outline"></ion-icon></a>
                            <a href="{{ url('/client/wishlist/addtocart', $product_2->ID) }}"><ion-icon name="cart-outline"></ion-icon></a>
                            <a href="{{ url('/client/products/deleteproduct2') }}"><ion-icon name="close-outline"></ion-icon></a>
                        </td>
                    </tr>
                @elseif($product_1 !== null && $product_2 == null)
                    <tr>
                        <th>
                        </th>
                        <td>
                            <img src="{{ $product_1->Main_IMG }}" alt="">
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $product_1->Name }}
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Price
                        </th>
                        <td>
                            ${{ $product_1->Export_Price }}
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Color
                        </th>
                        <td>
                            {{ $product_1->Color }}
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Materials
                        </th>
                        <td>
                            {{ $product_1->Material }}
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Size
                        </th>
                        <td>
                            {{ $product_1->Size }}
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                            <a href="{{ url('/client/wishlist/addtowishlist', $product_1->ID) }}"><ion-icon name="heart-outline"></ion-icon></a>
                            <a href="{{ url('/client/wishlist/addtocart', $product_1->ID) }}"><ion-icon name="cart-outline"></ion-icon></a>
                            <a href="{{ url('/client/products/deleteproduct1') }}"><ion-icon name="close-outline"></ion-icon></a>
                        </td>
                        <td>

                        </td>
                    @elseif($product_2 !== null && $product_1 == null)
                    <tr>
                        <th>
                        </th>
                        <td>
                        </td>
                        <td>
                            <img src="{{ $product_2->Main_IMG }}" alt="">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                        </td>
                        <td>
                            {{ $product_2->Name }}

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Price
                        </th>
                        <td>
                        </td>
                        <td>
                            $ {{ $product_2->Export_Price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Color
                        </th>
                        <td>
                        </td>
                        <td>
                            {{ $product_2->Color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Materials
                        </th>
                        <td>
                        </td>
                        <td>
                            {{ $product_2->Material }}

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Size
                        </th>
                        <td>
                        </td>
                        <td>
                            {{ $product_2->Size }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                        </td>
                        <td>
                            <a href="{{ url('/client/wishlist/addtowishlist', $product_2->ID) }}"><ion-icon name="heart-outline"></ion-icon></a>
                            <a href="{{ url('/client/wishlist/addtocart', $product_2->ID) }}"><ion-icon name="cart-outline"></ion-icon></a>
                            <a href="{{ url('/client/products/deleteproduct2') }}"><ion-icon name="close-outline"></ion-icon></a>
                        </td>
                    @else
                    <tr>
                        <th>
                        </th>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Price
                        </th>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Color
                        </th>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Materials
                        </th>
                        <td>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Size
                        </th>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                        </td>
                        <td>
                        </td>
                @endif
            </table>
        </div>
    </div>

@stop
