
var main = function(){
	$.post('../php/screen.php', { width: screen.width, height:screen.height }, function(json) {
        if(json.outcome == 'success') {
            // do something with the knowledge possibly?
           console.log("something");
        } else {
            alert('Unable to let PHP know what the screen resolution is!');
        }
    },'json');
};
main();