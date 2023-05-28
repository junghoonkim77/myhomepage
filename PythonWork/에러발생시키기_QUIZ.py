class SoldOuterror(Exception):
    def __init__(self,msg):
        self.msg =msg
    def str(self):
        return self.msg
    

try:


    chicken = 10
    waiting = 1
    while(True):
        print('남은치킨 :{0}'.format(chicken))
        order =int(input('치킨 몇마리 주문하시겠습니까?'))
        if order <1 :
            print('잘못된 값을 입력하였습니다.')

        else:
           
            if order > chicken or chicken == 0 :
                raise SoldOuterror('재고가 다 소진되어 주문X')
            else:
                print('[대기번호 {0}] {1}마리 주문이 완료되었습니다.'\
                    .format(waiting,order))
                waiting += 1
                chicken -=order
                

except ValueError :
    print('잘못된 값을 입력 하였습니다')
# 완전히 내식대로 풀었다. 가라지만 작동은 잘된다. 코딩이란 이런것이다.