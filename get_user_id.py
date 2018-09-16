from flask import Flask, request, render_template, redirect, url_for

app = Flask(__name__)

@app.route('/')
def my_form():
    return render_template('user_analysis.php')

@app.route('/result', methods=['POST', 'GET'])
def my_form_post():
    text = request.form['text']

    print("HAHAHA",text)
    return render_template('user_analysis.php')

app.debug = True
app.run('localhost',5555)