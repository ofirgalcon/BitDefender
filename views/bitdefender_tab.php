<div id="bitdefender-tab"></div>
<h2 data-i18n="bitdefender.title"></h2>

<table id="bitdefender-tab-table" style="max-width:475px;"><tbody></tbody></table>

<script>
$(document).on('appReady', function(){
    $.getJSON(appUrl + '/module/bitdefender/get_data/' + serialNumber, function(data){
        var table = $('#bitdefender-tab-table');
        $.each(data, function(key,val){
            var th = $('<th>').text(i18n.t('bitdefender.column.' + key));
            var td;
            if (key === 'last_update') {
                td = $('<td>').text(moment.unix(val).fromNow());
            } else if (key === 'av_enabled') {
                td = $('<td>').text(val == 1 ? "Yes" : "No");
                if (!val) {
                    td.css('color', 'red');
                }
            } else {
                td = $('<td>').text(val);
            }
            table.append($('<tr>').append(th, td));
        });
    });
});
</script>
