from flask import render_template, redirect, url_for, request, session, Blueprint
from functools import wraps
from ..login import login

routes_blueprints = Blueprint('routes', __name__, template_folder='templates')

# HELPER FUNCTIONS
def loginRequired(f):
    @wraps(f)
    def wrap(*args, **kwargs):
        if session['logged_in']:
            return f(*args, **kwargs)
        else:
            return redirect(url_for('routes.r_login', error="Please log-in first"))
    return wrap


@routes_blueprints.route('/')
def r_entry():
    return redirect('/login')

@routes_blueprints.route('/login', methods=['GET', 'POST'])
def r_login():
    error = None
    if request.method == 'POST':
        error = login(request.form['userName'], request.form['password'])
        print(error)
        if not error:
            session['logged_in'] = True
            session['userName'] = request.form['userName']
            return redirect(url_for('routes.r_home'))
        else:
            error = "Wrong Credentials"
    return render_template('/login.html', error=error)
            
@routes_blueprints.route('/home')
@loginRequired
def r_home():
    return render_template('/home.html', userName=session['userName'])

@routes_blueprints.route('/myCourses')
@loginRequired
def r_myCourses():
    return render_template('/myCourses.html')

@routes_blueprints.route('/selectCourses')
@loginRequired
def r_selectCourses():
    return render_template('/selectCourses.html')

@routes_blueprints.route('/cart')
@loginRequired
def r_cart():
    return render_template('/cart.html')

@routes_blueprints.route('/myAccount')
@loginRequired
def r_myAccount():
    return render_template('/myAccount.html')

@routes_blueprints.route('/logout')
@loginRequired
def logout():
    session.pop('logged_in', None)
    session.pop('userName', None)
    return redirect(url_for('routes.r_login', error=None))