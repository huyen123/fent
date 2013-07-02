/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function getDateFormat(date, format) {
    if (date === null) {
        return null;    
    }
    if (format === undefined) {
        format = '/';
    }
    var dd = date.getDate();
    var mm = date.getMonth()+1; //January is 0!
    var yyyy = date.getFullYear();
    if(dd < 10){
        dd = '0' + dd;
    } 
    if(mm < 10){
        mm = '0' + mm;
    } 
    return '' + dd + format + mm + format + yyyy;
}

function createUrl(controller, id) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r='; 
    url += controller + '/view&id=' + id;
    return url;
}