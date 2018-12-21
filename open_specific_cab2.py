# 'requests' is a 3rd party module that makes HTTP methods easier to use
# can try using default modules but that was way too much effort
import requests, time, datetime, re, sys, json

myurl = 'http://10.10.14.25:9898'

# the following generates a token request, extracts the response, and assigns to 'mytoken' var
tokenReq = requests.post(myurl + '/token', data = {'grant_type': 'password', 'username': 'admin', 'password': '@4A+kDY3&r9p', 'client_id': '55edce1cc48f3804', 'client_secret': 'a8a68507d9b5a30d17e4cf036a79de6e'}); tokenCon = tokenReq.content
mytoken = re.search('access_token":"(.+?)","expires_in', str(tokenCon)).group(1)

head = {'Authorization': 'Bearer '+mytoken}

# get the current date
now = datetime.datetime.now()
strTime = datetime.time(now.hour, now.minute, now.second)

# gets the locked id being sent from 'functions.php'
doorID = json.loads(sys.argv[1])

response = requests.patch(myurl + '/message/live/line/0/', headers = head, data = {'value': 'Opening doors...'})
response = requests.patch(myurl + '/message/live/line/1/', headers = head, data = {'value': ''})

response = requests.patch(myurl + '/door/'+str(doorID), headers = head, data = {'locked': '0'})
time.sleep(1)
response = requests.patch(myurl + '/door/'+str(doorID), headers = head, data = {'locked': '1'})
doorID += 1

response = requests.patch(myurl + '/message/live/line/0/', headers = head, data = {'value': 'Awaiting command...'})
response = requests.patch(myurl + '/message/live/line/1/', headers = head, data = {'value': ''})

