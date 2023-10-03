class ThailandPackage:
    def detail(self):
        print('[태국 패키지]: 가격은 50만원입니다.')

if __name__ == '__main__': # 네임이 메인이면(모듈이면)모듈에서 직접 실행된다는 뜻임 (23년 10월3일)
    print('thailand 모듈을 직접 실행')
    print('이 문장은 모듈을 직접 실행할 때만 실행돼요 ')
    trip_to = ThailandPackage()
    trip_to.detail()
else:
    print('Thailand 외부에서 모듈 호출')
    