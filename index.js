jQuery(function(){
    var counter = 1;
    jQuery('a.add-author').click(function(event){
        event.preventDefault();

        var newRow = jQuery('<tr><td><input type="text" name="relationship' +
            counter + '"/></td><td><input type="text" name="name' +
            counter + '"/></td><td><input type="text" name="occupation' +
            counter + '"/></td><td><input type="number" name="age' +
            counter + '"/></td><td><input type="text" name="depend' +
            counter + '"/></td></tr>');
            counter++;
        jQuery('table.authors-list').append(newRow);

    });
});