 <!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PhoneBook</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="app">

    <Myheader></Myheader>
    <div class="container">
    <router-view></router-view>
        <Add></Add>
    </div>
    <Myfooter></Myfooter>

</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
<script>
    import Myheader from "../assets/js/components/Myheader";
    import Myfooter from "../assets/js/components/Myfooter";

    export default {
        components: {Myfooter, Myheader}
    }
</script>