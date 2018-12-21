# 'requests' is a 3rd party module that makes HTTP methods easier to use
# can try using default modules but that was way too much effort
import requests
import time
import datetime
import re

myurl = 'http://10.10.14.24:9898'

# the following generates a token request, extracts the response, and assigns to 'mytoken' var
tokenReq = requests.post(myurl + '/token', data = {'grant_type': 'password', 'username': 'admin', 'password': '@4A+kDY3&r9p', 'client_id': '85defdeeba290208', 'client_secret': '6fcb540f68d241c9ff6402328cf9d7ea'}); tokenCon = tokenReq.content
mytoken = re.search('access_token":"(.+?)","expires_in', str(tokenCon)).group(1)

head = {'Authorization': 'Bearer '+mytoken}

# get the current date
now = datetime.datetime.now()
strTime = datetime.time(now.hour, now.minute, now.second)
#print(strTime)

# updates the message on the LCD screen
response = requests.patch(myurl + '/message/live/line/0/', headers = head, data = {'value': strTime})
response = requests.patch(myurl + '/message/live/line/1/', headers = head, data = {'value': ''})
#responseCon = response.content
#print(responseCon)

# opens door 6 and then sets it so that it will lock on being closed
# changes screen at end
doorID = 5
response = requests.patch(myurl + '/door/'+str(doorID), headers = head, data = {'locked': '0'})
time.sleep(1)
response = requests.patch(myurl + '/door/'+str(doorID), headers = head, data = {'locked': '1'})
time.sleep(1)
response = requests.patch(myurl + '/message/live/line/0/', headers = head, data = {'value': 'Awaiting command...'})
response = requests.patch(myurl + '/message/live/line/1/', headers = head, data = {'value': ''})

# opens all doors
#while (doorID < 15):
#	#print('door id is '+str(doorID))
#	time.sleep(1)
#	response = requests.patch(myurl + '/door/'+str(doorID), headers = head, data = {'locked': '0'})
#	#responseCon = response.content
#	#print(responseCon)
#	time.sleep(1)
#	response = requests.patch(myurl + '/door/'+str(doorID), headers = head, data = {'locked': '1'})
#	#responseCon = response.content
#	#print(responseCon)
#	doorID += 1
