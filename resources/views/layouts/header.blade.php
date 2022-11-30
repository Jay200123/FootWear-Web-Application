<style>
    body {
   padding: 0;
    margin: 0;
    background: linear-gradient(to bottom,  #ffffff 0%, #e6e6e6 100%);
    /* background: linear-gradient(to bottom,  white 0%, black 100%); */
   }
 .navbar { 
  /* background: linear-gradient(to bottom, white 0%, black 100%); */
  background-color:black;
  padding: 15px;
  border-radius:5px;
  border:1px solid grey;
  /* box-shadow: 15px 10px; */
 }
 .nav-link, .navbar-brand { color: #fff;
   cursor: pointer;
   } 
 .nav-link { margin-right: 1em !important;
 } 
 .nav-link:hover{ color: #000;
   }
 .navbar-collapse { 
  justify-content: flex-end;
 }
 a{
  color:none;
  text-decoration:none;
 }
 p{
  color:white;
  font-family: sans-serif;
  font-size: 15px;
 }
 li{
  margin-right:25px
 }
</style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<nav class="navbar navbar-expand-md"> 
      <a class="navbar-brand" href="#"> <p><strong>FootWear PH</p></strong></a> 
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
         <span class="navbar-toggler-icon"></span> 
        </button> 
        <div class="collapse navbar-collapse" id="main-navigation"> 
        <ul class="navbar-nav">

        <li class="nav-item"><a class="nav-link" href="{{route('customer.index')}}"><p><strong><i class="fa fa-user" aria-hidden="true"></i>Customer</strong></p></a> </li>

         <li class="nav-item"> <a class="nav-link" href="{{route('employee.index')}}"><p><strong><i class="fa fa-user-md" aria-hidden="true"></i>Employee</strong></p></a> </li> 

        <li class="nav-item"> <a class="nav-link" href="{{route('service.index')}}"><p><strong><i class="fa fa-phone" aria-hidden="true"></i>Services</strong></p></a> </li>

        <li class="nav-item"> <a class="nav-link" href="{{route('product.index')}}"><p><strong><i class="fa fa-product-hunt"  aria-hidden="true"></i>Products</strong></p></a></li>
        </ul> 
        

        <!-- <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
              <li><i class="fa fa-user-circle" aria-hidden="true"><a  href="{{ route('employee.profile') }}"><p><strong>User Profile</strong></p></a></i></li>
              <li><i class="fa fa-power-off" aria-hidden="true"><a  href="{{ route('user.logout') }}"><p><strong>Logout</strong></p></a></i></li>
              @else
            <li><a href="index_signup.html"><span class="glyphicon glyphicon-user"><i class="fa fa-user-plus" aria-hidden="true"></i></span> Sign Up</a></li>
            <li><a href="index_signin.html"><span class="glyphicon glyphicon-log-in"><i class="fa fa-sign-in" aria-hidden="true"></i></span> Login</a></li>
            @endif
          </ul> -->
        </div>
        </nav>