var MaskPhone = {
    mask: function () {
        var matrix = ['(','0','1','2',')',' ','3','4','5',' ','6','7',' ','8','9'],
            ss = ['(','_','_','_',')',' ','_','_','_','-','_','_','-','_','_'],
            pos = [1,2,3,4,7,8,9,11,12,14,15,16],
            dd = this.value.replace(/\D+/g,""),
            i = 0, val = '', codeCountry = '+7';
        for(var e = 0; e < matrix.length; e++){
            if(dd[matrix[e]] === undefined){
                val += ss[e];
            }
            else{
                val += dd[matrix[e]];
            }
        }
        this.value = val;
        MaskPhone.setCaretPosition(pos[dd.length], this);
    },
    setCaretPosition: function(pos, elem) {
        elem.focus();
        if (elem.setSelectionRange) elem.setSelectionRange(pos, pos);
        else if (elem.createTextRange) {
            var range = elem.createTextRange();
            range.collapse(true);
            range.moveEnd("character", pos);
            range.moveStart("character", pos);
            range.select()
        }
    }
};
document.getElementById('message-phone').oninput = MaskPhone.mask;
jQuery(document).ready(function() {
    // jQuery("time.timeago").timeago();
});

$('.onInput').on('click', function () {
    var idInput = $(this).attr('data-input');
    $('#'+idInput).attr('type', 'text');
    this.style.display = 'none';
});