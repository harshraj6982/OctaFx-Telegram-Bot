import mysql.connector as sql
import requests
import time
import os
from http_request_randomizer.requests.proxy.requestProxy import RequestProxy
import logging
from telethon import TelegramClient, events
import random 

db=sql.connect(host="localhost",user="harsh",passwd="harsh123",database="octafx")
cursor=db.cursor()

if db.is_connected():
    while True:
        URL="https://api.telegram.org/bot1899839845:AAG_b-fTqySFgxW4ziPiPmPAXnIzodUs6dg/sendMessage?chat_id=-1001591072312&text=Test"
        requests.get(URL)