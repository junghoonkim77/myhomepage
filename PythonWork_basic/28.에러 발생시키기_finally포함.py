# class BignumberError(Exception):
#     pass  직접에러를 정의해서 사용하기.
class BignumberError(Exception):
    def __init__(self,msg):
        self.msg = msg
    def str(self):
        return self.msg

try:
    print('한자리 숫자 나누기 전용 계산기입니다.')
    num1 = int(input('첫번째 숫자를 입력하세요'))
    num2 = int(input('두번째 숫자를 입력하세요'))
    if num1 >= 10 or num2 >=10:
        raise BignumberError('입력값 : {0},{1}'.format(num1,num2))
    print('{0} / {1} ={2}'.format(num1,num2,int(num1/num2)))
except ValueError:
    print('잘못된 값을 입력하였습니다. 한자리 숫자만 입력하세요~!')

# except BignumberError:
#     print('에러가 발생했씁니다. 한자리 숫자만 입력하세요')
    
except BignumberError as err:
    print('에러가 발생했씁니다. 한자리 숫자만 입력하세요')
    print(err)

finally:   # 코드가 성공이던 에러던지 무조건 출력됨
    print('계산기를 이용해 주셔서 감사합니다.')

