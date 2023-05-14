gun =10

def checkpoint(soldiers):  #경계근무
    global gun  #global을 붙여 주면 글로벌 변수가 된다.
    gun = gun - soldiers
    print('함수 내 남은 총 :{0}'.format(gun))

def checkpoint_ret(gun,soldiers) :
    gun = gun - soldiers
    print('[함수내]남은총 :{0}'.format(gun))
    return gun



print('전체총 : {0}'.format(gun))
#checkpoint(2) #2명이 경계근무나감
gun = checkpoint_ret(gun,2)
print('남은총 : {0}'.format(gun))

# 문제
# 내가 푼 방식
def std_weight(height,gender) :
    if gender == "남자" :
      standard = round( (height/100)*(height/100)*22 ,2)
      print('키 {0}cm {1}의 표준 체중은 {2}kg입니다.'.format(height,gender,standard))
    else :
        standard = round( (height/100)*(height/100)*21 ,2)
        print('키 {0}cm {1}의 표준 체중은 {2}kg입니다.'.format(height,gender,standard))

std_weight(175,"남자")
std_weight(175,"여자")

#강사가 푼 방식
def std_weight_exe(height,gender) :
    if gender == "남자" :
        return height*height*22
    else:
        return height*height*21

height = 175
gender = "남자"
weight = round(std_weight_exe(height/100 ,gender),2)
print('키 {0}cm {1}의 표준 체중은 {2}kg입니다.'.format(height,gender,weight))