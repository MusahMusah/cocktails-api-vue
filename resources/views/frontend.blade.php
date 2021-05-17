<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Cocktail</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<style>
  html {
    overflow-x: hidden !important;
  }
  body {
    background-color: #222627 !important;
    /* background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(6).jpg'); */
    width: 100%;
    background-position: center;
    background-size: cover;
    overflow-x: hidden !important;
  }
  table {
    /* color: white !important; */
  }
  #table2 {
    color:black !important;
  }
  input {
    /* color : white !important; */
  }
</style>
<body>
  <div id="app"></div>
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
