$(document).ready(function() {
  var toggle = false;
  var fixedBoxsize = $('.panel-primary').outerHeight()+'px';
  var mainChat = $('#main-chat');
  var Parent = $(".panel-primary"); // cache parent div
  Parent.css('height', '41px');

  $(".panel-heading").click(function(){           
      toggle = (!toggle) ? true : false;
      if(toggle)
      {
          Parent.animate({'height' : fixedBoxsize}, 300);
          //change class to col-md-5 col-md-offset-7
          mainChat.toggleClass('col-md-5 col-md-offset-7',true);
          mainChat.toggleClass('col-md-3 col-md-offset-9',false);
      }
      else
      {
          Parent.animate({'height' : '41px'}, 300, function() {
            //change class to col-md-3 col-md-offset-9
            mainChat.toggleClass('col-md-5 col-md-offset-7',false);
            mainChat.toggleClass('col-md-3 col-md-offset-9',true);
          }); 
      }
      
  });

  $("#btn-input").keyup(function(event) {
    if(event.keyCode == 13){
      $('#btn-chat').click();
    }
  });
});

function getAnswer() {
  // var q = $("#question").val();
  var input = $('#btn-input');
  if(input.val() == '' || input.val() == '\n') {
    input.val() = "";
    return;
  }

  $('ul.chat').append(
    "<li class='right clearfix'> \
      <span class='chat-img pull-right'> \
        <img src='http://placehold.it/50/FA6F57/fff&text=ME' alt='User Avatar' class='img-circle' /> \
      </span> \
      <div class='chat-body clearfix'> \
        <div class='header'> \
          <small class='text-muted'> \
            <span class='glyphicon glyphicon-time'></span>" + formatAMPM(new Date()) + " \
          </small> \
        </div> \
        <p>" + input.val() + "</p> \
      </div> \
    </li>");

  $.getJSON("./watson.php", {query: input.val()}, function() {})
  .done(function(data) {
    var answer = $(
      "<li class='left clearfix'> \
        <span class='chat-img pull-left'> \
          <img style='width: 50px; height: 50px;' src='image/IBM-research.jpg' alt='User Avatar' class='img-circle' /> \
        </span> \
        <div class='chat-body clearfix'> \
          <div class='header'> \
            <strong class='primary-font'>Watson</strong> \
            <small class='pull-right text-muted'> \
              <span class='glyphicon glyphicon-time'></span>" + formatAMPM(new Date()) + " \
            </small> \
          </div> \
        </div> \
      </li>");
    if(data[0] && data[0].text && data[0].title) {
      answer.children("div").append("<p><strong>Source</strong>: " + data[0].title + "</p>");
      answer.children("div").append("<p>" + data[0].text + "</p>");
    } else {
      answer.children("div").append("<p>Please provide a more specific question!</p>");
    }
    $('ul.chat').append(answer);
    $('.panel-body').animate({scrollTop: $(document).height()}, 'fast');
  })
  .fail(function() {
    alert("Can not connect to Watson API right now");
  });
  input.val("");
}