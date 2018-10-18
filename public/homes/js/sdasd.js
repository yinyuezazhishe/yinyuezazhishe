$('.select-sdasd').click(function(){
	$('#sdasd').attr('contenteditable','true');
	selectText("sdasd");
})
function mysdsad(flag)
{
	resdasd = $('.sdasd').attr('data-sdasd');
	sdasdtext = $('#sdasd').text();
  	id = $('.select-sdasd').attr('data-id');
	if(sdasdtext != resdasd && sdasdtext.length <= 40 && flag){
		$.get('/home/user/sdasd',{'id':id,'sdasd':sdasdtext},function(data){
				if(data == '1'){
					$('.sdasd').attr('data-sdasd',sdasdtext);
					$('.sdasd span').text(sdasdtext);
					swal('个性签名更新成功');
				}else{
					swal('个性签名更新失败');
				}
		})
        wa = true;
	}
    if(sdasdtext.length >= 40){
        swal('个性签名文字长度超过40个');
    }
}
var wa = true;
$('#sdasd').blur(function(){
    $('#sdasd').removeAttr('contenteditable');
    mysdsad(wa); 
}) 
$('#sdasd').on('keypress',function(event){
    if (event.keyCode == 13) {
        wa = false;
    	$('#sdasd').removeAttr('contenteditable');   
		mysdsad(true);
        event.preventDefault();  
    }
})



//选中文本
function selectText(element) {
    var text = document.getElementById(element);
    if(window.getSelection().toString().length>0){
        return false;
    }else if (document.body.createTextRange) {
        var range = document.body.createTextRange();
        range.moveToElementText(text);
        range.select();
    } else if (window.getSelection) {
        var selection = window.getSelection();
        var range = document.createRange();
        range.selectNodeContents(text);
        selection.removeAllRanges();
        selection.addRange(range);
        /*if(selection.setBaseAndExtent){
            selection.setBaseAndExtent(text, 0, text, 1);
        }*/
    } else {
        console.log('...');
    }
}
