<?php 

// resources/views/recipes/show.blade.php

@extends('layouts.app')

@section('content')
    <h1>{{ $recipe->name }}</h1>
    
    <h3>Ingredients</h3>
    <ul>
        @foreach($recipe->ingredients as $ingredient)
            <li>{{ $ingredient->name }} ({{ $ingredient->pivot->quantity }})</li>
        @endforeach
    </ul>
    
    <h3>Instructions</h3>
    <p>{{ $recipe->instructions }}</p>
@endsection
