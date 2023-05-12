def open_account():
    print('새로우 계좌가 생성되었습니다.')

open_account()


def deposit(balance,money):
  #return print('입금완료됨.잔액은{0}원입니다.'.format(balance+money))
  print('입금완료됨.잔액은{0}원입니다.'.format(balance+money))
  return balance+money 

balance = deposit(0,1000)
print (balance)
#balance = deposit(balance,1000)
#print (deposit(0,1000))

def withdraw(balance,money):
   if balance >= money :
      print('출금이 완료됐습니다.잔액은{0}입니다.'.format(balance-money))
      return balance-money
   else :
      print('출금불가~!. 잔액은{0}입니다.'.format(balance))
      return balance
   
balance = withdraw(balance,500)
print(balance)

def withdraw_night(balance,money) :
   commission = 100
   return commission , balance-money-commission

comm , balance =withdraw_night(balance,300) #위에 보면 리턴값으로 두개를 주니깐 튜플형태로 받아서 신기하네...
print ('수수료 {0}원이며 ,잔액은 {1}원입니다.'.format(comm,balance))





