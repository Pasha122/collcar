<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Coll-Car ADMIN</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       
       <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>

            <header class="header">
     <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="header-logo"><a href="/admin"><img src="/img/logo.svg"></a> </div>
            </div>
            <div class="col-8">
                <nav class="nav">
          <ul class="menu">
             @if (Route::has('login'))
             @auth
            <li class="item active">
              <a href="/admin/details">Запчастини</a>
            </li>
            <li class="item active">
              <a href="/admin/category">Категорії</a>
            </li>
            <li class="item active">
              <a href="/admin/brand">Марки авто</a>
            </li>
            <li class="item">
              <a href="/admin">Працівники</a>
            </li>
            <li class="item">
              <a href="/admin/statistics">Статистика</a>
            </li>
                
               
                    
                        <li class="item">
                          <a href="{{ route('logout') }}">Вийти</a>
                        </li>                 
                    @else
                        <li class="item">
                          <a href="{{ route('login') }}">Вхід</a>
                        </li>
                    @endauth
                @endif
            
          </ul>

          <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
          </div>

        </nav>
            </div>
        </div>
        
        
      
        </div>

      

    </header>



        <!-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

           
        </div> -->
<script type="text/javascript">
    $(document).ready(function(){
  $('.hamburger').on('click', function(){
    document.querySelector(".header").classList.toggle("mobile");
    document.querySelector("body").classList.toggle("hidden");
  });
});
</script>