import requests
import time
#import random
from reqheaders import randomheader
import db
import os
import msgmaker

order = 0
file = os.path.basename(__file__)
bot = file[len(file)-4]
mid=None

def getRandomProxy():
    # Using Proxy 
    proxy = {
        "http": f"http://Kh072ICB0vRFuRg9:wifi;;@proxy.soax.com:{9000 + random.randint(0, 9)}",
        "https": f"http://Kh072ICB0vRFuRg9:wifi;;@proxy.soax.com:{9000 + random.randint(0, 9)}"
    }
    return proxy


while True:
    #t=random.randint(5,7)
    time.sleep(20)
    random_headers_dict = randomheader()
    datalist = db.fetchdata(bot)
    if datalist!="Not Found":    
        masterid = datalist[0]
        if mid!=None:     
            if mid!=masterid:
                order=0
        mid=masterid
        URL = "https://www.octafx.com/copy-trade/master/"+str(masterid)+"/history/open/0/"
        response = requests.get(URL, headers=random_headers_dict, proxies=getRandomProxy())
        if response.status_code==200:
            jsondata = response.json()
            # for i in jsondata['rows']:
            #     print(i)
            # print("---------------------")
            openorder = len(jsondata['rows'])
            if order == 0:
                # print("Pass")
                pass
            if order != openorder:
                if order > openorder:
                    # print("Order closed")
                    # print("order: "+str(order))
                    # print("openorder: "+str(openorder))
                    order = openorder
                if order < openorder:
                    # print("New order")
                    # print("order: "+str(order))
                    # print("openorder: "+str(openorder))
                    jsonlist=jsondata['rows']
                    temp=jsonlist[0]
                    msgmaker.openorder(temp,str(masterid))
                    order = openorder
    else:
        order=0