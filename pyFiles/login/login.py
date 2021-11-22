from flask import render_template, redirect, url_for, request, session, Blueprint

login_blueprints = Blueprint('routes', __name__, template_folder='templates')

@login_blueprints.route('/')
def entry():
    return redirect('/login')

@login_blueprints.route('/login', methods=['GET', 'POST'])
def login():
    error = None
    if request.method == 'POST':
        if request.form['userName'] != 'admin' or request.form['password'] != 'admin':
            error = "Wrong Credentials"
        else:
            session['logged_in'] = True
            error = "Logged in Successfully"
            # return redirect(url_for('routes.homePage'))
    return render_template('/login/login.html', error=error)