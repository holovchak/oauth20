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
define("CLIENT_ID", "ID_додатку_VK");
define("SECRET", "Секретний_ключ_додатку_VK");
define("OAUTH_CALLBACK", "callback.php");
define("SCOPE", "friends,photos,wall,audio,video,notify,groups,notes"); /* Права доступу. До чого має доступ додаток (Друзів, Фотографій, Стіни і т.д.) */
define("PATH", "http://holovchak.pp.ua/oauth20/"); /* Домашня сторінка */
 
session_start();
?>
