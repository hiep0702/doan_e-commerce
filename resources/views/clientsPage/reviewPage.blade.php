@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/reviewPage.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="container__content">
            <h1>Write Us A Review</h1>
            <label for="">Your Order's Code:</label>
            <input type="text" name="" id="">
            <label for="">Your Product's Name:</label>
            <input type="text">
            <label for="">Overall Rating:</label>
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
            <label for="">Or Leave Us Your Thoughts:</label>
            <textarea name="" id="" cols="100" rows="10"></textarea>
            <button>Submit Review</button>
        </div>
    @stop
