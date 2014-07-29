<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>API VK - Add audios</title>
   </head>
   <body>
      <div class="container">
      <div class="example">
      <div class="grid">
         <div class="row">
            <div class="span12">
               <div id="wrapper">
                  <? 
                     require_once($_SERVER['DOCUMENT_ROOT'].'/oauth20/config.php');
                      
                     if(isset($_SESSION['access_token'])) {
                         $uid = $_SESSION['user_id'];
                         
                         $rss = simplexml_load_file('https://api.vk.com/method/audio.getPopular.xml?only_eng=0&count=300&access_token='.$_SESSION['access_token']);
                     
                     print <<< PLAYLIST
                        <div class="fixed_player">
                        <audio preload></audio>
                        </div>
                        <ol>
                     PLAYLIST;
                            foreach ($rss->audio as $item) {
                             $count++;
                             $audio_id = $item->aid;
                             $owned_id = $item->owner_id;
                             echo '<li><a href="#" data-src="'.$item->url.'">'.$item->artist.' - '.$item->title.'</a></li><p class="audio-right"><a id="'.$audio_id.'_a" onclick="adda('.$audio_id.','.$owned_id.')"><button class="button primary"><i class="fa fa-plus"></i></button></a> <a id="'.$audio_id.'_ok"></a></p>';
                            }
                            if($count == 0){echo 'У Вас немає аудіозаписів.';}
                     print <<< PLAYLIST
                        </ol>
                     PLAYLIST;
                     } else {
                         echo 'Щоб переглядати цю сторінку Вам потрібно авторизуватися через Вконтакте. <a href="/oauth20/login.php">Увійти через VK</a>';
                     }
                     ?>
                  <script type="text/javascript">
                     var asess = <? echo json_encode($_SESSION['access_token']);?>;
                     function adda(aaid,aoid) {
                     $('#'+aaid+'_a').show();
                     $('#'+aaid+'_ok').hide();
                     $.ajax({
                      url: 'https://api.vk.com/method/audio.add?audio_id='+aaid+'&owner_id='+aoid+'&access_token='+asess,
                      dataType: "jsonp", 
                      success:function(e){
                      $('#'+aaid+'_a').hide();
                      $('#'+aaid+'_ok').show().html('<button class="button success"><i class="fa fa-check"></i></button>');
                     $.Notify({
                                                         shadow: true,
                                                         position: 'bottom-right',
                                                         caption: "Статус",
                                                         content: 'Аудіозапис успішно додано.',
                                                         style: {background: '#1ba1e2', color: 'white'}
                     });
                     }
                     });
                     }
                  </script>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
