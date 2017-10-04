/**
 * Created by expert600 on 3.10.2017 г..
 */
function getDayName()
{
    var date=new Date();
    var arrDayNames =
        ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday", "Saturday"];
    return arrDayNames[date.getDay()]
}