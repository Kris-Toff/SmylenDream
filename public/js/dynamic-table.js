$(document).ready(function () {
    var myform = $('#myform'),
    iter = 0;
    $('#btnAddCol').click(function () {
        myform.find('tr').each(function(){
          var trow = $(this);
            if(trow.index() === 0){
                trow.append('<td><input type="text" name="dimension'+iter+'" /></td>');
            }else{
                trow.append('<td><input type="text" name="dimensionVal'+iter+'"/></td>');
            }
        });
        iter += 1;
    });

    t = 1;
    $('#btnRemove').click(function () {
        myform.find('tr').each(function(){
          var trow = $(this);
            if(trow.index() === 0){
                trow.remove('<td><input type="text" name="dimension'+t+'" /></td>');
            }else{
                trow.remove('<td><input type="text" name="dimensionVal'+t+'"/></td>');
            }
           
        });
        iter += 1;
    });
});