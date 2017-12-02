@extends('centerviews.master')
@section('title', 'login')
@section('view')
<style>
#boxLogin{
   width: 100%;
   height: 100%;
   background: linear-gradient(to bottom right, #22395C, #AFC6D7);
   display: flex;
   align-items: center;
}
#boxLogin .middleButtress {
   height: 270px;
   width: 100%;
}
#boxLogin .panelLogin {
   width: 47%;
   height: 100%;
   display: flex;
   align-items: center;
   background-color: rgba(0, 0, 0,0.3);
   box-shadow: 0 15px 20px rgba(0, 0, 0, 0.6);  
   margin: 0 auto;
}
#boxLogin h3{
   font-size:30px;
   color: #E2E2E2;
}
#boxLogin h3 .highlight{
   font-size:35px;
   color: #D19E03;
}
#boxLogin .form {
   width: 90%;
   height: 100%;
   display: flex;
   align-items: center;
}
#boxLogin .form .box{
   width: 90%;
}
#boxLogin .form input{
   width: 90%;
   background-color: transparent;
   font-size: 25px;
   margin-bottom: 10px;
   border:none;
   color: rgba(0, 0, 0,0.8);
   border-bottom:1px solid #4F678D;
   box-shadow:0px 1px 0px rgba(0, 0, 0,0.8);
   padding: 5px;
}
#boxLogin .form input::-webkit-input-placeholder{
   color: rgba(0, 0, 0,0.8);
   padding: 3px;
   transition: opacity 0.2s ease-in-out;
}
#boxLogin .form input:hover::-webkit-input-placeholder {
  opacity: 0.5;
  -webkit-transition: opacity 0.35s ease-in-out;
  transition: opacity 0.2s ease-in-out;
}
#boxLogin .form input:focus::-webkit-input-placeholder {
  opacity: 0;
  -webkit-transition: opacity 0.35s ease-in-out;
  transition: opacity 0.35s ease-in-out;
}
#boxLogin .form input:focus {
    outline:none;
}  
#boxLogin button {
   font-size:20px;
   padding: 3px;
   width: 90%;
   border: none;
   background-color: rgba(0, 0, 0,0.3);
   box-shadow: 1px 2px 6px rgba(0, 0, 0,0.8);
   border-radius: 4px;
}
#boxLogin button:hover,button:focus{
   outline:none;
   background-color: rgba(0, 0, 0,0.4);
   color: rgba(0, 0, 0,0.8);
}
#boxLogin button:focus{
   box-shadow:0px 2px 1px 0px rgba(0, 0, 0,0.8) inset;
}
#boxLogin .form i{
   background-color: red;
   color: white;
   width: 10px;
   height: 15px;
   border-radius: 50%;
   cursor: pointer;
}
#message{
   color: red;
}
</style>

<div id="boxLogin">
   <div class="middleButtress">
      <div class="panelLogin row">
         <div class="col5" class="title">
            <div class="row">
               <div class="col3"></div>
               <div class="col7">
                  <i><h3>Ikojo<b class="highlight">E-learning</b></h3></i>
               </div>
            </div>            
         </div>
         <div class="col5 form">
            <form action="{{ route('centerlogin') }}" method="post" onsubmit="return validateFormLogin()" id="formLogin" name="formLogin">
               {{ csrf_field() }}
               <div class="box">
                  <p id="message"><?php if(isset($loginabort)){ echo $loginabort;}?></p>
                  <p><input type="text" id="username" name="username"" placeholder="username" onkeyup="checkUsername()">
                     <i name="valid_username"  id="valid_username" style="display: none;" title="invalid username">!</i>
                  </p>
                  <p><input type="password" id="password" name="password" placeholder="password" onkeyup="checkPassword()">
                     <i name="valid_password" id="valid_password" style="display: none;" title="invalid password">!</i>
                  </p>
                  <button type="submit" value="submit" name="submit" form="formLogin">Login</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script src={{ asset('js/login.js') }}></script>
@endsection