$('.select-sdasd').click(function(){
	$('#sdasd').attr('contenteditable','true');
	selectText("sdasd");
})

function mysdsad()
{
	resdasd = $('.sdasd').attr('data-sdasd');
	sdasdtext = $('#sdasd').text();
    console.log(sdasdtext.length);
  	id = $('.select-sdasd').attr('data-id');
	if(sdasdtext != resdasd && sdasdtext.length >=40){
		$.get('/home/user/sdasd',{'id':id,'sdasd':sdasdtext},function(data){
				if(data == '1'){
					$('.sdasd').attr('data-sdasd',sdasdtext);
					$('.sdasd span').text(sdasdtext);
					swal('个性签名更新成功');
				}else{
					swal('个性签名更新失败');
				}
		})
	}
    if(sdasdtext.length >= 40){
        swal('个性签名文字长度超过40个');
    }
}
$('#sdasd').on('keypress',function(event){
    if (event.keyCode == 13) {
    	$('#sdasd').removeAttr('contenteditable');        
		mysdsad();
        event.preventDefault();
    }else{
    	$('#sdasd').blur(function(){
			$('#sdasd').removeAttr('contenteditable');
			mysdsad(); 
		})
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
