/* 
VK Api oauth20 - Авторизація
Copyright (C) 2014 Igor Holovchak
         
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
         
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
         
You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

<?
   require_once("config.php");
   $link = 'https://oauth.vk.com/authorize?client_id='.CLIENT_ID.'&redirect_uri='.PATH.OAUTH_CALLBACK.'&display=popup&scope='.SCOPE.'&response_type=code';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Igor Holovchak | Login VK</title>
      <link href="http://metroui.org.ua/css/metro-bootstrap.css" rel="stylesheet">
      <link href="http://metroui.org.ua/css/metro-bootstrap-responsive.css" rel="stylesheet">
      <link href="http://metroui.org.ua/css/iconFont.css" rel="stylesheet">
      <link href="http://metroui.org.ua/css/docs.css" rel="stylesheet">
      <link href="http://metroui.org.ua/js/prettify/prettify.css" rel="stylesheet">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
      <!-- Load JavaScript Libraries -->
      <script src="http://metroui.org.ua/js/jquery/jquery.min.js"></script>
      <script src="http://metroui.org.ua/js/jquery/jquery.widget.min.js"></script>
      <script src="http://metroui.org.ua/js/jquery/jquery.mousewheel.js"></script>
      <script src="http://metroui.org.ua/js/prettify/prettify.js"></script>
      <script src="http://metroui.org.ua/js/holder/holder.js"></script>
      <!-- Metro UI CSS JavaScript plugins -->
      <script src="http://metroui.org.ua/js/load-metro.js"></script>
      <!-- Local JavaScript -->
      <style>
         .login_vk {
         width: 35%;
         height: 35%;
         overflow: auto;
         margin: auto;
         position: absolute;
         top: 0; left: 0; bottom: 0; right: 0;
         }
      </style>
   </head>
   <body class="metro">
      <div class="login_vk">
         <div class="panel">
            <div class="panel-header">
               Увійти через VK 
            </div>
            <div class="panel-content">
               <center><button class="command-button" onclick="location.href='<? echo $link ?>';">
                  <i class="fa fa-vk"></i>
                  Увійти через Вконтакте
                  </button>
               </center>
            </div>
         </div>
      </div>
   </body>
</html>
