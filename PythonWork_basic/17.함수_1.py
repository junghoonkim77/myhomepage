def open_account():
    print('새로우 계좌가 생성되었습니다.')

open_account()


def deposit(balance,money):
  #return print('입금완료됨.잔액은{0}원입니다.'.format(balance+money))
  print('입금완료됨.잔액은{0}원입니다.'.format(balance+money))
  return balance+money 

bal = 600000
cash = int(input("입금액을 적으세요 ^^ : "))

deposit(bal,cash)
#print (bankresul)

# balance = deposit(0,1000)
# print (balance)
# #balance = deposit(balance,1000)
# print (deposit(0,1000))

# def withdraw(balance,money):
#    if balance >= money :
#       print('출금이 완료됐습니다.잔액은{0}입니다.'.format(balance-money))
#       return balance-money
#    else :
#       print('출금불가~!. 잔액은{0}입니다.'.format(balance))
#       return balance
   
# balance = withdraw(balance,500)
# print(balance)
# withdraw(balance,300)

# def withdraw_night(balance,money) :
#    commission = 100
#    return commission , balance-money-commission

# comm , balance =withdraw_night(balance,300) #위에 보면 리턴값으로 두개를 주니깐 튜플형태로 받아서 신기하네...
# print ('수수료 {0}원이며 ,잔액은 {1}원입니다.'.format(comm,balance))


def profile(name,age,main_lang) :
     print ('이름 : {0} \t나이 :{1} \t 주 사용 언어 :{2}'.format(name,age,main_lang))

profile('김정훈',47,'한국어도 잘못함')
profile('홍길동',40,'자바스크립트')


#같은 학교 같은 학년 같은 반 같은 수업   #기본값 : 
#즉 같은 값이 계속 나오게 되는 경우 아래 와 같이 매개변수에 값을 미리 입력해 놓으면 
#하나만 호출해도 다 나온다는 얘기임 / 개신기 하네 
def profile(name,age=17,main_lang='파이썬') :
     print ('이름 : {0} \t나이 :{1} \t 주 사용 언어 :{2}'
            .format(name,age,main_lang))

profile('김정훈') # 매개변수에 값을 미리 넣어 놓으면 호출할때 알아서 지정된 값을 출력된다.

#키워드 호출값 즉 함수를 호출할때 매개변수에 값을 미리 넣어서 호출하게 되면 순서가 
#변경돼도 똑같은 순서로 출력하게 된다. 아래 예시 참고 
def profile1(name,age,main_lang):
     print(name,age,main_lang)

profile1(age=47,main_lang="장애인",name="핵병신 김정훈")


