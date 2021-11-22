from flask import Flask

from pyFiles.login.login import login_blueprints

application = app = Flask(__name__)
app.register_blueprint(login_blueprints)

app.secret_key = "I am Batman"

if __name__ == "__main__":
    app.run(debug=True)