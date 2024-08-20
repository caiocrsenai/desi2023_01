$(function(e){

    var $messageInput= $('.main-container .mc-right footer input');

    

    $messageInput.on('keyup',function(e){
        var $this=$(this);

        console.dir($this);
    });

});