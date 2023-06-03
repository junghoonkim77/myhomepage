absent =[2,5]
no_book = [7]
for student in range(1,10) :
    if student in absent :
        continue #continue를 만나면 다음 단계로 건너뛴다.
    elif student in no_book :
        print('오늘수업은 여기까지.{0}는 교무실로 따라와'.format(student))
        break # break를 만나면 반복 구문을 끝내 버림
    print('{0},이책을 읽어봐'.format(student))


#문제

from random import *

time = list(range(5,51))
shuffle(time)
time2 = list(range(5,16))
shuffle(time2)

cnt=0
for i in range(1,51) :
    time = randrange(5,51)
    if 5<= time <=15 :
        print('[0] {0}번째 손님 (소요시간 : {1}분)'.format(i,time))
        cnt+=1
    else:
        print('[]{0}번째 손님(소요시간 :{1}분)'.format(i,time))

print('총 탐승 승객 : {}'.format(cnt))



