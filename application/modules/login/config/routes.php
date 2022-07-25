<?php

//login module

$route["login/sign"] = "Login/sign_user";


$route["login/get"] = "Login/login_get";

$route["login/update"] = "Login/update";//working



$route["login/store"] = "Login/store";//not working


$route["login/update_data"] = "Login/update_data";//not working


$route["login/delete"] = "Login/delete";//working


$route["login/show_one"] = "Login/show_one/$1";
 //login
$route["login/login_user"] = "Login/user"; //login


//register controller

$route["login/register"] = "Registration/register_user";


//get all data from (Get_all) controller

$route["login/get-all"] = "Get_all/get_all_data";



 






// $route["login/token"] = "Auth/token";
// //token
// $route["login/login_token"] = "Auth/login";//token







?>