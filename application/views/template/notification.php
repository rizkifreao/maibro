<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" id="toggle-notif" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-bell-o"></i>
        <span class="label label-success count"></span>
    </a>
    <ul class="dropdown-menu" style="width: 386px; box-shadow: 10px 8px 12px rgba(0,0,0,.175);">
        <li class="header">You have <span class="count"></span>  messages</li>
        <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu notifikasi">

        </ul>
        </li>
        <li class="footer"><a href="#">See All Messages</a></li>
    </ul>
</li>

<script>
  $(document).ready(function(){

    $('<audio id="chatAudio"><source src="<?=base_url('')?>public/sound/notif/notifikasi.ogg" type="audio/ogg"><source src="<?=base_url('')?>public/sound/notif/notifikasi.mp3" type="audio/mpeg"><source src="<?=base_url('')?>public/sound/notif/notifikasi.wav" type="audio/wav"></audio>').appendTo('body');
    // function sound(){
    //   $(".notifikasi").focus();
    //   $('#chatAudio')[0].play();
    // }
   
   function load_unseen_notification(view = '')
   {
      $.ajax({
      url:"<?=base_url('').'notifications/fetch'?>",
      method:"POST",
      data:{view:view},
      dataType:"json",
        success:function(data)
        {
          // console.log(data);
          $('.notifikasi').html(data.notification);
          if(data.unseen_notification > 0)
          {
            $('.count').html(data.unseen_notification);
            // n + data.unseen_notification;
          }
        }
      });
    }
    
    load_unseen_notification();
    // $('#chatAudio')[0].play();
    
    $(document).on('click', '#toggle-notif', function(){
      $('.count').html('');
      load_unseen_notification('yes');
    });
    
    setInterval(function(){ 
      load_unseen_notification();
      $('#ProdAJK').DataTable().ajax.reload(); 
      $('#OnProses').DataTable().ajax.reload(); 
    }, 5000);
    
  });
</script>