from textblob import TextBlob
import MySQLdb
import pickle
import time

con = MySQLdb.connect(host="localhost",database="dell",user="root", password="")

def get_users():
    cur = con.cursor()
    cur.execute("SELECT * FROM users")
    rows = cur.fetchall()
    return rows

def get_user_orders(user_id):
    cur=con.cursor()
    cur.execute("select count(*) from orders where user_id=%d" % (user_id))
    rows=cur.fetchone()[0]
    num_orders=rows
    return num_orders


def get_user_lifetime(user_id):
    cur= con.cursor()
    cur.execute("SELECT DATEDIFF(CURRENT_TIMESTAMP,`Joined_on`) as `lifetime` from `users` where `user_id` = %d" % (user_id))
    rows= cur.fetchone()[0]
    joined_on = rows
    return joined_on

def get_user_type(user_id):
    cur=con.cursor()
    cur.execute("select type from users where user_id=%d" % (user_id))
    rows=cur.fetchone()[0]
    user_type=rows
    return user_type

def get_user_support_type(user_id):
    cur=con.cursor()
    cur.execute("select service_type from users where user_id=%d" % (user_id))
    rows=cur.fetchone()[0]
    user_support_type=rows
    return user_support_type

def get_complaint_lifetime(c_id):
    cur=con.cursor()
    cur.execute("select datediff(current_timestamp,`Filed_on`) from `complaints` where Complaint_id=%d" %(c_id))
    rows=cur.fetchone()[0]
    complaint_lifetime=rows
    return complaint_lifetime


def calc_priority(user_id,c_id):
    priority = get_sentiment(c_id)*70 + get_user_orders(user_id)*2 + 5*get_user_type(user_id) + 5*get_user_support_type(user_id) + get_user_lifetime(user_id)/30 + get_complaint_lifetime(c_id)
    return priority

#p=calc_priority(0,1,1)
#print(p)
def returnSentiment(complaint):
    analysis = TextBlob(str(complaint))
    n = analysis.sentiment.polarity
    if n>0:	return 0
    return abs(n)


def catch_complaint(c_id):
    cur=con.cursor()
    cur.execute("select Complain_details from complaints where Complaint_id=%d" %(c_id))
    rows=cur.fetchone()[0]
    comp=rows
    return comp


def get_sentiment(c_id):
    senti=catch_complaint(c_id)
    x=returnSentiment(senti)
    return x

#a=get_sentiment(1)
#print(a[0])