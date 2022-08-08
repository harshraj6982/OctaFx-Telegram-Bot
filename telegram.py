import requests

def sendmsg(msg):
    URL="https://api.telegram.org/bot1899839845:AAG_b-fTqySFgxW4ziPiPmPAXnIzodUs6dg/sendMessage?chat_id=-1001591072312&text={}".format(msg)
    #URL="https://api.telegram.org/bot1821086332:AAE20wOAdJK8wJiO2EAevLcCmSGfmuaaFkM/sendMessage?chat_id=-1001502486046&text={}".format(msg)
    requests.get(URL)
    

    
