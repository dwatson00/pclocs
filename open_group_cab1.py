# 'requests' is a 3rd party module that makes HTTP methods easier to use
# can try using default modules but that was way too much effort
import requests, time, datetime, re, sys, json

myurl = 'http://10.10.14.24:9898'

# the following generates a token request, extracts the response, and assigns to 'mytoken' var
tokenReq = requests.post(myurl + '/token', data = {'grant_type': 'password', 'username': 'admin', 'password': '@4A+kDY3&r9p', 'client_id': '85defdeeba290208', 'client_secret': '6fcb540f68d241c9ff6402328cf9d7ea'}); tokenCon = tokenReq.content
mytoken = re.search('access_token":"(.+?)","expires_in', str(tokenCon)).group(1)

head = {'Authorization': 'Bearer '+mytoken}

# get the current date
now = datetime.datetime.now()
strTime = datetime.time(now.hour, now.minute, now.second)

# gets the locker id being sent from 'functions.php'
doorID = json.loads(locker_id)
#used for debuging
#doorID = [0,1,2,4,3]

#logs= open('logs.txt','w')
#logs.write ('This is what the door id contains:')
#logs.write (str(doorID))
#logs.close()

response = requests.patch(myurl + '/message/live/line/0/', headers = head, data = {'value': 'Opening' })
response = requests.patch(myurl + '/message/live/line/1/', headers = head, data = {'value': '' })

i=0
while i!=len(doorID):
	response = requests.patch(myurl + '/door/'+str(doorID[i]), headers = head, data = {'locked': '0'})
	time.sleep(1)
	response = requests.patch(myurl + '/door/'+str(doorID[i]), headers = head, data = {'locked': '1'})
	i=i+1

response = requests.patch(myurl + '/message/live/line/0/', headers = head, data = {'value': 'Awaiting command...'})
response = requests.patch(myurl + '/message/live/line/1/', headers = head, data = {'value': ''})

