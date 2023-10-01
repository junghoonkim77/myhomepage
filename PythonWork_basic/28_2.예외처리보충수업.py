try:
    frontnum = int(input('나눌수를 입력해주세요'))
    backnum =int(input('몇으로 나눌건가요?') )
    print(frontnum/backnum)

# except :
#     print('잘못된 수식이에요')
except Exception as e: 
    #Exception이란 객체에 오류내용이 담기고 그게 e 라는 변수에 들어가게 된다.
    print(e)
else:
    print("예외없이 성공적으로 실행됐습니다.")
    
finally:
    print("어쨋든 마무리 됐습니다.")
    
#프로그램이 실행중일때 오류 문구가 바로 송출되게 하는 방법은 
#exception 객체를 활용하는 방법이 있다.
