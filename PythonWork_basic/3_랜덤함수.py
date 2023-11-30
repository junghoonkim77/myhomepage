#from random import *
#import random as ra
from random import randint
#print (ra.random())

# print(random()) # 0.0~1.0미만의 임의의 값생성
# print(random() * 10) 
# print(int(random() * 10) ) # 0~10 소수가 아닌 정수로 반환
# print(int(random() * 10)+1 ) #1~10 이하의 임의의 값 생성

# print(int(random()*45)+1)
# print(randrange(1,46)) # range는 1부터 46미만의 값을 생성
# print(randint(1,45)) # randint는 45이하의 값을 생성

studyday = randint(4,28)
print('오프라인 스터디 모임 날짜는 매월 {0} 일로 선정되었습니다.'.format(studyday))