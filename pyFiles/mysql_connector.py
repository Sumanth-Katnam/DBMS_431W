import mysql.connector

my_db = mysql.connector.connect(
    host = "e5-cse-cs431fa21s1-3.vmhost.psu.edu",
    user = "mmb7103",
    passwd = "CMPSC431W"
)

my_cursor = my_db.cursor()

my_cursor.execute("SHOW DATABASES")
for db in my_cursor:
    print(db)