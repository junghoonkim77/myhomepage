from random import *
print(2**3) # 제곱
print(5%3) #나머지
print(10//3) # 몫
print ("1 != 3 :",1 != 3 ) #true 앞뒤가 갖지 않다는 뜻 
print(not(1 != 3 ))
# 자바스크립트와 다른 점은 & 와 | 가 하나씩만 사용된다는 점 

print( abs(-5)) # 5 절대값
print( pow(4,2)) # 4^2 =16
print( max(5,12)) # 최대값
print( min(5,12)) # 5
print( round(4.99)) # 반올림 5

print( (3>0 ) and (3<5)) # 두 조건이 모두 충족되어야 True가 반환된다. &도 된다.
print( (3>0 ) or (3<1)) # 두 조건중 하나만 충독되도 True가 반환된다 |도 된다.
print(randint(4,28))

studyday = randint(4,28)
print("오프라인 스터디 모임 날짜는 매월 "+str(studyday)+"일로 선정되었습니다.")