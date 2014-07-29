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
   require_once("config.php"); /* Підключаємо файл налаштувань */
   if($_REQUEST['code']) {
       $resp = file_get_contents('https://api.vk.com/oauth/access_token?client_id='.CLIENT_ID.'&code='.$_REQUEST['code'].'&client_secret='.SECRET.'&redirect_uri='.PATH.OAUTH_CALLBACK); /* Отримуємо токен */
       $data = json_decode($resp, true);
    
       if($data['access_token']){
           $_SESSION['access_token'] = $data['access_token']; /* Записуємо токен користувача який авторизувався у сесію */
           $_SESSION['user_id'] = $data['user_id']; /* Записуємо id користувача який авторизувався у сесію */
           header('Location: '.PATH.''); /* Перенаправляємо користувача на головну сторінку */
           exit();
       }
   }
?>
