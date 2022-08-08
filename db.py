import mysql.connector as sql

def fetchdata(botnumber):
    db=sql.connect(host="localhost",user="harsh",passwd="harsh123",database="octafx")
    cursor=db.cursor()
    qry="SELECT mastertraderid FROM mastertraders where bot="+str(botnumber)+" AND status=1"
    cursor.execute(qry)
    result=cursor.fetchall()
    db.close()
    if len(result)==1:
        if(result[0]):
            resultoutput=[i[0] for i in result]
            return resultoutput
    else:
        return "Not Found"

def fetchmastername(mastertraderid):
    db=sql.connect(host="localhost",user="harsh",passwd="harsh123",database="octafx")
    cursor=db.cursor()
    qry="SELECT mastertrader FROM mastertraders where mastertraderid="+str(mastertraderid)
    cursor.execute(qry)
    result=cursor.fetchall()
    db.close()
    if len(result)==1:
        if(result[0]):
            resultoutput=[i[0] for i in result]
            #print(resultoutput)
            return resultoutput[0]

# if db.is_connected():
#     print("Database connected")

# if __name__ == "__main__":
#     while True:
        # time.sleep(1)
        #fetchdata(1)
# result=[('Mark Zuckerberg',), ('Bill Gates',), ('Tim Cook',), ('Wlliam Sidis',), ('Elon Musk',)]
# resultoutput=[i[0] for i in result]
# print(resultoutput)