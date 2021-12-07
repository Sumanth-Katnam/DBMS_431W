from flask import Flask
from flaskext.mysql import MySQL

from pyFiles.routes.routes import routes_blueprints

application = app = Flask(__name__)
app.register_blueprint(routes_blueprints)

app.secret_key = "I am Batman"

app = Flask(__name__)
mysql = MySQL()
app.config['MYSQL_DATABASE_USER'] = 'mmb7103'
app.config['MYSQL_DATABASE_PASSWORD'] = 'CMPSC431W'
app.config['MYSQL_DATABASE_DB'] = 'mmb7103_431W_project'
app.config['MYSQL_DATABASE_HOST'] = 'e5-cse-cs431fa21s1-3.vmhost.psu.edu'
mysql.init_app(app)

conn = mysql.connect()
cursor =conn.cursor()

cursor.execute("SELECT * from User")
data = cursor.fetchone()

if __name__ == "__main__":
    app.run(debug=True, host = '0.0.0.0', port = 80)