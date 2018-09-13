import MySQLdb
import pickle
from datetime import timedelta
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



def get_number_of_orders(user_id):
    return

def calc_priority(user_id,c_id):
    priority = get_sentiment(c_id)*10 + get_user_orders(user_id)*2 + 5*get_user_type(user_id) + 5*get_user_support_type(user_id) + get_user_lifetime(user_id)/30 + get_complaint_lifetime(c_id)
    return priority

#p=calc_priority(0,1,1)
#print(p)
def returnSentiment(complaint):
    #Unpickling the classifier 
    with open('classifier.pickle','rb') as f:
        clf = pickle.load(f)
     
    with open('tfidfmodel.pickle','rb') as f:
         tfidf = pickle.load(f)
     
    sampleText = [str(complaint)]
    sampleText = tfidf.transform(sampleText).toarray()
    return clf.predict(sampleText)
 
#returnSentiment("Pranav pass the sentiment from the db here")

def catch_complaint(c_id):
    cur=con.cursor()
    cur.execute("select Complain_details from complaints where Complaint_id=%d" %(c_id))
    rows=cur.fetchone()[0]
    comp=rows
    return comp


def get_sentiment(c_id):
    senti=catch_complaint(c_id)
    x=returnSentiment(senti)
    if x == 0:
        return 1
    return 0

def getLatestComaplint(u_id):
    cur=con.cursor()
    cur.execute("select complaint_id from complaints where user_id=%d order by filed_on desc LIMIT 1" %(u_id))
    rows=cur.fetchone()[0]
    latest_cid=rows
    return latest_cid

def getLatestComplaintCategory(u_id):
    cur=con.cursor()
    cur.execute("select category from complaints where user_id=%d order by filed_on desc LIMIT 1" %(u_id))
    rows=cur.fetchone()[0]
    latest_category=rows
    return latest_category

def getCategoryComplaints(u_id):
    cur=con.cursor()
    category=getLatestComplaintCategory(u_id)
    cur.execute("select count(*) from complaints where user_id=%d and category='%s'" %(u_id,category))
    rows=cur.fetchone()[0]
    latest_category=rows
    latest_category=latest_category
    return latest_category


def calculate_sentiment(u_id):
    score=get_sentiment(getLatestComaplint(u_id))+getCategoryComplaints(u_id)
    return score

#a=get_sentiment(1)
#print(a[0])