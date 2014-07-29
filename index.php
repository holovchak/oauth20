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

<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Igor Holovchak | Home</title>
      <link href="http://metroui.org.ua/css/metro-bootstrap.css" rel="stylesheet">
      <link href="http://metroui.org.ua/css/metro-bootstrap-responsive.css" rel="stylesheet">
      <link href="http://metroui.org.ua/css/iconFont.css" rel="stylesheet">
      <link href="http://metroui.org.ua/css/docs.css" rel="stylesheet">
      <link href="http://metroui.org.ua/js/prettify/prettify.css" rel="stylesheet">
      <!-- Load JavaScript Libraries -->
      <script src="http://metroui.org.ua/js/jquery/jquery.min.js"></script>
      <script src="http://metroui.org.ua/js/jquery/jquery.widget.min.js"></script>
      <script src="http://metroui.org.ua/js/jquery/jquery.mousewheel.js"></script>
      <script src="http://metroui.org.ua/js/prettify/prettify.js"></script>
      <script src="http://metroui.org.ua/js/holder/holder.js"></script>
      <!-- Metro UI CSS JavaScript plugins -->
      <script src="http://metroui.org.ua/js/load-metro.js"></script>
      <!-- Local JavaScript -->
   </head>
   <body class="metro">
      <div class="container">
      <h2 id="__times__">Home</h2>
      <div class="example">
         <div class="grid">
            <div class="row">
               <div class="span12">
                  <? 
                     require_once("config.php");
                      
                     if(isset($_SESSION['access_token'])) {
                         $uid = $_SESSION['user_id'];
                     
                         $rss = simplexml_load_file('https://api.vk.com/method/users.get.xml?uids='.$uid.'&fields=photo_big,online,domain,counters&access_token='.$_SESSION['access_token']);
                         
                         /* Виводимо дані про поточного користувача */
                         
                         foreach ($rss->user as $item) {
                           $username = $item->first_name.' '.$item->last_name;
                           $photo = $item->photo_big;
                           $domain = $item->domain;
                           $followers = $item->counters->followers;
                           $albums = $item->counters->albums;
                           $videos = $item->counters->videos;
                           $audios = $item->counters->audios;
                           $notes = $item->counters->notes;
                           $photos = $item->counters->photos;
                           $groups = $item->counters->groups;
                           $friends = $item->counters->friends;
                           $online_friends = $item->counters->online_friends;
                           $user_videos = $item->counters->user_videos;
                           if($item->online == 1){$status = '<a class="text-success">Online</a>';}else{$status = '<a class="text-muted">Offline</a>';}
                     print <<< HERE
                     <table class="table bordered">
                     <thead>
                     <tr>
                     <th class="text-left" colspan="2"><h3>Привіт, $username <small>$status</small></h3></th>
                     </tr>
                     </thead>
                     
                     <tbody>
                     <tr>
                     <td><p class="text-center"><img src="$photo" class="shadow"/></p></td>
                     <td>
                     <p class="text-muted">Короткий адрес: <a href="https://vk.com/$domain" target="_blank">$domain</a> (<a href="https://vk.com/id$uid" target="_blank">$uid</a>)</p>
                     <p class="text-muted">Підписники: <a href="https://vk.com/id$uid" target="_blank">$followers</a></p>
                     <p class="text-muted">Альбоми: <a href="https://vk.com/albums$uid" target="_blank">$albums</a></p>
                     <p class="text-muted">Відеозаписи: <a href="https://vk.com/videos$uid" target="_blank">$videos</a></p>
                     <p class="text-muted">Аудіозаписи: <a href="https://vk.com/audios$uid" target="_blank">$audios</a></p>
                     <p class="text-muted">Нотатки: <a href="https://vk.com/notes$uid" target="_blank">$notes</a></p>
                     <p class="text-muted">Фотографії: <a href="https://vk.com/albums$uid" target="_blank">$photos</a></p>
                     <p class="text-muted">Групи: <a href="https://vk.com/groups?id=$uid" target="_blank">$groups</a></p>
                     <p class="text-muted">Друзі: <a href="https://vk.com/friends?id=$uid" target="_blank">$friends</a></p>
                     <p class="text-muted">Друзі онлайн: <a href="https://vk.com/friends?id=$uid&section=online" target="_blank">$online_friends</a></p>
                     <p class="text-muted">Відеозаписи з Вами: <a href="https://vk.com/video?section=tagged&id=$uid" target="_blank">$user_videos</a></p>
                     </td>
                     </tbody>
                     
                     <tfoot></tfoot>
                     </table>
                     HERE;
                         }
                             
                     } else {
                         echo 'Щоб переглядати цю сторінку Вам потрібно авторизуватися через Вконтакте. <a href="login.php">Увійти через VK</a>';
                     }
                     ?>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
