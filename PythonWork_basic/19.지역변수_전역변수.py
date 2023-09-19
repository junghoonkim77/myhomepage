gun =10

def checkpoint(soldiers):  #경계근무
    global gun  #global을 붙여 주면 글로벌 변수가 된다.
    gun = gun - soldiers
    print('함수 내 남은 총 :{0}'.format(gun))

print('전체 총 : {0}'.format(gun))
checkpoint(2)  #자바스크립트랑 다른게 함수가 안에서도 밖에 있는 함수를 참조하지 못한다.global을 붙여주면 가능하고..
print('전체 총 : {0}'.format(gun))

print(gun)

def checkpoint_ret(gun,soldiers) :
    gun = gun - soldiers
    print('[함수내]남은총 :{0}'.format(gun))
    return gun #이렇게 해서 함수 밖으로 값을 던져준다.

print('글로벌 전체총 : {0}'.format(gun))
gun = checkpoint_ret(gun,2) # 함수를 호출할때 gun이란 인자는 글로벌 변수값을 호출하는거다.현재값은 8
print('남은총 : {0}'.format(gun)) #8이란 글로벌 변수값을 기준으로 호출된 함수의 gun결과값.

# 문제
# 내가 푼 방식

def std_weight(height,gender) :
    if gender == "남자" :
      standard = round( (height/100)*(height/100)*22 ,2)
      print('키 {0}cm {1}의 표준 체중은 {2}kg입니다.'.format(height,gender,standard))
    else :
        standard = round( (height/100)*(height/100)*21 ,2)
        print('키 {0}cm {1}의 표준 체중은 {2}kg입니다.'.format(height,gender,standard))

#ㅋㅋㅋ 내가 조건문과 입력문으로 변경시켰다 . ㅋㅋㅋㅋㅋㅋ
condition = True
while condition:
    height =int( input('키를 입력해주세요 :') ) 
    sex = str( input('성별을 입력해 주세요:') ) 
    if sex == "남자" or sex == "여자":
        std_weight(height,sex)
    else :
        print('정확한 성별을 입력해주세요')
        condition=False


#내가 푼게 더 멋있지 않냐? 외부에서 호출하는 변수를 정의하지 않고 막바로 진행한거잖아 .

#강사가 푼 방식
# def std_weight_exe(height,gender) :
#     if gender == "남자" :
#         return height*height*22
#     else:
#         return height*height*21

# height = 175
# gender = "남자"
# weight = round(std_weight_exe(height/100 ,gender),2)
# print('키 {0}cm {1}의 표준 체중은 {2}kg입니다.'.format(height,gender,weight))