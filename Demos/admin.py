import requests
uname = input("API username \n> ")
passwd = input("API password \n> ")
hostname = input("Server hostname \n> ")
session = requests.Session()
session.auth = (uname, passwd)

auth = session.post('http://' + hostname)
response = session.get('http://' + hostname + '/api/validate.php')