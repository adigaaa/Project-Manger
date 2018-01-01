<?php  ?>
<script type="text/javascript">





</script>
<script type="text/javascript">
window.onload=function(){
    document.getElementById("form").onsubmit=function(e){
        e.preventDefault();
    };
}

function showUser() {
    var message = document.getElementById('textbox');

$.ajax({
  type: 'POST',
  url: '<?php echo  base_url() ?>/index.php/chat/send/',
  data: 'message='+message.value,
  success: function(response){
    $('#result').html(response);
  }
});
 var objDiv = document.getElementById("scroll");
        objDiv.scrollTop = objDiv.scrollHeight;
       message.value = '';

 // $( "#textbox" ).select();

    }

   setInterval(function(){
        var txt =  document.getElementById("mess");
        var sound = document.getElementById("sound");
        xmlhttps = new XMLHttpRequest();
        var  text = "";
    xmlhttps.onreadystatechange = function() {
            if (xmlhttps.readyState == 4 && xmlhttps.status == 200) {
              text = xmlhttps.responseText;
              tyt = [{"username":"adiga","message":"murad","time":"1489493054","id":"767"},{"username":"adiga","message":"murad","time":"1489493053","id":"766"}];
              console.log(tyt.constructor == Array);
              if (text != '') {
              text  = JSON.parse(text);
              //txt.innerHTML = "";
               t= text.reverse();
               var audio = new Audio('https://notificationsounds.com/soundfiles/25b2822c2f5a3230abfadd476e8b04c9/file-63_oringz-pack-nine-27.wav');
                    audio.play();
                while(text != "" ){
                    
                t = text.shift();
                t.message
                
                 html = "<li class='left clearfix'><span class='chat-img pull-left'><img src='http://placehold.it/50/55C1E7/fff&amp;text=U' alt='User Avatar'class='img-circle'>"+
              " </span><div class='chat-body clearfix'><div class='header'><strong class='primary-font'><strong class='primary-font'>";
              html += t.username;
              html += "</strong> <small class='pull-right text-muted'><span class='glyphicon glyphicon-time'></span>";
              html += t.time;
              html += "</small></div><p>"+t.message+"</p></div></li>";
              txt.innerHTML += html;
              var objDiv = document.getElementById("scroll");
                objDiv.scrollTop = objDiv.scrollHeight;
               }
            }
        }
        };
        console.log(text);
        xmlhttps.open("GET","<?php echo  base_url() ?>index.php/chat/show/",true);
        xmlhttps.send();
    }
        ,3000);
 

</script>
<div id = "sound">
</div>
            <div id="chat" class="panel panel-primary" >
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-ok-sign">
                            </span>Available</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-remove">
                            </span>Busy</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-time"></span>
                                Away</a></li>
                            <li class="divider"></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-off"></span>
                                Sign Out</a></li>
                        </ul>

                    </div>
                    <div class="btn-group pull-left">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <?php $chat = $this->chat_model->get(); ?>
                        To<ul class="dropdown-menu slidedown">
                            <?php foreach ($users as  $value): ?>
                                <li><a href="<?php echo base_url() ?>/index.php/chat/send/<?php  echo $value->id;?>"><span class="glyphicon glyphicon-refresh">
                            </span><?php echo  $value->username; ?></a></li>
                            <?php endforeach ?>
                            
                            
                        </ul>
                        
                    </div>
                </div>
                <div id="scroll" class="panel-body"  style=" width: 420px; height: 470px;overflow-y: scroll"; >
                    <ul class="chat" id="mess">
                     <?php foreach ($chat as $value): ?>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="img-circle">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                               <?php echo date("h-i-s"); ?>
                                    <strong class="primary-font"><?php echo $value->username; ?></strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span><?php echo $value->time; ?></small>
                                </div>
                                <p>
                                    <?php echo (string)$value->message; ?>
                                </p>
                                   
                            </div>
                        </li>
                        <?php endforeach ?>
                       
                    </ul>
                </div>
                <div class="panel-footer">
                <?php 
                    $data = array(

                        "id"=>"form"
                        //'method'=>'post'
                        );
                 ?>
                 <?php echo form_open("chat/send",$data); ?>
                    <div class="input-group">
                     <?php $data =  array(
                                    'class' => "form-control input-sm",
                                    'name' => "message",
                                    'id'=>"textbox",
                                    'placeholder'=>"Type your message here..."
                                 ); ?>
                                 <?php echo form_input($data); ?>
                        <!-- <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..."> -->
                       
                        <span class="input-group-btn">
                            <!-- <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button> -->
                                <?php $data =  array(
                                    'class' => "btn btn-warning btn-sm",
                                    'id' =>"btn-chat" ,
                                    'name' => "send",
                                    'value'=>"send",
                                   'onclick'=>'showUser()'
                                 ); ?>
                                 <?php echo form_submit($data); ?>
                        </span>
                        <?php echo form_close(); ?> 

                    </div>
                </div>
            </div>
            <script type="text/javascript">
var objDiv = document.getElementById("scroll");
        objDiv.scrollTop = objDiv.scrollHeight;
        </script>

