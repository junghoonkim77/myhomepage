try:
    print("나누기 전용 계산기입니다.")
    nums=[]
    nums.append( int(input('첫번째 숫자를 입력하세요:')) )
    nums.append( int(input('두번째 숫자를 입력하세요:')) )
    #nums.append(int(nums[0]/nums[1] ) )  
    #num1 = int(input('첫번째 숫자를 입력하세요:'))
    #num2 = int(input('두번째 숫자를 입력하세요:'))
    print('{0} / {1} = {2}'.format(nums[0] , nums[1] , nums[2]))
#여기서 num1과 num2엔 숫자가 들어가야 하나 글자가 들어갈경우 강제 종료된다.
#이걸 그렇게 되지 않게 예외처리하는걸 배우는 시간
except ValueError:
    print('에러 났슈 숫자를 입력해야됨')

except ZeroDivisionError as err:
    print(err)

except:
    print('알수 없는 에러가 발생했습니다.')



