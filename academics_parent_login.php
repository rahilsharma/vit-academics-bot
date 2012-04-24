<?php
//********Author rahil sharma 
//10:58 am 24/4/2012
//www.lihars.tk
//for me----(see in hd prsnl) for more fun
//Avoid the Gates of Hell. Use Linux.

$regno=$_POST['regno'];

include("LIB_parse.php");                 //here we created connection with login page to get verification code
include("LIB_http.php");
$LOGINURL = "https://academics.vit.ac.in/parent/parent_login.asp";
$cookie_file_path = "C:/cookie.txt";                                                    //cokie ki path dekh liyo 
$agent = "Mozilla/5.0 (X11; Linux x86_64; rv:9.0.1) Gecko/20100101 Firefox/9.0.1";           
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$LOGINURL);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
$result = curl_exec ($ch);
curl_close ($ch);                             //ise bina lib_parse aur lib_http use kiye kar ke dekhiyo,preg_match_all mein regex galat aa riya tha use thik 
                                               //kar ke chala ke dhek
$title_excl = return_between($result, '<font face="verdana" size=3>', "</font>", EXCL);
# Display the parsed text
echo "title_excl = ".$title_excl;
$x=str_replace(" ","",$title_excl);
echo "$x";                                  //dalte waqt ise hata lena

//here we login     jo upar $x ya vrfication code nikala tha use yahan par use karliyo

$LOGINURL = "https://academics.vit.ac.in/parent/parent_login_submit.asp";
$POSTFIELDS ="message=&wdregno=".$regno."&vrfcd=".$x;      
                                                            					    //kisi ko dene se pehle change kar liyo
$reffer ="https://academics.vit.ac.in/parent/parent_login.asp";               //upar post se le
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$LOGINURL);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$POSTFIELDS);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_REFERER, $reffer);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
$result = curl_exec ($ch);
curl_close ($ch);



//getting marks
$reffer ="https://academics.vit.ac.in/parent/parent_menu.asp";            //**** headers kafi kaam ka hai aur ****bug bhi dhang se use karna sikh
$LOGINURL = "https://academics.vit.ac.in/parent/marks.asp";             //web-******ing mein bhi kaam aa javega
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$LOGINURL);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
$result = curl_exec ($ch);
curl_close ($ch);
echo $result;
 //for attendance
$date=date("d-M-Y");
echo $date;
$reffer="https://academics.vit.ac.in/parent/attn_report.asp";
$POSTFIELDS ="from_date=01-Apr-2011&to_date=".$date."&submit=View+Report";
$LOGINURL ="https://academics.vit.ac.in/parent/attn_report_submit.asp";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$LOGINURL);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$POSTFIELDS);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_REFERER, $reffer);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
$result = curl_exec ($ch);
curl_close ($ch);
echo $result;






?>
