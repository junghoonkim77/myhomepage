def profile(name,age,lang):
    print(name,age,lang)

profile(name='김정훈',lang='파이선',age=47)
# 함수를 호출할떄 매개 변수에 직저 값을 넣어 호출할수도 있다.

#가변 인자를 통한 함수 호출 /파라미터가 유동적임 

#def profile1(name,age,lang1,lang2,lang3,lang4):
def profile1(name,age,*lang): #인자앞에 *를 붙이고 함수 안에 for문을 선언한다.
    print('이름:{0}\t 나이:{1} \t 언어'.format(name,age), end=" ") #end=" "는 줄바꾸지 않고 출력하는 방법
    for lan in lang :
        print(lan , end=" ")
    print()


profile1('김주남',47,'파이선','자바','c','c#','c#','c#','c#','c#','c#')
profile1('김정훈',47,'한국어')


