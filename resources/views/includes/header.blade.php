<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/dist-semantic/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  
    <link rel="image_src" type="image/jpeg" href="{{ asset('golgi/images/logo.png')}}" />
    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <!-- Site Properities -->
<!--     <meta name="generator" content="Visual Studio 2015" /> -->
    <title>Dashboard | Online Course</title>
<!--     <meta name="description" content="Golgi Admin Theme" /> -->
<!--     <meta name="keywords" content="html5, ,semantic,ui, library, framework, javascript,jquery,admin,theme" /> -->
<!--     <link href="plugins/chartist/chartist.css" rel="stylesheet" /> -->
<!--     <link href="plugins/datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" /> -->
    <link href="{{ asset('golgi/dist/semantic.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('golgi/css/main.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('golgi/plugins/pacejs/pace.css')}}" rel="stylesheet" />
    <script src="{{ asset('golgi/js/jquery-2.1.4.min.js')}}"></script>
</head>
  <body class="admin">