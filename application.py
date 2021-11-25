from flask import Flask

from pyFiles.routes.routes import routes_blueprints

application = app = Flask(__name__)
app.register_blueprint(routes_blueprints)

app.secret_key = "I am Batman"

if __name__ == "__main__":
    app.run(debug=True)