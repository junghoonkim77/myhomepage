testarr =[0,1,2,3,4,5]
for waiting_no in testarr:  #for in문과 비슷
    print('대기번호 : {0}'.format(waiting_no))
    print(waiting_no)

for waiting_no in range(1,5) :   # 1~5직전까지  range메소드의 두번째 인자는 항상 그 미만까지만 표시된다.
    print('대기번호 :{}'.format(waiting_no))


starbucks = ['아이언맨','토르','아이엠그루트']

for cus in starbucks :
    print('{},커피가 준비되었습니다.'.format(cus))


absent =[2,5]
no_book = [7]
for student in range(1,10) :
    if student in absent :
        continue #continue를 만나면 다음 단계로 건너뛴다.
    elif student in no_book :
        print('오늘수업은 여기까지.{0}는 교무실로 따라와'.format(student))
        break # break를 만나면 반복 구문을 끝내 버림
    print('{0},이책을 읽어봐'.format(student))


test1 =['김정훈','김개똥','김주남','김기준','김기은']
for name in test1 :
    if "김개똥"==name :
        continue
    print(name)

        
