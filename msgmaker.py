import db
from telegram import sendmsg
import requests

def openorder(data,masterid):
    datadict=data
    mastername=str(db.fetchmastername(masterid))
    icon=str(datadict.get('icon')).capitalize()
    symbol=str(datadict.get('symbol'))
    duration=str(datadict.get('duration'))
    volume=str(datadict.get('volume'))
    x=duration
    y=x.replace("d", "").replace("h", "").replace("m", "").replace("s", "").replace(" ", "")
    z=int(y)
    if z<=59:
        sendmsg("{} {} {} %0a--- Signal By {} {} ago".format(icon,symbol,volume,mastername,duration))
    else:
        MyURL="https://api.telegram.org/bot1899839845:AAG_b-fTqySFgxW4ziPiPmPAXnIzodUs6dg/sendMessage?chat_id=-1001591072312&text={} {} {} %0a--- Signal By {} {} ago".format(icon,symbol,volume,mastername,duration)
        requests.get(MyURL)
        
    