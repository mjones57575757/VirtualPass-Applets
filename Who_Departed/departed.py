import requests, json
def get(uname, passwd, ip):
    session = requests.Session()
    session.auth = (uname, passwd)
    auth = session.post('http://' + ip)
    #get all the users who are currently departed via the VirtualPass API
    users_departed = json.loads(session.get("https://" + str(ip) + "/api/index.php?who=all&item=None&what=departed&set=None").text)
    output = []
    for x in users_departed:
        #get that users full info
        user_info = json.loads(session.get("https://" + str(ip) + "/api/index.php?who=" + str(x) + "&item=user&what=all&set=None").text)
        room_string = ""
        for p in user_info[x]["room"]:
            room_real_number = requests.get("https://" + str(ip) + "/registerd_qrids/" + str(p)).text
            room_string += room_real_number + " or "
        description = "The user " + str(user_info[x]["usrinfo"]["first_name"]) + " " + str(user_info[x]["usrinfo"]["last_name"]) + "is currently departed from room(s) " + room_string + " they departed at " + str(user_info[x]['srvinfo']['hour_gon']) + ":" + str(user_info[x]['srvinfo']['minute_gon'])
        output.append(description)
    return output
print(get("admin","admin","1c3f-73-229-218-231.ngrok.io"))