from flask import Flask, request, jsonify
from db_connect import calc_priority, calculate_sentiment
from flask_cors import CORS
from send_mail import mail
from db_connect import get_sentiment

app = Flask(__name__)
CORS(app)

@app.route('/')
@app.route('/index')
def index():

	user_id = request.args.get('u_id', type = int)
	c_id = request.args.get('c_id', type = int)

	c = calc_priority(user_id, c_id)
	result = c
	result = (80 - result)//8
	if result < 0:
		return jsonify(0)

	return jsonify(result)

@app.route('/mailer')
def mailer():
	user_email = request.args.get('user_email')
	complain_details = request.args.get('complain_details')
	response = mail(complain_details, user_email)
	return jsonify(response)
	
	
@app.route('/sentiment')
def senitment():
	user_id = request.args.get('u_id', type = int)
	response = get_sentiment(user_id)
	return jsonify(response[0])

@app.route('/sentimentscore')
def sentimentscore():

	user_id = request.args.get('u_id', type = int)

	c = calculate_sentiment(user_id)
	result = c
	result = (80 - result)//14
	if result < 0:
		return jsonify(0)

	return jsonify(result)

app.run('localhost',5555, debug=True)